# Base image
FROM php:8.2-fpm AS base

# Set working directory
WORKDIR /var/www/laravel_app

# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpq-dev libzip-dev unzip curl git libpng-dev libjpeg-dev \
    libfreetype6-dev libonig-dev supervisor \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql zip bcmath sockets exif opcache \
    && pecl install redis \
    && docker-php-ext-enable redis opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer (Versi terbaru)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy custom PHP configuration (Jika ada)
# COPY ./docker/php.ini /usr/local/etc/php/php.ini

# Copy application code
COPY ./ /var/www/laravel_app

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/laravel_app \
    && chmod -R 755 /var/www/laravel_app/storage /var/www/laravel_app/bootstrap/cache /var/www/laravel_app/public

# Start PHP-FPM
CMD ["php-fpm"]
