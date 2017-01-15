FROM php:5.6-apache

RUN a2enmod rewrite expires

# install the PHP extensions we need
RUN apt-get update && apt-get install -y libpng12-dev \
    libjpeg-dev && \
    rm -rf /var/lib/apt/lists/*

# configure docker extensions
RUN docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr && \
    docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd && \
    docker-php-ext-configure mysql --with-mysql=mysqlnd && \
    docker-php-ext-configure mysqli --with-mysqli=mysqlnd && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install mysqli && \
    docker-php-ext-install mysql

WORKDIR /var/www/html

COPY . .
RUN chown -R www-data:www-data /var/www/html/*

ARG uid=1000
RUN usermod -u ${uid} www-data

CMD ["apache2-foreground"]
