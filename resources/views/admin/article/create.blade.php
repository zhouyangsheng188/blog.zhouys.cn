@extends('layouts.admin')

@section('title', '发布文章')

@section('css')
    <link rel="stylesheet" href="{{ asset('statics/gentelella/vendors/switchery/dist/switchery.min.css') }}">
    <link href="{{ asset('statics/jasny-bootstrap/css/jasny-bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('nav', '发布文章')

@section('description', '发布新的文章')

@section('content')

    <!-- 导航栏结束 -->
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('admin/article/index') }}">文章列表</a>
        </li>
        <li class="active">
            <a href="{{ url('admin/article/create') }}">发布文章</a>
        </li>
    </ul>
    <form class="form-horizontal" id="article_form" action="{{ url('admin/article/store') }}" method="post" enctype="multipart/form-data">
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th width="7%">分类</th>
                <td>
                    <select class="form-control" name="category_id">
                        <option value="">请选择分类</option>
                        @foreach($category as $v)
                            <option value="{{ $v->id }}" @if(old('category_id')) selected="selected" @endif>{{ $v->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>标题</th>
                <td>
                    <input class="form-control" type="text" placeholder="文章的标题" name="title" value="">
                </td>
            </tr>
            <tr>
                <th>作者</th>
                <td>
                    <input class="form-control" type="text" placeholder="文章的作者" name="author" value="">
                </td>
            </tr>
            <tr>
                <th>关键词</th>
                <td>
                    <input class="form-control" type="text" placeholder="用英文逗号分隔" name="keywords" value="">
                </td>
            </tr>
            <tr>
                <th>标签</th>
                <td>
                    @foreach($tag as $v)
                        {{ $v['name'] }}<input class="bjy-icheck" style="width: 18px;height: 18px" type="checkbox" name="tag_ids[]" value="{{ $v['id'] }}" @if(in_array($v['id'], old('tag_ids', []))) checked="checked" @endif> &emsp;
                    @endforeach
                    <i class="fa fa-plus-square" style="font-size: 20px;cursor: pointer" data-toggle="modal" data-target="#bjy-tag-modal"></i>
                </td>
            </tr>
            <tr>
                <th>封面图</th>
                <td>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 220px; height: 150px;">

                        </div>
                        <div>
                            <span class="btn btn-default btn-file">
                                <span class="fileinput-new">选择图片</span>
                                <span class="fileinput-exists">更改</span>
                                <input type="file" name="cover">
                            </span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">删除</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>描述</th>
                <td>
                    <textarea class="form-control modal-sm" name="description" rows="7" placeholder="可以不填，如不填；则截取文章内容前300字为描述">{{ old('description') }}</textarea>
                </td>
            </tr>
            <tr>
                <th>内容</th>
                <td>
                    <div id="editor"></div>
                    <input id="text1" type="hidden" name="content"  style="width:100%; height:200px;">
                </td>
            </tr>
            <tr>
                <th>置顶</th>
                <td>
                    <input class="js-switch" type="checkbox" name="is_top" value="1" @if(old('is_top', 0) == 1) checked="checked" @endif>
                </td>
            </tr>

            <tr>
                <th></th>
                <td>
                    <input id="sub_article" class="btn btn-success" type="button" value="提交">
                </td>
            </tr>
        </table>
    </form>

    {{--添加标签--}}
    <div class="modal fade" id="bjy-tag-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">添加标签</h4>
                </div>
                <div class="modal-body text-center">
                    <form class="form-inline" role="form">
                        <input class="form-control bjy-tag-name" type="text" placeholder="标签名">
                        <button type="button" class="btn btn-success" onclick="addTag()">提交</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('statics/gentelella/vendors/switchery/dist/switchery.min.js') }}"></script>
    <script src="{{ asset('statics/wangEditor/release/wangEditor.min.js') }}"></script>
    <script src="{{ asset('statics/layer/layer.js') }}"></script>
    <script src="{{asset('js/popups.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var E = window.wangEditor;
        var editor = new E('#editor');
        var $content = $('#text1');
        //上传图片
        editor.customConfig.uploadImgServer = '/admin/article/storeArticleImage';
        // 将图片大小限制为 3M
        editor.customConfig.uploadImgMaxSize = 3 * 1024 * 1024;
        // 将 timeout 时间改为 10s
        editor.customConfig.uploadImgTimeout = 10000;
        // 设置 headers
        editor.customConfig.uploadImgHeaders = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        };
        //自定义 fileName
        editor.customConfig.uploadFileName = 'articlePic';
        editor.customConfig.uploadImgHooks = {
            customInsert: function (insertImg, result, editor) {
                var url = result.url;
                insertImg(url);
            }
        }
        editor.customConfig.customAlert = function (info) {
            // info 是需要提示的内容
            alert('图片长传失败')
        }
        editor.customConfig.onchange = function (html) {
            $content.val(html)
        }
        editor.create();

        //ajax提交表单
        $('#sub_article').click(function(){
            $.ajax({
                type: 'POST',
                url: "store",
                data: $('#article_form').serialize(),
                dataType: 'json',
                success: function(res){
                    console.log(res)
                },
                error: function(response){
                    $.each(response.responseJSON.errors, function (k, v) {
                        popups.error(v[0]);
                    })
                }
            })
        })

        function addTag() {
            var postData = {
                name: $('.bjy-tag-name').val()
            }
            $.ajax({
                type: 'POST',
                url: '{{ url('admin/tag/store') }}',
                dataType: 'json',
                data: postData,
                success: function (response) {
                    var redioStr = response.name+'<input class="bjy-icheck" type="checkbox" name="tag_ids[]" value="'+response.id+'" checked="checked"> &emsp;';
                    $('.fa-plus-square').before(redioStr);
                    $('#bjy-tag-modal').modal('hide');
                },
                error: function (response) {
                    $.each(response.responseJSON.errors, function (k, v) {
                        alert(v);
                    })
                }
            })
        }
    </script>



@endsection


