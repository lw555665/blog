<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <style type="text/css">
        .custom-date-style {
            background-color: red !important;
        }

        .input{
        }
        .input-wide{
            width: 500px;
        }
        .top-right{
            margin-top: 100px;
            margin-left:800px;
        }

    </style>
    <title>@section('title')首页@show</title>
    @include('public.style')
    @yield('styles')
</head>
<body>

<section class="content">

    <div class="wraper container-fluid">

        @if(!empty(session('user')))
            <div class="top-right">

                <a class="pad-l12-xs" href="{{ url('/logout') }}">退出</a>
                <span class="hidden-xs">|</span>
                <a class="hidden-xs" href="{{ url('/user').'/'.session('user')->gu_id }}"><mark id="nicknameBox">{{ session('user')->user_name }}</mark>
                    <a href="{{ url('/user').'/'.session('user')->gu_id }}"><img id="topAvatar" class="img-circle" src="{{ empty(session('user')->headpic) ? asset('') : session('user')->head_pic }}" data-id="{{ session('user')->gu_id }}"></a>

            </div>
        @else
            <div class="top-right">
                <a href="{{ url('/register') }}">注册</a>
                <span class="">|</span>
                <a href="{{ url('/login') }}">登录</a>
                <a class="hidden-xs" href="{{ url('/login') }}"><img class="img-circle" src="{{ asset('') }}"></a>
                {{--<a href="#">英雄社区</a>--}}
            </div>

            <div class="row">


            </div>


        @endif

    </div>

        <div class="row">
            <div class="col-sm-6">
                <span>{{$data[1]->title}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>作者： {{ $data[0]->user_name }}</span>
            </div>
            <div class="col-sm-3">分类：{{ $data[1]->category }}</div>
            <div class="col-sm-3">发布时间：{{ $data[1]->published_at }}</div>



            <br><br>
            <div class="col-sm-10">{{ $data[1]->content }}</div>



</section>
</body>

@include('public.script')
@yield('script')
</html>
