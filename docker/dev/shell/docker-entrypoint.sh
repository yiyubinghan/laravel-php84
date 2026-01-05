#!/bin/sh

# 运行数据库迁移
php artisan migrate

# 迁移完成，启动应用
exec "$@"