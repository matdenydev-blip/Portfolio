# Dockerfile pour configurer un conteneur PHP avec Apache
# image de base PHP avec Apache
FROM php:8.2-apache
# Installer les extensions PHP nécessaires pour PDO et MySQL
RUN docker-php-ext-install pdo pdo_mysql
# Copier les fichiers de l'application dans le conteneur
COPY . /var/www/html/
# Définir la variable d'environnement pour le répertoire racine d'Apache
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
# Définir le répertoire racine d'Apache sur le dossier public de l'application
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
# Exposer le port 80 pour le serveur web Apache
EXPOSE 80