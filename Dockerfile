FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    curl \
    git \
    cron \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    pkg-config \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath \
    && pecl install redis && docker-php-ext-enable redis

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
