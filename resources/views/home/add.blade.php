@extends('layouts.common')
@section('content')
    <div id="main-content">
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Form Layouts
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            @include('common/validate')
                            <!-- BEGIN FORM-->
                            @if(isset($edit) == 'home/edit')
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                            @else
                            <form class="form-horizontal" method="post" action="/home/doadd" enctype="multipart/form-data">
                            @endif
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="control-group">
                                    <label class="control-label">姓名</label>
                                    <div class="controls">
                                        <input type="text" name="data[name]" placeholder=".input-medium" class="input-medium" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">密码</label>
                                    <div class="controls">
                                        <input type="password" name="data[password]" placeholder=".input-medium" value="{{ old('password') }}" class="input-medium">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">类型</label>
                                    <div class="controls">
                                        <select name="data[type]" class="input-medium m-wrap" tabindex="1">
                                            <option value="Category 1">Category 1</option>
                                            <option value="Category 2">Category 2</option>
                                            <option value="Category 3">Category 5</option>
                                            <option value="Category 4">Category 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">性别</label>
                                    <div class="controls">
                                        <label class="radio">
                                            <span><input name="data[sex]" type="radio" value="1" checked=""></span>
                                            Option 1
                                        </label>
                                        <label class="radio">
                                            <span><input name="data[sex]" type="radio" value="2"></span>
                                            Option 2
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">爱好</label>
                                    <div class="controls">
                                        <label class="checkbox">
                                            <span><input type="checkbox" name="data[habby]" value="1" ></span> Checkbox 1
                                        </label>
                                        <label class="checkbox">
                                            <span><input type="checkbox" name="data[habby]" value="2" ></span> Checkbox 2
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">上传</label>
                                    <div class="controls">
                                        <input type="file" name="file" class="input-medium">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">内容</label>
                                    <div class="controls">
                                        <textarea class="input-xxlarge" rows="3" name="data[content]">{{ old('content') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn blue"><i class="icon-ok"></i> 保存</button>
                                    {{--<button type="button" class="btn"><i class=" icon-remove"></i> Cancel</button>--}}
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
@endsection
