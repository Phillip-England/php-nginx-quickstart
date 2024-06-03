# Use the trafex/php-nginx image as the base image
FROM trafex/php-nginx:latest

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Copy site configuration file
COPY ./config/site.conf /etc/nginx/conf.d/default.conf

# Expose port 8080 (as defined in the base image)
EXPOSE 8080

# Start supervisord which runs Nginx and PHP-FPM
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
