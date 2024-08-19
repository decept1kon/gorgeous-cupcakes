# Use an official PHP image with Apache
FROM php:7.4-apache

# Install necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Copy application source code to the container
COPY . /var/www/html/

# Grant write permissions to the webserver
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Update Apache to listen on port 8080
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf && \
    sed -i 's/:80/:8080/' /etc/apache2/sites-available/000-default.conf

# Expose port 8080
EXPOSE 8080

# Start Apache server
CMD ["apache2-foreground"]
