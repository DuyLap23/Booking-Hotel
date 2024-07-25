FROM php:8.1-fpm

# Cài đặt các dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Cài đặt các extensions PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Thiết lập thư mục làm việc
WORKDIR /var/www

# Sao chép các file dự án
COPY . /var/www

# Cài đặt dependencies
RUN composer install

# Cấp quyền cho thư mục storage
RUN chmod -R 777 storage

# Expose port 80
EXPOSE 80

# Chạy PHP-FPM
CMD ["php-fpm"]