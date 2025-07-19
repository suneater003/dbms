# Use the official PHP image with Apache and Debian base
FROM php:8.1-cli

# Install mysqli extension and dependencies
RUN apt-get update && \
    apt-get install -y libpng-dev libonig-dev libxml2-dev zip unzip && \
    docker-php-ext-install mysqli

# Set working directory
WORKDIR /usr/src/app

# Copy project files into container
COPY . .

# Expose port for Render (required)
EXPOSE 10000

# Start PHP built-in server
CMD ["php", "-S", "0.0.0.0:10000"]
