FROM php:8.4-apache

RUN docker-php-ext-install mysqli pdo_mysql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && a2enmod rewrite

RUN cp "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY development.ini /usr/local/etc/php/conf.d/zz-development.ini
COPY development.conf /etc/apache2/conf-available/development.conf
RUN a2enconf development
