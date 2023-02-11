<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Admin</title>
    <link rel="icon" href="favicon.ico" type="image/ico">
    <meta name="keywords" content="Admin">
    <meta name="description" content="Admin">
    <meta name="author" content="yinqi">
    @yield('meta')
    @yield('style')
    <link href="{{asset('public/admin/asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/asset/css/materialdesignicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/asset/js/bootstrap-multitabs/multitabs.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/asset/css/style.min.css')}}" rel="stylesheet">
</head>
<body>
    <div class="lyear-layout-web">
        <div class="lyear-layout-container">
            <!--navbar-->
                @include('admin.inc.nav')
            <!--End navbar-->

            <!--header-->
                @include('admin.inc.header')
            <!--End header-->
            <!--content-->
            <main class="lyear-layout-content">
                <div id="iframe-content">
                    @yield('content')
                </div>
            </main>
            <!--End content-->
        </div>
    </div>
    <div class="lyear-layout-web">

    <script type="text/javascript" src="{{asset('public/admin/asset/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/asset/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/asset/js/perfect-scrollbar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/asset/js/bootstrap-multitabs/multitabs.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/asset/js/index.min.js')}}"></script>

    @yield('script')
</body>
</html>
