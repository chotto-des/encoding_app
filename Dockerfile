# ─── Stage 1: Node ───────────────────────────────────────────────────────────
FROM node:20-alpine AS node_builder

WORKDIR /app

COPY code/laravel/package*.json ./
RUN npm ci --prefer-offline

COPY code/laravel/vite.config.js ./
COPY code/laravel/resources/ ./resources/
COPY code/laravel/public/ ./public/

RUN npm run build


# ─── Stage 2: Composer ───────────────────────────────────────────────────────
FROM composer:2 AS composer_builder

WORKDIR /app

COPY code/laravel/composer.json code/laravel/composer.lock ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-scripts \
    --no-autoloader \
    --ignore-platform-reqs \
    --prefer-dist

COPY code/laravel/ .
RUN composer dump-autoload --no-dev --classmap-authoritative


# ─── Stage 3: Final ──────────────────────────────────────────────────────────
FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    libpng libpq oniguruma libxml2 \
    && apk add --no-cache --virtual .build-deps \
        libpng-dev oniguruma-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apk del .build-deps

WORKDIR /var/www/laravel

COPY --from=composer_builder /app/vendor ./vendor
COPY --from=node_builder /app/public/build ./public/build
COPY code/laravel/ .

RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 9000

CMD ["sh", "-c", \
    "chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache && \
    if [ \"$MIGRATE_ON_START\" = \"true\" ]; then php artisan migrate --force; fi; \
    php-fpm"]