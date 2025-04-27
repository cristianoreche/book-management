# Dockerfile

FROM php:8.2-fpm-alpine

# Instala dependências corretas para extensões PHP
RUN apk add --no-cache \
    bash \
    git \
    unzip \
    mariadb-client \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libzip-dev \
    zlib-dev \
    oniguruma-dev \
    autoconf \
    automake \
    libtool \
    gcc \
    g++ \
    make \
    linux-headers

# Configura e instala as extensões PHP corretamente
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql mbstring zip gd \
    && pecl install redis \
    && docker-php-ext-enable redis

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia arquivos do PHP
WORKDIR /var/www/html
