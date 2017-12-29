@extends('layouts.common')
@section('content')
    @if(Session::has('success'))
        {{ Session::get('success') }}
    @elseif(Session::has('error'))
        {{ Session::get('error') }}
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="main-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN BASIC PORTLET-->
                    <div class="widget orange">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Advanced Table</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-striped table-bordered table-advance table-hover">
                                <thead>
                                <tr>
                                    <th><i class=" icon-edit"></i> openid</th>
                                    <th><i class=" icon-edit"></i> nickname</th>
                                    <th><i class=" icon-edit"></i> remark</th>
                                    <th><i class=" icon-edit"></i> sex</th>
                                    <th><i class=" icon-edit"></i> country</th>
                                    <th><i class=" icon-edit"></i> province</th>
                                    <th><i class=" icon-edit"></i> city</th>
                                    <th><i class=" icon-edit"></i> headimgurl</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $key=>$sort)
                                    <tr>
                                        <td>{{ $sort['openid']}}</td>
                                        <td>{{ $sort['nickname']}}</td>
                                        <td>{{ $sort['remark']}}</td>
                                        <td>@if($sort['sex']==1)男@else女@endif</td>
                                        <td>{{ $sort['country']}}</td>
                                        <td>{{ $sort['province']}}</td>
                                        <td>{{ $sort['city']}}</td>
                                        <td><img src="{{ $sort['headimgurl'] }}" style="width:10%"> </td>
                                        <td>
                                            <button class="btn btn-success" data-openid="{{ $sort['openid']}}"><i class="icon-pencil"></i></button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END BASIC PORTLET-->
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <script>
        $(function () {
            $('.btn-success').click(function () {
                var remark = prompt('请输入文字','');
                var openid = $(this).attr('data-openid');
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: "POST",
                    url: "/wechat/remark",
                    data: {'openid':openid,'remark':remark},
                    success: function(data){
                        alert('修改备注成功');
                        window.location.reload();
                    }
                });
            })
        })
    </script>
@endsection
