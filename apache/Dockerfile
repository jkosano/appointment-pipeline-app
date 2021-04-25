# FROM php:7.3
FROM php:7.2-apache-stretch
#install mysqli and enable
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli
COPY . /var/www/html/
RUN chmod -R 755 /var/www/html/
EXPOSE 80