# laravel 接入携程 [Apollo](https://ctripcorp.github.io/apollo/#/zh/README)


## 概述

Apollo（阿波罗）是携程框架部门研发的分布式配置中心，能够集中化管理应用不同环境、不同集群的配置，配置修改后能够实时推送到应用端，并且具备规范的权限、流程治理等特性，适用于微服务配置管理场景。
此插件让 laravel 框架方便的接入 apollo

## 运行环境
- PHP 7.0
- laravel 5.5

## 安装方法
```shell
composer require ilizhu/laravel-apollo
```

- 服务提供者`config/app.php`引入

```php
 'providers' => [
    \ilizhu\LaravelApollo\ApolloServiceProvider::class
 ],
```

- 配置发布 
  
把`/laravel-apollo/config/apollo.php`拷贝放到配置目录
#### 或执行
```shell
php artisan vendor:publish --provider="ilizhu\LaravelApollo\ApolloServiceProvider"
```


## 使用

- apollo 配置监控

#### 配置work的常驻进程
```php
php artisan apollo:worker
```
客户端以cli的方式后台启动执行，支持apollo配置的适时获取，并将配置保存在指定的目录/Redis供应用程序使用,拉取的配置默认保存在脚本所在目录，每个namespace的配置以`apolloConfig.{$namespaceName}.php`的方式命名保存

#### 使用配置
```php
env('apollo:配置名');
```
