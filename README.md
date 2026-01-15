# 说明
使用 laravel框架自定义 docker环境。自定义环境配置，含opcache、php-fpm、nginx、laravel-octane-swoole、supervisor

# 环境要求：
```
Composer version 2.9.2
PHP version 8.4.15
Laravel Version 12.42.0
```

# 自定义docker目录结构
```
/docker
    - /dev
        - /nginx
            - /http.d
                - default.conf
                - octane.conf
            - nginx.conf
        - /php
            - opcache.ini
        - /php-fpm
            - /php-fpm.d
                - www.conf
            - php-fpm.conf
        - /shell
            - docker-entrypoint.sh
        - /supervisord
            - /supervisor.d
                - nginx.ini
                - octane.ini
                - php-fpm.ini
            - supervisord.conf
        - Dockerfile
    - test
        ...
```

# 开发环境（dev）：
```
# docker compose 启动
./vendor/bin/sail up -d

# docker compose 关闭
./vendor/bin/sail down
```

# 测试环境（test）：
```
# docker compose 启动
docker compose -f compose.test.yml up -d

# docker compose 关闭
docker compose -f compose.test.yml down
```

# 生产环境（prod）
```
# docker compose 启动
docker compose -f compose.prod.yml up -d

# docker compose 关闭
docker compose -f compose.prod.yml down
```

# 提示：
###### 安全优化：使用非 root 用户，隐藏 PHP 版本信息，设置安全头
###### 性能优化：启用 OPcache，配置 Nginx 缓存，使用 Alpine 基础镜像
###### 可维护性：多阶段构建减少镜像大小，健康检查，日志配置
###### 生产就绪：Supervisor 管理进程，环境变量配置，自动重启策略
###### 资源优化：Gzip 压缩，静态文件缓存，连接池优化