# Use the official PHP 8.2 image with FPM
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    bash \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    libonig-dev \
    nodejs \
    npm \
    build-essential \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

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
