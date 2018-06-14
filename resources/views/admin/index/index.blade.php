@extends('layouts.admin')

@section('content')

    <div class="row top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-comments-o"></i></div>
                <div class="count">313</div>
                <h3>总评论数</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div class="count">77</div>
                <h3>第三方用户</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-book"></i></div>
                <div class="count">12</div>
                <h3>原创文章</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-wechat"></i></div>
                <div class="count">55</div>
                <h3>随言碎语</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>最新登录的用户<small>top 5</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                        <article class="media event">
                            <a class="pull-left">
                                <img class="bjy-img" src="" alt="">
                            </a>
                            <div class="media-body">
                                上的符合规定
                                <p>
                                    登录次数：112 <br>
                                    登录时间：25632
                                </p>
                            </div>
                        </article>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>最新评论 <small>top5</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                        <article class="media event">
                            <a class="pull-left">
                                <img class="bjy-img" src="" alt="">
                            </a>
                            <div class="media-body">
                                对方国家和地方
                                <p>
                                    <a href="">十大富豪公司的</a>
                                    <br>
                                    的风格和的风格和
                                </p>
                            </div>
                        </article>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>环境 <small>php</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content bjy-content">
                    <ul class="list-inline widget_tally">
                        <li>
                            <p>
                                <span class="month">博客版本 </span>
                                <span class="count">五七二 <a href="" target="_blank">更新</a></span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <span class="month">操作系统 </span>
                                <span class="count">对方是个</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <span class="month">环境 </span>
                                <span class="count">东方红各个地方</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <span class="month">php </span>
                                <span class="count">123</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <span class="month">mysql </span>
                                <span class="count">32456</span>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection