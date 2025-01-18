# Use the official PHP 8.2 image with FPM
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies, including Node.js and NPM
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    libzip-dev \
    nodejs \
    npm \
    && docker-php-ext-install zip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Install Node.js dependencies and build frontend assets
RUN npm install && npm run build

# Expose Render's default dynamic port
EXPOSE 8080

# Start the application with PHP's built-in server
CMD ["php", "-S", "0.0.0.0:${PORT}", "-t", "public"]
