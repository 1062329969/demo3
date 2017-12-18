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
                                    <th><i class="icon-bullhorn"></i> Company</th>
                                    <th class="hidden-phone"><i class="icon-question-sign"></i> Descrition</th>
                                    <th><i class="icon-bookmark"></i> Profit</th>
                                    <th><i class=" icon-edit"></i> Status</th>
                                    <th><i class=" icon-edit"></i> 图片</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $key=>$sort)
                                    <tr>
                                        <td><a href="#">{{ $sort ->id  }}</a></td>
                                        <td class="hidden-phone">{{ $sort -> name  }}</td>
                                        <td>12120.00$ </td>
                                        <td><span class="label label-important label-mini">Due</span></td>
                                        <td><img src="/storage/app/{{ $sort -> img  }}" /></td>
                                        <td>
                                            <button class="btn btn-success"><i class="icon-ok"></i></button>
                                            <a href="/home/edit/{{ $sort ->id  }}" class="btn btn-primary"><i class="icon-pencil"></i></a>
                                            <button class="btn btn-danger" data="{{ $sort ->id  }}"><i class="icon-trash "></i></button>
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
<script>
    $(function () {
        $('.btn-danger').click(function () {
            var _id = $(this).attr('data');
            var _self = $(this);
            $.ajax({
                type: "GET",
                url: "/home/delete",
                data: {'id':_id},
                success: function(data){
                    alert(data);
                    _self.parents('tr').remove();
                }
            });
        })
    })
</script>
@endsection
