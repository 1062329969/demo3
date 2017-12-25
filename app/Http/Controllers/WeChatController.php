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
            'app_id' => 'wx083fd9c68238faaf',
            'secret' => '58a5ad9bbcaaab65afdce9bee1fdc545',
            'token'  => 'weixinlx',

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
    }
}
