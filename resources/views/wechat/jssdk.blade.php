@extends('layouts.common')
@section('content')
    <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
        wx.config(<?php echo $app->jssdk->buildConfig(array('onMenuShareQQ', 'onMenuShareWeibo'), true) ?>);
    </script>
@endsection
