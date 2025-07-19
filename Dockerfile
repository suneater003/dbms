# Use the official PHP image from Docker Hub
FROM php:8.1-cli

# Set working directory inside container
WORKDIR /usr/src/app

# Copy all files from repo into container
COPY . .

# Expose port (Render uses 10000)
EXPOSE 10000

# Start the PHP built-in server
CMD ["php", "-S", "0.0.0.0:10000"]
