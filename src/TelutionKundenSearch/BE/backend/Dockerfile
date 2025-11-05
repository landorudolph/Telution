FROM php:8.2-apache

# Installiere Systemabhängigkeiten
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring intl zip

# Installiere Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Symfony-spezifische Konfiguration
RUN a2enmod rewrite
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Arbeitsverzeichnis
WORKDIR /var/www/html

# Kopiere den Symfony-Code
COPY . .

# Setze Berechtigungen
RUN chown -R www-data:www-data /var/www/html/var
