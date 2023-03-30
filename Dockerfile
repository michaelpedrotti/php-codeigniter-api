FROM php:8.1.17-cli-alpine
WORKDIR /var/www/html
COPY ./composer.json ./composer.json
RUN docker-php-ext-install pdo pdo_mysql intl
RUN apk update
RUN apk add musl musl-utils musl-locales tzdata icu-dev
RUN apk add composer
CMD composer install
CMD php -S 0.0.0.0:8000 app.php
EXPOSE 8000
# docker build -t pedrotti/php-ci .