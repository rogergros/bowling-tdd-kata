FROM php:8.1-fpm

# Doc: https://github.com/mlocati/docker-php-extension-installer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/install-php-extensions

RUN apt-get update \
    && apt-get install -y \
        unzip \
    && apt-get clean all \
;

RUN install-php-extensions \
        @composer-^2 \
        pcov \
        xdebug-^3.0 \
;

RUN rm -rf /var/www/* && mkdir -p /var/www/app
WORKDIR /var/www/app
