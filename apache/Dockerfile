# FROM php:7.3
FROM php:7.2-apache-stretch

#install mysqli and enable
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli

#
COPY . /var/www/html/
RUN chmod -R 777 /var/www/html/
COPY ./apache2.conf ./etc/apache2/

#use default php.ini configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

EXPOSE 80