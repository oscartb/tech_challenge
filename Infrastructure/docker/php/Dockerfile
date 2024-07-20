FROM php:8.3-fpm AS app_php

ARG UID
EXPOSE $UID

RUN adduser -u ${UID} --disabled-password --gecos "" appuser
RUN mkdir /home/appuser/.ssh
RUN chown -R appuser:appuser /home/appuser/
RUN echo "StrictHostKeyChecking no" >> /home/appuser/.ssh/config
RUN echo "export COLUMNS=300" >> /home/appuser/.bashrc
RUN echo "alias sf=/appdata/www/bin/console" >> /home/appuser/.bashrc

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY ./conf.d/app.ini $PHP_INI_DIR/conf.d/
COPY ./conf.d/app.prod.ini $PHP_INI_DIR/conf.d/

RUN apt-get update \
    && apt-get install -y git acl openssl openssh-client wget zip vim librabbitmq-dev libssh-dev \
    && apt-get install -y libpng-dev zlib1g-dev libzip-dev libxml2-dev libicu-dev \
    && docker-php-ext-install intl pdo pdo_mysql zip gd soap bcmath sockets \
    && pecl install amqp \
    && docker-php-ext-enable --ini-name 05-opcache.ini opcache amqp

RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer
RUN composer self-update

RUN mkdir -p /appdata/www

WORKDIR /appdata/www


FROM app_php AS app_php_dev

ENV APP_ENV=dev XDEBUG_MODE=debug

RUN rm $PHP_INI_DIR/conf.d/app.prod.ini; \
	mv "$PHP_INI_DIR/php.ini" "$PHP_INI_DIR/php.ini-production"; \
	mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
