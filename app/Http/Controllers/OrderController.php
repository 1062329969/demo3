<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Input;
use App\Model\Order;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function set_order(Request $request){
        $data['order_code'] = date('YmdHis',time()).rand(1000,9999);
        $data['state'] = 0;
        $data['addtime'] = time();
        $data['money'] = 0.01;
        $User = new Order();
        $res = $User->insert($data);
        $alipay = app('alipay.web');
        $alipay->setOutTradeNo($data['order_code']);
        $alipay->setTotalFee(0.01);
        $alipay->setSubject('goods_name');
        $alipay->setBody('goods_description');
//        $alipay->setQrPayMode('4'); //该设置为可选，添加该参数设置，支持二维码支付。
        // 跳转到支付页面。
        return redirect()->to($alipay->getPayLink());
    }

}
