<?php
return [

	// 安全检验码，以数字和字母组成的32位字符。
	'key' => 'mpi7fzi1njw4hnlkvwuehqvafjzmg445',

	//签名方式
	'sign_type' => 'MD5',

	// 服务器异步通知页面路径。
	'notify_url' => env('APP_URL').'pay/notify_url',

	// 页面跳转同步通知页面路径。
	'return_url' => env('APP_URL').'pay/return_url'
];
