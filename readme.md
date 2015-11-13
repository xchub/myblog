##简介
myblog是一个基于 Laravel 5.1、AdminLTE 的blog。
##功能
1. 登录认证
2. 上传管理
3. 标签管理
4. 文章管理

##安装

1. 克隆代码到本地

```
git clone https://github.com/stoneworld/myblog
cd myblog
```

2. 安装依赖

```
composer install
```

3. 修改目录权限

```
chmod -R 777 storage
```

4. 编辑 .env 并正确填写数据库部分。

```
cp .env.example .env
vim .env
```

5. 导入数据库

```
php artisan migrate
php artisan db:seed
```

