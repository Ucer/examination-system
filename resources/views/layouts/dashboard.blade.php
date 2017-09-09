<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','首页')-系统后台 </title>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/mycss.css">
    <link rel="stylesheet" href="/css/dfjs_public.css">
    @yield('style')


</head>
<body>
<div class="row head">
    <div class="col-xs-12 ph10 hh">
        <h3 class="fl mh0"><a href="{{ route('home') }}">考试系统</a></h3>
        <ul class="nav nav-pills ml40 fl" role="tablist" id="nav_top">
            <li role="presentation" @if(request()->url() == route('dashboard'))class="active" @endif><a href="{{ route('dashboard') }}">试题库</a></li>
            <li role="presentation" @if(request()->url() == route('dashboard.paper'))class="active" @endif><a href="{{ route('dashboard.paper') }}">试卷库</a></li>
            <li role="presentation" @if(request()->url() == 'sdf')class="active" @endif><a href="#">答卷列表</a></li>
        </ul>
        <div class="fr">
            <div class="btn-group fl">
                <a href="{{ route('topic.c') }}" class="btn btn-success">新增试题</a>
                <a href="{{ route('paper.c') }}" class="btn btn-info">新增试卷</a>
            </div>

            <div id="search_top" style="width:300px;display:none;" class="fl ml20">
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                                <button class="btn btn-default"><span
                                            class="glyphicon glyphicon-search"></span></button>
                            </span>
                </div>
            </div>

            <button class="btn btn-default ml20" onclick="show_right();">
                <span class="glyphicon glyphicon-step-forward"></span>
            </button>


        </div>
    </div>
</div>
        @yield('content')
</body>

<script src="/js/jquery.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/uedit/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/uedit/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/uedit/lang/zh-cn/zh-cn.js"></script>

<script>
    function show_right(){
        if($('.frame_left').hasClass('col-xs-10')){
            $('.frame_left').removeClass('col-xs-10');
            $('.frame_left').addClass('col-xs-12');
            $('.frame_right').hide();
        }else{
            $('.frame_left').removeClass('col-xs-12');
            $('.frame_left').addClass('col-xs-10');
            $('.frame_right').show();
        }

        $('#search_top').toggle();
    }

    $(function(){
        $('#nav_top li').click(function(){
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });
    })

    $(function(){
        $('.search_list dt').click(function(){
            $(this).next().toggle();
            $(this).children('span').toggleClass('sjb');
        });
    })
</script>
@yield('scripts')
</html>