# Stage 1: Build frontend assets with Node.js
FROM node:18 as node-builder

WORKDIR /app

# Copy only package.json and package-lock.json for efficient caching
COPY package*.json ./

# Install Node.js dependencies
RUN npm install

# Copy the rest of the application
COPY . .

# Build frontend assets
RUN npm run build


# Stage 2: Set up PHP with FPM
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

# Copy PHP application files from the host
COPY . .

# Copy built frontend assets from Stage 1
COPY --from=node-builder /app/public/build /var/www/public/build

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Expose Render's default dynamic port
EXPOSE 10000

# Start the application with PHP's built-in server
CMD ["php", "-S", "0.0.0.0:${PORT}", "-t", "public"]
