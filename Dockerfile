FROM php:8.3-cli

# Install system dependencies, PHP extensions, and Node.js
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Install Composer from its official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy all project files into the container
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --optimize-autoloader

# Install Node dependencies and build frontend assets
RUN npm install && npm run build

# Give Laravel write access to storage and cache folders
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
