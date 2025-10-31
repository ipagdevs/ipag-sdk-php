###############################################################################
# Imagem PHP + Apache
# Referência: https://gist.github.com/avandrevitor/bc9b28cba063468eda7bbeee9b485114
#
FROM php:7.4-fpm-alpine as builder

ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /var/www/html/

# Atualizar repositórios Alpine
RUN apk update

# Install Dependencies - Usando apk para Alpine
RUN apk add --no-cache \
    bash \
    curl \
    bzip2 \
    libzip-dev \
    bzip2-dev \
    libxml2-dev \
    git \
    tar \
    unzip \
    zip \
    icu-dev \
    autoconf \
    gcc \
    g++ \
    make \
    linux-headers \
    $PHPIZE_DEPS

# Extensões
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install calendar
RUN docker-php-ext-install zip
RUN docker-php-ext-install intl

# Configurar e instalar OPcache
RUN docker-php-ext-configure opcache && \
    docker-php-ext-install opcache

# Instalar Xdebug (versão compatível com PHP 7.4)
RUN pecl channel-update pecl.php.net && \
    pecl install xdebug-3.1.6 && \
    docker-php-ext-enable xdebug

# Configurar Xdebug (configuração básica, será sobrescrita pelo php.ini)
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.log=/var/log/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.idekey=VSCODE" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Composer#Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar configurações personalizadas do PHP
COPY .docker/php.ini /usr/local/etc/php/conf.d/99-custom.ini

# RUN bash -c "composer install"

FROM builder

WORKDIR /var/www/html/

RUN find . -type f | xargs -I{} chmod -v 644 {} && \
    find . -type d | xargs -I{} chmod -v 755 {};