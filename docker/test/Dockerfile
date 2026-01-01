# 基础编译环境镜像
FROM php:8.4.15-fpm-alpine

# 设置工作目录
WORKDIR /app

# 安装系统依赖
RUN apk add --no-cache nginx

# 复制 nginx配置文件
COPY docker/test/nginx/default.conf /etc/nginx/http.d/default.conf

# 安装 PHP 扩展
RUN docker-php-ext-install pdo_mysql

# 复制
COPY . .

# 安装 Composer
COPY --from=composer:2.9.2 /usr/bin/composer /usr/bin/composer

# 安装 Composer 依赖
RUN composer install

# 复制 .env
RUN cp .env.example .env

# 设置文件权限
RUN chown -R www-data:www-data /app && chmod -R 755 /app/storage && chmod -R 755 /app/bootstrap/cache

# 生成 laravel key
RUN php artisan key:generate

# 执行数据库迁移（生产环境建议手动执行）
COPY docker/test/shell/docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh
ENTRYPOINT ["docker-entrypoint.sh"]

# 启动nginx应用
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]