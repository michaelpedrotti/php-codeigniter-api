FROM php:8.1.17-cli
WORKDIR /usr/src/app
COPY ./composer.json ./composer.json
RUN apt update -y
RUN apt install -y wget libicu-dev zip unzip libzip-dev
RUN wget https://getcomposer.org/download/latest-stable/composer.phar
RUN mv composer.phar /usr/bin/composer
RUn chmod +x /usr/bin/composer
RUN docker-php-ext-install intl zip pdo pdo_mysql
RUN composer install
CMD php -S 0.0.0.0:8000 app.php
EXPOSE 8000
# docker build -t pedrotti/php-ci .