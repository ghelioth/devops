FROM php:8.5.2-fpm-alpine3.23
RUN apk update\
    && apk add \
    bash \
    git \
    nodejs \
    yarn \
    zip \
    unzip \
    npm \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
