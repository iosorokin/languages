FROM php:fpm

RUN apt-get update \
    && apt-get install -y curl \
        libpq-dev \
        libzip-dev \
        zip \
        unzip \
        git \
        supervisor \
    && docker-php-ext-install -j$(nproc) pdo_pgsql \
        zip \
    && pecl install xdebug \
        redis \
    && docker-php-ext-enable redis \
    && curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs build-essential \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html