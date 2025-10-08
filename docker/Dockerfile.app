# Base image
FROM php:8.2-fpm AS base

# Set working directory
WORKDIR /var/www/html

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
COPY ./ /var/www/html

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

# Expose port
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
