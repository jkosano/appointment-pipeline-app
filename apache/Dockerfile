FROM php:7.2-apache-stretch

#install mysqli and enable
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli

#start apache changes default port 80 (useful on cloud). Not recommended to use port 80 on cloud services.
#enable the a2enmod plugin
COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY start-apache /usr/local/bin
RUN a2enmod rewrite

#
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www
RUN chmod -R 777 /var/www/html/
COPY ./apache/apache2.conf ./etc/apache2/

#use default php.ini configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

CMD ["start-apache"]

#EXPOSE 80
EXPOSE 8000