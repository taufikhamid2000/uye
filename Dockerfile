# Use PHP with FPM for backend processing
FROM php:8.2-fpm as php

# Set working directory
WORKDIR /var/www

# Install system dependencies
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

# Use an Nginx image for serving the application
FROM nginx:alpine

# Copy PHP files to Nginx
COPY --from=php /var/www /usr/share/nginx/html
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Expose Render's default dynamic port
EXPOSE 10000

# Start Nginx
CMD ["nginx", "-g", "daemon off;"]
