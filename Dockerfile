# Imagen base con PHP 8.2 CLI
FROM php:8.2-cli

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Instalar Composer (desde imagen oficial de composer)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Carpeta de trabajo dentro del contenedor
WORKDIR /var/www

# Copiar todos los archivos del proyecto al contenedor
COPY . .

# Instalar dependencias de Laravel
RUN composer install

# Exponer puerto 8000
EXPOSE 8000

# Comando por defecto (levantar servidor Laravel)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
