# ─── Stage 1: Node — build frontend assets ───────────────────────────────────
FROM node:20-alpine AS node_builder

WORKDIR /app

COPY package*.json ./
RUN npm ci --prefer-offline

COPY vite.config.js ./
COPY resources/ ./resources/
COPY public/ ./public/

RUN npm run build


# ─── Stage 2: Composer — install PHP dependencies (no dev) ───────────────────
FROM composer:2 AS composer_builder

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-scripts \
    --no-autoloader \
    --ignore-platform-reqs \
    --prefer-dist

COPY . .
RUN composer dump-autoload --no-dev --classmap-authoritative


# ─── Stage 3: Final — slim PHP Alpine runtime image ──────────────────────────
FROM php:8.3-cli-alpine

# Install only runtime system deps
RUN apk add --no-cache \
    libpng \
    libpq \
    oniguruma \
    libxml2 \
    && apk add --no-cache --virtual .build-deps \
        libpng-dev \
        oniguruma-dev \
        libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apk del .build-deps

WORKDIR /var/www

# Copy vendor from composer stage
COPY --from=composer_builder /app/vendor ./vendor

# Copy built frontend assets from node stage
COPY --from=node_builder /app/public/build ./public/build

# Copy application source (vendor & node_modules excluded via .dockerignore)
COPY . .

# Give Laravel write access to storage and cache
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8000

# On startup: regenerate package/service cache (without stale dev entries), then serve
CMD ["sh", "-c", "php artisan package:discover --ansi 2>/dev/null; php artisan serve --host=0.0.0.0 --port=8000"]
