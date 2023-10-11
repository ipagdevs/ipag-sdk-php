###############################################################################
# Imagem PHP + Apache
# Referência: https://gist.github.com/avandrevitor/bc9b28cba063468eda7bbeee9b485114
#
FROM php:7.4-apache as builder

ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /var/www/html/

RUN apt-get update --yes

# Install Dependencies
RUN apt-get install --yes \
    bash \
    curl \
    bzip2 \
    libzip-dev \
    libbz2-dev \
    libxml2-dev \
    git \
    tar \
    unzip \
    zip

# Extensões
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install calendar
# RUN docker-php-ext-install mbstring
# RUN docker-php-ext-install pdo
# RUN docker-php-ext-install pdo_mysql
# RUN docker-php-ext-install soap
# RUN docker-php-ext-install zip

RUN docker-php-ext-configure intl
# RUN docker-php-ext-configure zip --with-libzip;

RUN docker-php-ext-configure opcache
RUN docker-php-ext-install opcache

RUN pecl install xdebug-2.9.0 && docker-php-ext-enable xdebug

# Composer#Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# RUN bash -c "composer install"

FROM builder

WORKDIR /var/www/html/

RUN find . -type f | xargs -I{} chmod -v 644 {} && \
    find . -type d | xargs -I{} chmod -v 755 {};