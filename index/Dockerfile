FROM php:8.2-apache
COPY . /var/www/html
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN service apache2 restart
