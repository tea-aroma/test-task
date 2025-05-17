FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    curl \
    git \
    cron \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    pkg-config \
    && docker-php-ext-install pdo_mysql

WORKDIR /var/www/html

ADD crontab /etc/cron.d/hello-cron

RUN chmod 0644 /etc/cron.d/hello-cron

RUN touch /var/log/cron.log

CMD [ "cron", "-f" ]
