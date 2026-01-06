# 基础编译环境镜像
FROM php:8.4.15-fpm-alpine

# 设置工作目录
WORKDIR /app

# 复制 OPcache配置文件
COPY docker/test/php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# 复制 php-fpm配置文件
COPY docker/test/php-fpm/php-fpm.conf /usr/local/etc/php-fpm.conf
COPY docker/test/php-fpm/php-fpm.d/www.conf /usr/local/etc/php-fpm.d/www.conf

# 安装系统依赖 supervisor
RUN apk add --no-cache nginx

# 复制 nginx配置文件
COPY docker/test/nginx/nginx.conf /etc/nginx/nginx.conf
COPY docker/test/nginx/http.d /etc/nginx/http.d

# 安装 PHP 扩展 bcmath sockets swoole reids
RUN docker-php-ext-install pdo_mysql

# 复制
COPY . .

# 安装 Composer
COPY --from=composer:2.9.2 /usr/bin/composer /usr/bin/composer

# 安装 Composer 依赖
RUN composer install --no-dev --no-scripts --prefer-dist

# 设置文件权限
RUN chown -R www-data:www-data /app && chmod -R 755 /app/storage && chmod -R 755 /app/bootstrap/cache

# 运行脚本
COPY docker/test/shell/docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh
ENTRYPOINT ["docker-entrypoint.sh"]

# 启动nginx应用
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]