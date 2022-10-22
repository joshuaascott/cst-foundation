FROM php:8-apache

RUN apt-get update && apt-get install -y git
RUN docker-php-ext-install pdo_mysql mysqli
RUN a2enmod rewrite

EXPOSE 80/tcp
EXPOSE 443/tcp
