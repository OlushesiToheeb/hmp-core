FROM php:8.1.0-apache
WORKDIR /var/www/html

#Linux Library
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zlib1g-dev \
    libzip-dev \
    nano\
    zip \
    unzip

#Mod Rewrite
RUN a2enmod rewrite

RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

#Composer
COPY --from=composer:latest usr/bin/composer usr/bin/composer

# Add and Enable PHP-PDO Extenstions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-install zip
RUN docker-php-ext-install bcmath
RUN docker-php-ext-enable pdo_mysql
