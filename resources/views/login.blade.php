<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    @include('public.style')
</head>
<body>

<div class="wrapper-page">
    <div class="panel panel-color panel-inverse">
        <div class="panel-heading">
            <h3 class="text-center m-t-10">个人中心</h3>
        </div>

        <div class="panel-body">
            @include('public.errors')

            <form class="form-horizontal m-t-10 p-20 p-b-0" id="signOnForm" method="post" action="{{url('login')}}">
                {{csrf_field()}}
                {{--邮箱账号--}}
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input name="email" class="form-control" type="text" placeholder="邮箱...">
                    </div>
                </div>
                {{--密码--}}
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input name="password" class="form-control" type="password" placeholder="密码...">
                    </div>
                </div>
                {{--验证码--}}

                {{--Session机制--}}
                <div class="form-group ">
                    <div class="col-xs-12">
                        <label class="cr-styled">
                            <input type="checkbox" checked>
                            <i class="fa"></i>
                            Remember me
                        </label>
                    </div>
                </div>

                <div class="form-group text-right">
                    <div class="col-xs-12">
                        <button class="btn btn-success w-md" type="submit">登录</button>
                    </div>
                </div>
                <div class="form-group m-t-30">
                    <div class="col-sm-7">

                    </div>
                    <div class="col-sm-5 text-right">
                        <a href="{{url('/register')}}">注册账号</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@include('public.script')
@section('script')
    <!-- 验证机制 Start -->
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/login-validator.js')}}"></script>
    <!-- 验证机制 End -->
@endsection
</body>
</html>
