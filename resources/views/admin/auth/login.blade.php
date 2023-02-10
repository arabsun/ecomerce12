<!DOCTYPE html>
    <html lang="zh">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <title>文档列表 - 光年(Light Year Admin)后台管理系统模板</title>
        <link rel="icon" href="favicon.ico" type="image/ico">
        <meta name="keywords" content="LightYear,光年,后台模板,后台管理系统,光年HTML模板">
        <meta name="description" content="LightYear是一个基于Bootstrap v3.3.7的后台管理系统的HTML模板。">
        <meta name="author" content="yinqi">
        <link href="{{asset('public/admin/asset/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/admin/asset/css/materialdesignicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/admin/asset/css/style.min.css')}}" rel="stylesheet">
    </head>
    <body>
        <div class="row lyear-wrapper" style="background-image: url({{asset('public/admin/asset/images/login-bg.jpg')}}); background-size: cover;">
            <div class="lyear-login">
                <div class="login-center">
                    <div class="login-header text-center">
                        <a href="{{env('APP_URL')}}"> <img alt="light year admin" src="{{asset('public/admin/asset/images/logo-sidebar.png')}}"> </a>
                    </div>
                    <form action="{{route('admin.auth')}}" method="post">
                        @csrf
                        <div class="form-group has-feedback feedback-left">
                            <input type="text" placeholder="{{__('username')}}" class="form-control" name="username" id="username" />
                            <span class="mdi mdi-account form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback feedback-left">
                            <input type="password" placeholder="{{__('password')}}" class="form-control" id="password" name="password" />
                            <span class="mdi mdi-lock form-control-feedback" aria-hidden="true"></span>
                        </div>
    {{--                    <div class="form-group has-feedback feedback-left row">--}}
    {{--                        <div class="col-xs-7">--}}
    {{--                            <input type="text" name="captcha" class="form-control" placeholder="验证码">--}}
    {{--                            <span class="mdi mdi-check-all form-control-feedback" aria-hidden="true"></span>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-xs-5">--}}
    {{--                            <img src="images/captcha.png" class="pull-right" id="captcha" style="cursor: pointer;" onclick="this.src=this.src+'?d='+Math.random();" title="点击刷新" alt="captcha">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group">--}}
    {{--                        <label class="lyear-checkbox checkbox-primary m-t-10">--}}
    {{--                            <input type="checkbox"><span>5天内自动登录</span>--}}
    {{--                        </label>--}}
    {{--                    </div>--}}
                        <div class="form-group">
                            <button class="btn btn-block btn-primary" type="submit" >
                                {{__('submit')}}</button>
                        </div>
                    </form>
                    <hr>
                    <footer class="col-sm-12 text-center">
                        <p class="m-b-0">{{__('Copyright')}} © {{date('Y')}} <a href="{{env('APP_URL')}}">{{__('APP_NAME')}}</a>. {{__('All right reserved')}}</p>
                    </footer>
                </div>
            </div>
        </div>
        <style>
            .lyear-wrapper {
                position: relative;
            }
            .lyear-login {
                display: flex !important;
                min-height: 100vh;
                align-items: center !important;
                justify-content: center !important;
            }
            .lyear-login:after{
                content: '';
                min-height: inherit;
                font-size: 0;
            }
            .login-center {
                background: #fff;
                min-width: 29.25rem;
                padding: 2.14286em 3.57143em;
                border-radius: 3px;
                margin: 2.85714em;
            }
            .login-header {
                margin-bottom: 1.5rem !important;
            }
            .login-center .has-feedback.feedback-left .form-control {
                padding-left: 38px;
                padding-right: 12px;
            }
            .login-center .has-feedback.feedback-left .form-control-feedback {
                left: 0;
                right: auto;
                width: 38px;
                height: 38px;
                line-height: 38px;
                z-index: 4;
                color: #dcdcdc;
            }
            .login-center .has-feedback.feedback-left.row .form-control-feedback {
                left: 15px;
            }
        </style>
        <script type="text/javascript" src="{{asset('public/admin/asset/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/admin/asset/js/bootstrap.min.js')}}"></script>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block alert-message-admin">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif


        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block alert-message-admin">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif


        @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-block alert-message-admin">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif


        @if ($message = Session::get('info'))
            <div class="alert alert-info alert-block alert-message-admin">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif


        @if ($errors->any())
            <div class="alert alert-danger alert-message-admin">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Please check the form below for errors
            </div>
        @endif
        <style>
            .alert-message-admin{
                position: absolute;
                bottom: 3%;
                right: 1%;
            }
        </style>
        @yield('script')
    </body>
</html>
