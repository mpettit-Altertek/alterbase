FROM php:7.3-apache

# Enable mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Set the document root to /var/www/html/htdocs
ENV APACHE_DOCUMENT_ROOT /var/www/html/htdocs

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
        /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
        /etc/apache2/apache2.conf \
        /etc/apache2/conf-available/*.conf

# Copy htdocs content into the image
COPY htdocs/ /var/www/html/htdocs/

EXPOSE 80
