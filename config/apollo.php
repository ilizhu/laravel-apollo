<?php

return [
    /**
     * apollo 配置中心服务
     */
    'server'           => env('APOLLO_CONFIG_SERVER', 'http://127.0.0.1:8080'),
    /**
     * apollo 集群
     */
    'cluster'          => env('APOLLO_CLUSTER', 'default'),
    /**
     * 绑定IP做灰度发布用
     */
    'client_ip'        => env('APOLLO_CLIENT_IP', '127.0.0.1'),
    /**
     * 获取每个namespace配置的请求超时时间
     */
    'pull_timeout'     => env('APOLLO_PULL_TIMEOUT', 10),
    /**
     * 每次请求获取apollo配置变更时的超时时间
     * 由于Apollo服务端会hold住请求60秒，所以请确保客户端访问服务端的超时时间要大于60秒
     */
    'interval_timeout' => env('APOLLO_INTERVAL_TIMEOUT', 70),
    /**
     * apollo 配置appid
     */
    'appid'            => env('APOLLO_APP_ID', 'demo'),
    /**
     * apollo 鉴权密钥
     */
    'app_secret'       => env('APOLLO_APP_SECRET'),
    /**
     * 读取的namespace,多个请使用英文逗号隔开
     */
    'namespaces'       => explode(',', env('APOLLO_NAMESPACES', 'application')),
    /**
     * 数据 key 前缀
     */
    'prefix'           => env('APOLLO_CACHE_KEY_PREFIX', 'apollo'),
    /**
     * apollo 配置保存地址
     */
    'save_dir'         => storage_path('framework/cache'),
    /**
     * redis 使用的默认连接
     */
    'redis_use'        => 'default',
    /**
     * 数据存储的 redis key
     */
    'data_redis_key'   => 'apollo_data',
    /**
     * 配置缓存
     */
    'cache'            => [
        'default' => 'file',
        'stores'  => [
            'file'  => [
                'driver' => 'file',
                'path'   => storage_path('framework/cache/data'),
            ],
            'redis' => [
                'driver'     => 'redis',
                'connection' => 'apollo',
            ],
        ],
    ],
];
