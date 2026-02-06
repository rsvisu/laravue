########################################
# Stage 1: Base app (code)
########################################
FROM php:8.3-cli-alpine AS base

WORKDIR /app

RUN apk add --no-cache \
    git \
    unzip \
    curl

COPY . .


########################################
# Stage 2: Composer dependencies
########################################
FROM composer:2 AS composer-builder

WORKDIR /app

COPY --from=base /app /app

RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --optimize-autoloader


########################################
# Stage 3: Build frontend (Vite)
########################################
FROM node:20-alpine AS node-builder

WORKDIR /app

COPY --from=composer-builder /app /app

RUN npm install
RUN npm run build


########################################
# Stage 4: Production (PHP + Nginx)
########################################
FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    nginx \
    supervisor \
    bash \
    icu-dev \
    libzip-dev \
    oniguruma-dev \
    postgresql-dev

RUN docker-php-ext-install \
    intl \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    zip \
    opcache

# PHP config
RUN cat <<EOF > /usr/local/etc/php/conf.d/app.ini
memory_limit=512M
upload_max_filesize=20M
post_max_size=20M
max_execution_time=60
EOF

# Nginx config
RUN cat <<EOF > /etc/nginx/nginx.conf
worker_processes auto;

events {
    worker_connections 1024;
}

http {
    include       /etc/nginx/mime.types;
    default_type  application/octet-stream;
    sendfile on;

    server {
        listen 80;
        root /var/www/html/public;
        index index.php;

        location / {
            try_files \$uri \$uri/ /index.php?\$query_string;
        }

        location ~ \.php\$ {
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_index  index.php;
            include        fastcgi_params;
            fastcgi_param  SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        }
    }
}
EOF

# Supervisor
RUN cat <<EOF > /etc/supervisord.conf
[supervisord]
nodaemon=true

[program:php-fpm]
command=php-fpm
autostart=true
autorestart=true

[program:nginx]
command=nginx -g "daemon off;"
autostart=true
autorestart=true
EOF

WORKDIR /var/www/html

COPY --from=node-builder /app /var/www/html

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]