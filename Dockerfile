FROM composer:2 AS composer
WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-progress --no-interaction

COPY . .

FROM php:8.4-cli-alpine AS php
WORKDIR /app
COPY --from=composer /app /app
RUN ./vendor/bin/phpcs . \
    && ./vendor/bin/phpunit \
    && ./vendor/bin/phpstan analyse --memory-limit=256M


FROM python:3.13-slim AS mkdocs
WORKDIR /app
COPY --from=php /app /app
RUN pip install --no-cache-dir -r requirements.txt \
    && mkdocs build

FROM nginx:alpine
WORKDIR /usr/share/nginx/html
COPY --from=mkdocs /app/site /usr/share/nginx/html