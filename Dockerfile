FROM php:8.1-fpm
 
# Install basic apt packages
RUN apt-get update && apt-get install -y apt-utils unzip gnupg2 libpng-dev zlib1g-dev
 
# Download and install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
 
# Install & enable PHP extensions
RUN docker-php-ext-install pcntl gd


# Copy the rest of your application code
COPY . .

# Expose port 9000 to the outside world
EXPOSE 8000

# Run PHP-FPM
CMD ["php-fpm"]