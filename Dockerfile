FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    curl \
    git \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
