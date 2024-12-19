# Usa una imagen base de PHP con Apache
FROM php:8.2-apache

# Instala las dependencias de PHP necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Habilita el módulo de Apache para reescritura de URLs
RUN a2enmod rewrite

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos del proyecto a la imagen
COPY . .

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Expone el puerto 80 para acceder a la aplicación desde el navegador
EXPOSE 80

# Comando para iniciar Apache
CMD ["apache2-foreground"]
