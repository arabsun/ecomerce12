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
    <link rel="stylesheet" href="{{asset('public/admin/asset/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/asset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/asset/js/bootstrap-multitabs/multitabs.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/asset/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/asset/css/tagify.css')}}">


    <link rel="stylesheet" href="{{asset('public/admin/asset/css/style.min.css')}}">
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
                <a href="{{route('admin.dashboard')}}"><img class="navbar-brand img-avatar-48 " src="http://netronsoft.com/assets/images/16714627711.svg" title="LightYear" alt="LightYear" /></a>
            </div>
            <div class="lyear-layout-sidebar-info lyear-scroll ">

                <nav class="sidebar-main">
                    <ul class="nav-drawer">
                        <li class="nav-item active font-weight-bold"> <a class="multitabs" href="{{route('admin.master')}}"><i class="mdi mdi-rocket"></i> <span class="font-weight-bold">Dashboard</span></a> </li>
                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="mdi mdi-account"></i> <span class="font-weight-bold">Users/Suppliers</span></a>
                            <ul class="nav nav-subnav">
                                <li> <a class="multitabs" href="{{route('admin.client.index')}}">Manage Clients</a> </li>
                                <li> <a class="multitabs" href="{{route('admin.group.index')}}">Client Group</a> </li>
                            </ul>
                        </li>




                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="mdi mdi-cart"></i> <span class="font-weight-bold">Product/Service</span></a>
                            <ul class="nav nav-subnav">
                                <li> <a class="multitabs" href="{{route('admin.product.catalog.index')}}">Catalog/Cart</a> </li>
                                <li> <a class="multitabs" href="{{route('admin.service.product.index')}}">Services</a> </li>
                            </ul>
                        </li>

                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="mdi mdi-message-text"></i> <span class="font-weight-bold">CMS/Blog</span></a>
                            <ul class="nav nav-subnav">
                                <li> <a class="multitabs" href="{{route('admin.blog.index')}}">Blog</a> </li>
                                <li> <a class="multitabs" href="{{route('admin.slider.index')}}">Sliders</a> </li>
                            </ul>
                        </li>

                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="mdi mdi-spin mdi-settings"></i> <span class="font-weight-bold">Settings</span></a>
                            <ul class="nav nav-subnav">
                                <li> <a class="multitabs" href="{{route('admin.setting.index')}}">Basic Information</a> </li>
                                <li> <a class="multitabs" href="{{route('admin.menu.index')}}">Menu Setting</a> </li>
                                <li> <a class="multitabs" href="{{route('admin.seo.index')}}">Seo Setting</a> </li>
                                <li> <a class="multitabs" href="{{route('admin.cookie')}}">Cookie Setting</a> </li>
                                <li> <a class="multitabs" href="{{route('admin.social.login')}}">Social Login</a> </li>
                                <li> <a class="multitabs" href="{{route('admin.mail.config')}}">Email Config</a></li>
                                <li> <a class="multitabs" href="{{route('admin.captcha.setting')}}">Recaptcha Setting</a></li>
                                <li> <a class="multitabs" href="{{route('admin.currency.index')}}">Currency Settings</a></li>
                                <li> <a class="multitabs" href="{{route('admin.country.index')}}">Country Settings </a></li>
                                <li> <a class="multitabs" href="{{route('admin.role.manage')}}">Manage Role </a></li>
                                <li> <a class="multitabs" href="{{route('admin.staff.manage')}}">Manage Staff </a></li>
                                <li> <a class="multitabs" href="{{route('language.index')}}">Manage Language </a></li>
                                <li> <a class="multitabs" href="{{route('admin.gateway.index')}}">Payment Gateway </a></li>



                            </ul>
                        </li>
                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="mdi mdi-shopping"></i> <span class="font-weight-bold">Manage Orders</span></a>
                            <ul class="nav nav-subnav">
                                <li> <a class="multitabs" href="{{route('admin.order.index')}}">Orders</a> </li>
                                <li> <a class="multitabs" href="{{route('admin.service.order.index')}}">Service Orders</a> </li>
                            </ul>
                        </li>

                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="mdi mdi-television-guide"></i> <span class="font-weight-bold">Manage KYC</span></a>
                            <ul class="nav nav-subnav">
                                <li> <a class="multitabs" href="{{route('admin.kyc.index')}}">KYC Manager</a> </li>
                                <li> <a class="multitabs" href="{{route('admin.kyc.pending')}}">Pending KYC </a> </li>
                            </ul>
                        </li>



                        <li class="nav-item "> <a class="multitabs" href="{{route('admin.ticket.manage')}}"><i class="mdi mdi-google-analytics"></i> <span class="font-weight-bold">Report</span></a> </li>

                        <li class="nav-item "> <a class="multitabs" href="{{route('admin.ticket.manage')}}"><i class="mdi mdi-comment-multiple-outline"></i> <span class="font-weight-bold"> Support Ticket</span></a> </li>

                    </ul>
                </nav>

                <div class="sidebar-footer fixed-bottom">
                    <p class="copyright">Copyright © 2023. <a target="_blank" href="http://netronsoft.com">netronsoft</a> All rights reserved.</p>
                </div>
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

                    <li class="dropdown dropdown-profile">
                        <a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle">
                            <img class="img-avatar img-avatar-48 m-r-10" src="{{asset('public/admin/asset/images/'.Auth::guard('admin')->user()->photo)}}" alt="user" />
                            <span>{{Auth::guard('admin')->user()->name}} </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right ">
                            <li>
                                <a class="multitabs dropdown-item " data-url="{{route('admin.profile')}}" href="javascript:void(0)"><i class="mdi mdi-account"></i> profile</a>
                            </li>
                            <li>
                                <a class="multitabs dropdown-item" data-url="{{route('admin.password')}}" href="javascript:void(0)"><i class="mdi mdi-lock-outline"></i>  change Password</a>
                            </li>

                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item bg-danger" href="{{ route('admin.logout') }}"><i class="mdi mdi-logout-variant"></i>  sign out</a>
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
            maxTabs : 15,
            layout : 'simple'
        },
        init : [{
            type : 'main',
            title : 'Dashboard',
            url:"{{ route('admin.master')}}"
        }]
    });

    $(window).on('load', ()=>{
        $('.loader').fadeOut(2000)
    })



</script>
@yield('script')
</body>
</html>
