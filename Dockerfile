# Use the official PHP 8.2 image with FPM
FROM php:8.2-fpm

WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Expose Render's dynamic port
EXPOSE 10000

# Start the application with PHP's built-in server
CMD ["php", "-S", "0.0.0.0:${PORT}", "-t", "public"]
