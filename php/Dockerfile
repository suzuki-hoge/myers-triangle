FROM php:8.0

RUN apt-get update && apt-get -y install git

COPY --from=composer:2.1 /usr/bin/composer /usr/bin/composer

