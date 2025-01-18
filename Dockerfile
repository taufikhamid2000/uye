# Use the official PHP 8.2 image with FPM and Alpine for lightweight production
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apk add --no-cache \
    bash \
    git \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    libfreetype-dev \
    libzip-dev \
    unzip \
    oniguruma-dev \
    nodejs \
    npm

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl gd

# Install Composer globally
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Install Node.js dependencies and build frontend assets
RUN npm install && npm run build

# Expose port
EXPOSE 8000

# Set permissions
RUN chown -R www-data:www-data /var/www

# Start the application
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
