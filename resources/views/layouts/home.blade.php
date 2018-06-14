<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/bootstrap-3.3.5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/bootstrap-3.3.5/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/css/bjy.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/animate/animate.min.css') }}">
</head>
<body>
<!-- 顶部导航开始 -->
<header id="b-public-nav" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/" onclick="recordId('/',0)">
                <div class="hidden-xs b-nav-background"></div>
                <ul class="b-logo-code">
                    <li class="b-lc-start"></li>
                    <li class="b-lc-echo"></li>
                </ul>
                <p class="b-logo-word">周阳生博客</p>
                <p class="b-logo-end"></p>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav b-nav-parent">
                <li class="hidden-xs b-nav-mobile"></li>
                <li class="b-nav-cname  b-nav-active ">
                    <a href="/" onclick="">首页</a>
                </li>
                <li class="b-nav-cname ">
                    <a href="" onclick="">PHP</a>
                </li>
                <li class="b-nav-cname ">
                    <a href="">随言碎语</a>
                </li>
                <li class="b-nav-cname hidden-sm">
                    <a href="">开源项目</a>
                </li>
            </ul>
            <ul id="b-login-word" class="nav navbar-nav navbar-right">
                @if(empty(session('user.name')))
                    <li class="b-nav-cname b-nav-login">
                        <div class="hidden-xs b-login-mobile"></div>
                        <a href="javascript:;" onclick="login()">登录</a>
                    </li>
                @else
                    <li class="b-user-info">
                        <span><img class="b-head_img" src="" alt="" title=""  /></span>
                        <span class="b-nickname"></span>
                        <span><a href="">退出</a></span>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</header>
<!-- 顶部导航结束 -->

<div class="b-h-70"></div>

<div id="b-content" class="container">
    <div class="row">
        @yield('content')
        <!-- 通用右部区域开始 -->
        <div id="b-public-right" class="col-lg-4 hidden-xs hidden-sm hidden-md">
            <div class="b-search">
                <form class="form-inline"  role="form" action="" method="get">
                    <input class="b-search-text" type="text" name="wd">
                    <input class="b-search-submit" type="submit" value="全站搜索">
                </form>
            </div>
            {{--@if(!empty($config['QQ_QUN_NUMBER']))--}}
                {{--<div class="b-tags">--}}
                    {{--<h4 class="b-title">加入组织</h4>--}}
                    {{--<ul class="b-all-tname">--}}
                        {{--<li class="b-qun-or-code">--}}
                            {{--<img src="{{ asset($config['QQ_QUN_OR_CODE']) }}" alt="QQ">--}}
                        {{--</li>--}}
                        {{--<li class="b-qun-word">--}}
                            {{--<p class="b-qun-nuber">--}}
                                {{--1. 手Q扫左侧二维码--}}
                            {{--</p>--}}
                            {{--<p class="b-qun-nuber">--}}
                                {{--2. 搜Q群：{{ $config['QQ_QUN_NUMBER'] }}--}}
                            {{--</p>--}}
                            {{--<p class="b-qun-code">--}}
                                {{--3. 点击{!! $config['QQ_QUN_CODE'] !!}--}}
                            {{--</p>--}}
                            {{--<p class="b-qun-article">--}}
                                {{--@if(!empty($qqQunArticle['id']))--}}
                                    {{--<a href="{{ url('article', [$qqQunArticle['id']]) }}" target="_blank">{{ $qqQunArticle['title'] }}</a>--}}
                                {{--@endif--}}
                            {{--</p>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--@endif--}}
            <div class="b-tags">
                <h4 class="b-title">热门标签</h4>
                <ul class="b-all-tname">
                    <?php $tag_i = 0; ?>

                        <?php $tag_i++; ?>
                        <?php $tag_i=$tag_i==5?1:$tag_i; ?>
                        <li class="b-tname">
                            <a class="tstyle-{{$tag_i}}" href="" onclick="">标签 (132)</a>
                        </li>

                </ul>
            </div>
            <div class="b-recommend">
                <h4 class="b-title">置顶推荐</h4>
                <p class="b-recommend-p">

                        <a class="b-recommend-a" href="" target="_blank"><span class="fa fa-th-list b-black"></span> 都是废话</a>

                </p>
            </div>
            <div class="b-link">
                <h4 class="b-title">最新评论</h4>
                <div>
                        <ul class="b-new-comment  b-new-commit-first ">
                            <img class="b-head-img js-head-img" src="{{ asset('uploads/avatar/default.jpg') }}" _src="{{ asset('uploads/avatar/default.jpg') }}" alt="阿萨德股份">
                            <li class="b-nickname">
                                对方过后<span>闪电发货</span>
                            </li>
                            <li class="b-nc-article">
                                在<a href="" target="_blank">闪热天</a>中评论
                            </li>
                            <li class="b-content">
                                有欧式的风格
                            </li>
                        </ul>
                </div>
            </div>
            <eq name="show_link" value="1">
                <div class="b-link">
                    <h4 class="b-title">友情链接</h4>
                    <p>

                            <a class="b-link-a" href="" target="_blank"><span class="fa fa-link b-black"></span> 爱的时光</a>

                    </p>
                </div>
            </eq>
        </div>
        <!-- 通用右部区域结束 -->
    </div>
    <div class="row">
        <!-- 通用底部文件开始 -->
        <footer id="b-foot" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul>
                <li class="text-center">
                    本博客使用免费开源的 <a rel="nofollow" href="https://github.com/baijunyao/laravel-bjyblog" target="_blank">laravel-bjyblog</a> 二次开发搭建 © 2014-2018 免费开源
                </li>
                <li class="text-center">

                        联系邮箱：136250909@qq.com

                </li>
            </ul>
            <div class="b-h-20"></div>
            <a class="go-top fa fa-angle-up animated jello" href="javascript:;" onclick="goTop()"></a>
        </footer>
        <!-- 通用底部文件结束 -->
    </div>
</div>
<!-- 主体部分结束 -->

<script src="{{ asset('statics/js/jquery-2.0.0.min.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{ asset('statics/bootstrap-3.3.5/js/bootstrap.min.js') }}"></script>
<!--[if lt IE 9]>
<script src="{{ asset('statics/js/html5shiv.min.js') }}"></script>
<script src="{{ asset('statics/js/respond.min.js') }}"></script>
<![endif]-->
<script src="{{ asset('statics/pace/pace.min.js') }}"></script>
<script src="{{ asset('js/home/index.js') }}"></script>

</body>
</html>