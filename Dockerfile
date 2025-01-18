FROM php:8.2-fpm
WORKDIR /var/www
COPY . .
RUN apt-get update && apt-get install -y curl unzip libzip-dev && docker-php-ext-install zip
EXPOSE 8080
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
