@extends('layouts.common')
@section('content')
    <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
        wx.config({!! $config !!});
        wx.ready(function(){
            // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready函数中。
            wx.onMenuShareAppMessage({
                title: '测试分享', // 分享标题
                desc: '分享描述', // 分享描述
                link: 'http://yixin.webhero.top/wechat/jssdk', // 分享链接，该链接域名必须与当前企业的可信域名一致
                imgUrl: 'http://mmbiz.qpic.cn/mmbiz_jpg/dUb98zeDWo5mb0Xv3Y63PF5rujB50Hm2eAGCXBddFGvAULJ79XpjrT6Wam7QGE35q3YDm6IbVxqWMtocJWEwRg/0', // 分享图标
                type: 'link', // 分享类型,music、video或link，不填默认为link
                dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
                success: function () {
                    alert('分享成功');
                },
                cancel: function () {
                    alert('分享失败');
                }
            });
        });


    </script>
@endsection
