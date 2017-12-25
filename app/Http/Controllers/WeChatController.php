<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Input;
use Log;
use EasyWeChat\Factory;
class WeChatController extends Controller
{

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        $config = [
            'app_id' => 'wx88738206909faa68',
            'secret' => '7e7cb085c0c0f5ed1d2c86d0f82a4081',
//            'token' => 'yixin',           // Token
//            'aes_key' => 'pjlG4Usckof34UdwACxDouCJ9lRMcwpGPTFoAwVOxvO',                 // EncodingAESKey
            'response_type' => 'array',
            'log' => [
                'level' => 'debug',
                'file' => __DIR__.'/wechat.log',
            ],
        ];
        $app = Factory::officialAccount($config);
        $response = $app->server->serve();
// 将响应输出
        return $response; // Laravel 里请使用：return $response;
    }
}
