FROM php:8.3-fpm
RUN apt-get update \
    && apt-get install -y \
    git \
    zip \
    unzip \
    vim \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    libfontconfig1 \
    libxrender1 \
    libzip-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install pdo_mysql mysqli exif
RUN docker-php-ext-install zip
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer



WORKDIR /src
ADD . /src/storage
RUN chown -R www-data:www-data /src/storage
CMD bash -c "composer install && php artisan migrate && php artisan serve --host 0.0.0.0"
# CMD ["composer" "install" "&&" "php", "artisan", "serve", "--host", "0.0.0.0"]