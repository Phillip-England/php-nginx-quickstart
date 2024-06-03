FROM composer AS composer

# Copying the source directory and install the dependencies with composer
COPY . /app

# Run composer install to install the dependencies
RUN composer install \
  --optimize-autoloader \
  --no-interaction \
  --no-progress

# Use the trafex/php-nginx image as the base image
FROM trafex/php-nginx:latest
COPY --chown=nginx --from=composer /app /var/www/html

# Set working directory
WORKDIR /app

# Copy application files
COPY . .

# Copy site configuration file
COPY ./site.conf /etc/nginx/conf.d/default.conf

# Expose port 8080 (as defined in the base image)
EXPOSE 8080

# Start supervisord which runs Nginx and PHP-FPM
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
