<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Input;
use Log;
use EasyWeChat\Factory;
use EasyWeChat\Kernel\Messages\Message;
class WeChatController extends Controller
{

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
//        $config = [
//            'app_id' => 'wx88738206909faa68',
//            'secret' => '7e7cb085c0c0f5ed1d2c86d0f82a4081',
//            'token' => 'yixin',
//            'log' => [
//                'level' => 'debug',
//                'file' => __DIR__.'/wechat.log',
//            ],
//        ];
        $app = app('wechat.official_account');

        /*$app->server->push(function ($message) use ($app) {
            $user = $app->user->get($message['FromUserName']);
            return $user['nickname'];
        });
        $app->server->push(function ($message){
            return '你发了一张图片';
        },Message::VOICE);*/
        // $app->server->push(function ($message) {
        //     return json_encode(111);
        // });

        //菜单
        // $app->menu->delete();
        //       $buttons = [
        // 		[
        // 			"type" => "click",
        // 			"name" => "今日歌曲",
        // 			"key"  => "V1001_TODAY_MUSIC"
        // 		],
        // 		[
        // 			"name"       => "菜单",
        // 			"sub_button" => [
        // 				[
        // 					"type" => "view",
        // 					"name" => "搜索",
        // 					"url"  => "http://www.soso.com/"
        // 				],
        // 				[
        // 					"type" => "view",
        // 					"name" => "视频",
        // 					"url"  => "http://v.qq.com/"
        // 				],
        // 				[
        // 					"type" => "click",
        // 					"name" => "赞一下我们",
        // 					"key" => "V1001_GOOD"
        // 				],
        // 			],
        // 		],
        // 	];
        // $matchRule = [
        // 	"tag_id" => "2",
        // 	"sex" => "1",
        // 	"country" => "中国",
        // 	"province" => "广东",
        // 	"city" => "广州",
        // 	"client_platform_type" => "2",
        // 	"language" => "zh_CN"
        // ];
        // $app->menu->create($buttons, $matchRule);
        // $list = $app->menu->list();
        // $template_list = $app->template_message->getPrivateTemplates();
        // $app->template_message->send([
        // 	'touser' => 'o95CCs68_W1On4WAWuMDYsRkz_lo',
        // 	'template_id' => $template_list['template_list'][0]['template_id'],
        // 	'url' => 'https://easywechat.org',
        // 	'data' => [
        // 		'key1' => 'VALUE',
        // 		'key2' => 'VALUE2',
        // 	],
        // ]);
//         dd($template_list);
        $oauth = $app->oauth;

// 未登录
        if (empty($_SESSION['wechat_user'])) {
            return $oauth->redirect();
            // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
            // $oauth->redirect()->send();
        }
// 已经登录过
//        $response = $app->server->serve();
// 将响应输出
//        return $response; // Laravel 里请使用：return $response;
    }

    public function getuser(){
        $app = app('wechat.official_account');
        $oauth = $app->oauth;

// 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        dd($user->toArray());
    }
}
