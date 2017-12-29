@extends('layouts.common')
@section('content')
    @if(Session::has('success'))
        {{ Session::get('success') }}
    @elseif(Session::has('error'))
        {{ Session::get('error') }}
    @endif
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
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list['data']['openid'] as $key=>$sort)
                                    <tr>
                                        <td>{{ $sort }}</td>
                                        <td>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6" class="pagination">{{ $list->links() }}</td>
                                </tr>
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
@endsection
