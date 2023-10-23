FROM php:8.2-fpm-alpine

RUN apk --no-cache --update add \
vim \
git \
curl \
zip \
sqlite \
unzip 

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www
