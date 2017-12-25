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
            'app_id' => 'wx4b00aa6a53489c21',
            'secret' => 'f1f37c16e79c7c977c16fea02ea73e72',
            'token' => 'yixin',           // Token
            'aes_key' => 'pjlG4Usckof34UdwACxDouCJ9lRMcwpGPTFoAwVOxvO',                 // EncodingAESKey
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
