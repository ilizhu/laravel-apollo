<?php

return [
    /**
     * apollo 服务器
     */
    'server' => 'http://127.0.0.1:8080',
    /**
     *
     */
    'save_dir' => storage_path('framework/cache'),
    /**
     * apollo 配置appid
     */
    'appid' => 'demo',
    /**
     * apollo 鉴权密钥
     */
    'accessKeySecret' => NULL,
    /**
     * 读取的namespace
     */
    'namespaces' => ['application'],
    /**
     * 数据存储的 redis key
     */
    'data_redis_key' => 'apollo_data',
    /**
     * 数据 key 前缀
     */
    'prefix' => 'apollo:',
    /**
     * redis 使用的默认连接
     */
    'redis_use' => 'default',
    /**
     * 配置缓存
     */
    'cache' => [
        'default' => 'file',
        'stores' => [
            'file' => [
                'driver' => 'file',
                'path' => storage_path('framework/cache/data'),
            ],
            'redis' => [
                'driver' => 'redis',
                'connection' => 'apollo',
            ],
        ],
    ],
];
