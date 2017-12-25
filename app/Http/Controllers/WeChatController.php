<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Input;
use EasyWeChat\Foundation\Application;
class WeChatController extends Controller
{

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        $options = [
            'debug'  => true,
            'app_id' => 'your-app-id',
            'secret' => 'you-secret',
            'token'  => 'easywechat',

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
        $response->send(); // Laravel 里请使用：return $response;
    }
}
