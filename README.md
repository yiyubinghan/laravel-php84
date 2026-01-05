# 环境要求：
```
Composer version 2.9.2
PHP version 8.4.15
Laravel Version 12.42.0
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