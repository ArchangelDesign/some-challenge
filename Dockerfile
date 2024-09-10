FROM php:8.2-apache

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql mysqli

COPY . .
RUN rm /etc/apache2/sites-available/000-default.conf
COPY docker/apache/001-default.conf /etc/apache2/sites-available/000-default.conf

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer --version=2.2.0
RUN composer install


RUN chown -R www-data:www-data .

RUN service apache2 restart

EXPOSE 80

CMD ["apache2-foreground"]

