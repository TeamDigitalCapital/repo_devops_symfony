FROM php:8.3-fpm

# Install dependencies and PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy Symfony application code to the container
COPY src/my_project /var/www/html/my_project

# Create cache and log directories, and fix permissions
RUN mkdir -p /var/www/html/my_project/var/cache /var/www/html/my_project/var/log \
    && chmod -R 775 /var/www/html/my_project/var/cache /var/www/html/my_project/var/log \
    && chown -R www-data:www-data /var/www/html/my_project/var/cache /var/www/html/my_project/var/log

# Set the working directory
WORKDIR /var/www/html/my_project
