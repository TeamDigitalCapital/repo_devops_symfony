# Utilise l'image officielle de PHP avec Apache en version 7.4
FROM php:7.4-apache

# Ajoute le nom du serveur à la configuration Apache pour éviter les avertissements
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Mise à jour des paquets et installation des dépendances nécessaires
RUN apt-get update \
    && apt-get install -y --no-install-recommends locales apt-utils git libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev

# Configuration des locales pour l'anglais (États-Unis) et le français (France)
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

# Installation de Composer
RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

# Configuration et installation des extensions PHP nécessaires
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql gd opcache intl zip calendar dom mbstring zip gd xsl
RUN pecl install apcu && docker-php-ext-enable apcu

# Copier les fichiers de l'application dans le conteneur
COPY . /var/www/html/

# Définit les permissions nécessaires sur le répertoire de travail
RUN chmod -R 755 /var/www/html

# Définit le répertoire de travail par défaut
WORKDIR /var/www/
