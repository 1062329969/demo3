<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Input;
use Illuminate\Http\Request;
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
        $app = app('wechat.official_account');
        /*$app->server->push(function ($message) use ($app) {
            $user = $app->user->get($message['FromUserName']);
            return $user['nickname'];
        });
        $app->server->push(function ($message){
            return '你发了一张图片';
        },Message::VOICE);*/
        $app->server->push(function($message){
            return "欢迎关注你，欢迎来到朕的世界！";
        });
        return $app->server->serve();
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
    }

    public function wxoauth(){
        $app = app('wechat.official_account');
        $oauth = $app->oauth;
        if (empty($_SESSION['wechat_user'])) {
            return $oauth->redirect();
        }
    }

    public function getuser(){
        $app = app('wechat.official_account');
        $oauth = $app->oauth;

// 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        dd($user->toArray());
    }
    public function getwxuser(){
        $app = app('wechat.official_account');
        $list = $app->user->list();
        $users = $app->user->select($list['data']['openid']);
        return view('wechat/home',['list'=>$users['user_info_list']]);
    }

    public function remark(Request $request){
        if($request->isMethod('post')){
            $app = app('wechat.official_account');
            $openid = $request->get('openid');
            $remark = $request->get('remark');
            dd($app->user->remark($openid, $remark));
        }
    }

    public function jssdk(){
        return view('wechat/jssdk');
    }
}
