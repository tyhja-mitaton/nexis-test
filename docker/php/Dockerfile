FROM php:8.2-fpm

# Install system packages for PHP extensions recommended for Yii 2.0 Framework
RUN apt-get update && \
    apt-get install -y \
            curl \
            wget \
            unzip \
            zip \
            libmemcached-dev \
            git \
            bash-completion \
            curl \
            libfreetype6-dev \
            libcurl3-dev \
            libicu-dev \
            libmcrypt-dev \
            libfreetype6-dev \
            libjpeg-dev \
            libjpeg62-turbo-dev \
            libmagickwand-dev \
            libpq-dev \
            libpng-dev \
            libzip-dev \
            zlib1g-dev \
            mariadb-client \
            openssh-client \
            libxml2-dev \
            gettext \
            cron \
            supervisor \
            default-jre \
            procps && \
    docker-php-ext-configure gd && \
    docker-php-ext-configure bcmath

RUN apt-get install -y libc-client-dev libkrb5-dev && rm -r /var/lib/apt/lists/*
RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install imap \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql

# Install composer
# ApiDoc generator
RUN curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer.phar \
        --install-dir=/usr/local/bin

WORKDIR /home/www