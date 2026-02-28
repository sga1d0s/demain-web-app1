# Etapa 1: build de assets (Vite)
FROM node:20-alpine AS assets
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# Etapa 2: runtime PHP (incluye composer install)
FROM php:8.4-cli-bookworm
WORKDIR /var/www/html

# Paquetes mínimos + extensiones típicas Laravel
RUN apt-get update \
 && apt-get install -y --no-install-recommends \
      curl git unzip \
      libzip-dev zlib1g-dev \
      libicu-dev \
      libonig-dev \
 && rm -rf /var/lib/apt/lists/* \
 && docker-php-ext-install \
      pdo_mysql \
      mbstring \
      intl \
      zip

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Dependencias PHP (sin scripts para evitar artisan/package:discover durante el build)
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Código de la app
COPY . .

# Copia assets compilados
COPY --from=assets /app/public/build /var/www/html/public/build

# Permisos mínimos
RUN mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache \
 && chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R ug+rwx storage bootstrap/cache

CMD ["sh", "-lc", "php artisan optimize:clear && php artisan config:cache && php artisan route:cache || true ; php artisan view:cache || true ; php artisan serve --host=0.0.0.0 --port=8000"]