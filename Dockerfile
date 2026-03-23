
# ─── Stage 1: Node — build frontend assets ───────────────────────────────
FROM alpine:3.19 AS node_builder

WORKDIR /app

# Install curl and bash for nvm
RUN apk add --no-cache curl bash

# Install nvm
ENV NVM_DIR /root/.nvm
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash

# Install Node.js 20.x and use it
RUN bash -c "source $NVM_DIR/nvm.sh && nvm install 20 && nvm use 20 && node -v && npm -v"

# Copy package files and install dependencies using nvm-managed node
COPY package*.json ./
RUN bash -c "source $NVM_DIR/nvm.sh && nvm use 20 && npm ci --prefer-offline"

# Copy the rest of the frontend files
COPY vite.config.js ./
COPY resources/ ./resources/
COPY public/ ./public/

# Build assets using nvm-managed node
RUN bash -c "source $NVM_DIR/nvm.sh && nvm use 20 && npm run build"


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

# On startup: optionally run migrate:fresh --seed if MIGRATE_SEED_ON_START=true, then serve
CMD ["sh", "-c", "php artisan package:discover --ansi 2>/dev/null; \
if [ \"$MIGRATE_SEED_ON_START\" = \"true\" ]; then php artisan migrate:fresh --seed; fi; \
php artisan serve --host=0.0.0.0 --port=8000"]
