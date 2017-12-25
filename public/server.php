<?php

include __DIR__ . '/vendor/autoload.php'; // 引入 composer 入口文件

use EasyWeChat\Foundation\Application;

$options = [
    'debug'  => true,
    'app_id' => 'wx4b00aa6a53489c21your-app-id',
    'secret' => '3049d03c499f7e5b0cc1168d09591286you-secret',
    'token'  => 'yixineasywechat',
    // 'aes_key' => null, // 可选

    'log' => [
        'level' => 'debug',
        'file'  => '/tmp/easywechat.log', // XXX: 绝对路径！！！！
    ],

    //...
];

$app = new Application($options);

$response = $app->server->serve();

// 将响应输出
return $response; // Laravel 里请使用：return $response;