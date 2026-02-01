# Etapa 1: dependencias PHP (Composer) — mismo PHP que runtime para evitar reqs
FROM composer:2 AS composerbin

FROM php:8.3-cli-bookworm AS deps
WORKDIR /app

# Herramientas mínimas para Composer y extensiones que suelen exigir los paquetes
RUN apt-get update \
 && apt-get install -y --no-install-recommends git unzip curl \
 && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql

# Composer (binario) desde la imagen oficial
COPY --from=composerbin /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts
COPY . .
RUN composer dump-autoload -o --no-scripts

# Etapa 2: Node (Vite) — build de assets
FROM node:20-alpine AS assets
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# Etapa 3: runtime (CLI para artisan serve)
FROM php:8.3-cli-bookworm
RUN apt-get update \
 && apt-get install -y --no-install-recommends curl \
 && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql
WORKDIR /var/www/html
COPY --from=deps /app ./
COPY --from=assets /app/public/build /var/www/html/public/build

# (Opcional pero recomendable)
RUN mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache \
 && chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R ug+rwx storage bootstrap/cache

CMD ["sh", "-lc", "php artisan optimize:clear && php artisan config:cache && php artisan view:cache ; php artisan route:cache || true ; php artisan serve --host=0.0.0.0 --port=8000"]
