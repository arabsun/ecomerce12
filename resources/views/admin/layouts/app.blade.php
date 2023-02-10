<!DOCTYPE html>
<html lang="en" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <title> {{ env('APP_NAME') }} | Admin </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/assets/admin/images/logo-ico.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="{{asset('public/admin/asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.1.96/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="{{asset('public/admin/asset/js/bootstrap-multitabs/multitabs.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/asset/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/asset/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/asset/css/tagify.css')}}" rel="stylesheet">

    @yield('meta')
    @yield('style')

    <style>
        iframe {
            padding-top: 50px !important;
        }
    </style>
</head>

<body>
<div class="loader"></div>
<div class="lyear-layout-web">
    <div class="lyear-layout-container">
        <aside class="lyear-layout-sidebar">
            <div id="logo" class="sidebar-header">
                <a href="index.html">
                    <img class="navbar-brand img-avatar-48 " src="http://netronsoft.com/assets/images/16714627711.svg" title="LightYear"
                                          alt="LightYear" /></a>
            </div>
            <div class="lyear-layout-sidebar-info lyear-scroll">


                <nav class="sidebar-main">
                    <ul class="nav nav-drawer">
                        <li class="nav-item active">
                            <a class="multitabs" href="#"><i class="mdi mdi-format-align-justify"></i> <span>Dashboard</span></a> </li>

                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="mdi  mdi-account"></i> <span>Users/Suppliers</span></a>
                            <ul class="nav nav-subnav">
                                <li> <a class="multitabs" href="#">Manage Clients</a> </li>
                                <li> <a class="multitabs" href="#">Client Group</a> </li>
                            </ul>
                        </li>

                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class=" mdi  mdi-cart"></i> <span>Products and Groups</span></a>
                            <ul class="nav nav-subnav">
                                <li> <a class="multitabs" href="#">Manage Products</a> </li>
                                <li> <a class="multitabs" href="#">Mange Groups </a> </li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class=" mdi  mdi-cart"></i> <span>Orders</span></a>
                            <ul class="nav nav-subnav">
                                <li> <a class="multitabs" href="#">Manage Order</a> </li>
                                <li> <a class="multitabs" href="#">Mange Delivery </a> </li>
                            </ul>
                        </li>

                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="mdi mdi-account"></i> <span>CMS/Blog</span></a>
                            <ul class="nav nav-subnav">
                                <li> <a class="multitabs" href="#">Blog</a> </li>
                                <li> <a class="multitabs" href="#">Sliders</a> </li>
                            </ul>
                        </li>

                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="mdi mdi-account"></i> <span>Support Ticket</span></a>
                            <ul class="nav nav-subnav">
                                <li> <a class="multitabs" href="#">Support Ticket</a> </li>
                                <li> <a class="multitabs" href="#">Priority</a> </li>
                                <li> <a class="multitabs" href="#">Status</a> </li>
                                <li> <a class="multitabs" href="#">My Tickets</a> </li>
                                <li> <a class="multitabs" href="#">Category</a> </li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="mdi mdi-account"></i> <span>Marketing</span></a>
                            <ul class="nav nav-subnav">
                                <li> <a class="multitabs" href="#">Promo codes</a> </li>
                                <li> <a class="multitabs" href="#">Popup messages</a> </li>
                                <li> <a class="multitabs" href="#">Status</a> </li>
                                <li> <a class="multitabs" href="#">News letters</a> </li>
                                <li> <a class="multitabs" href="#">Settings</a> </li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="mdi mdi-account"></i> <span>Settings</span></a>
                            <ul class="nav nav-subnav">
                                <li> <a class="multitabs" href="#">Basic Information</a> </li>
                                <li> <a class="multitabs" href="#">Menu Setting</a> </li>
                                <li> <a class="multitabs" href="#">Seo Setting</a> </li>
                                <li> <a class="multitabs" href="#">Email Template</a> </li>
                                <li> <a class="multitabs" href="#">SMS Template</a> </li>
                                <li> <a class="multitabs" href="#">Email Setting</a> </li>
                                <li> <a class="multitabs" href="#">SMS Setting</a> </li>
                                <li> <a class="multitabs" href="#">Maintenance</a> </li>
                                <li> <a class="multitabs" href="#">Seo Setting</a> </li>
                                <li> <a class="multitabs" href="#">Homepage SEO Setup</a> </li>
                                <li> <a class="multitabs" href="#">Social Login</a> </li>
                                <li> <a class="multitabs" href="#">Notifications Setting</a></li>
                                <li> <a class="multitabs" href="#">Email Config</a></li>
                                <li> <a class="multitabs" href="#">Recaptcha Setting</a></li>
                                <li> <a class="multitabs" href="#">Currency Settings</a></li>
                                <li> <a class="multitabs" href="#">Language Settings</a></li>
                                <li> <a class="multitabs" href="#">Manage Country</a></li>

                            </ul>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>

        <header class="lyear-layout-header">

            <nav class="navbar">

                <div class="navbar-left">
                    <div class="lyear-aside-toggler">
                        <span class="lyear-toggler-bar"></span>
                        <span class="lyear-toggler-bar"></span>
                        <span class="lyear-toggler-bar"></span>
                    </div>
                </div>

                <ul class="navbar-right d-flex align-items-center">

                    <!--切换主题配色-->
                    <li class="dropdown dropdown-profile">
                        <a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle">
                            <img class="img-avatar img-avatar-48 m-r-10" src="{{asset('assets/images/'.Auth::guard('admin')->user()->photo)}}" alt="user" />
                            <span>{{Auth::guard('admin')->user()->username}} </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a class="multitabs dropdown-item" data-url="{{route('admin.profile')}}" href="javascript:void(0)"><i class="mdi mdi-account"></i> profile</a>
                            </li>
                            <li>
                                <a class="multitabs dropdown-item" data-url="#" href="javascript:void(0)"><i class="mdi mdi-lock-outline"></i>  change Password</a>
                            </li>

                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="mdi mdi-logout-variant"></i>  sign out</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </nav>

        </header>
        <main class="lyear-layout-content">

            <div id="iframe-content">

            </div>
        </main>

    </div>
</div>



<script src="{{asset('public/admin/asset/js/jquery.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/popper.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/bootstrap-multitabs/multitabs.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/jquery.cookie.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/tagify.js')}}"></script>
<script src="{{asset('public/admin/asset/js/index.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/main.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/Chart.min.js')}}"></script>


<script>



    $(window).on('load','iframe',function(){
        $('.loader_image').hide();
    })


    $(document).on('click','.multitabs',function(){
        $('.loader_image').show();
    })



    $('#iframe-content').multitabs({
        iframe : true,
        refresh : 'no',
        nav: {
            backgroundColor: '#ffffff',
            maxTabs : 35,
            layout : 'simple'
        },
        init : [{
            type : 'main',
            title : 'Dashboard',
            url:"{!! route('admin.main'); !!}"
        }]
    });

    $(window).on('load', ()=>{
        $('.loader').fadeOut(500)
    })



</script>
@yield('script')
</body>
</html>
