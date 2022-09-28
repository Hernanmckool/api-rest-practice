FROM php:7.4-fpm-buster

RUN apt-get update && apt-get install -qqy git unzip libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libaio1 wget && apt-get clean autoclean && apt-get autoremove --yes &&  rm -rf /var/lib/{apt,dpkg,cache,log}/ 
#composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Install Xdebug
RUN pecl install xdebug-3.1.1 \
    && docker-php-ext-enable xdebug

COPY ./conf.d/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
COPY ./conf.d/error_reporting.ini /usr/local/etc/php/conf.d/error_reporting.ini

# Install Git credentials
COPY ./git /root/.ssh
RUN chmod 400 /root/.ssh/dlagit

WORKDIR /var/www

CMD php-fpm

EXPOSE 9000
