FROM php:8.4-apache

RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY docker/php/php.ini /usr/local/etc/php/conf.d/custom.ini
