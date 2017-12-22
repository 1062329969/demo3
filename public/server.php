<?php
use EasyWeChat\Factory;

$config = [
    'app_id' => 'wx88738206909faa68',
    'secret' => '7e7cb085c0c0f5ed1d2c86d0f82a4081',

    'response_type' => 'array',

    'log' => [
        'level' => 'debug',
        'file' => __DIR__.'/wechat.log',
    ],
];

$app = Factory::officialAccount($config);

$response = $app->server->serve();

// 将响应输出
$response->send(); // Laravel 里请使用：return $response;
