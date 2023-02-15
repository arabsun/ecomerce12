<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>Maak App </title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta')
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/slick-carousel/slick/slick.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">

    <!-- JS Front -->
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/animate.css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/vendor/hs-megamenu/src/hs.megamenu.css')}}">

    <!-- CSS Bookworm Template -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/theme.css')}}">

    @yield('style')
</head>
<body>

<!-- ===== HEADER CONTENT ===== -->
<header id="site-header" class="site-header__v9 site-header__white-text">

    <div class="masthead">
        <div class="container pt-3 pt-md-4 pb-3 pb-md-5">
            <div class="d-flex align-items-center position-relative flex-wrap">
                <div class="offcanvas-toggler mr-5">
                    <a id="sidebarNavToggler2" href="javascript:;" role="button" class="cat-menu"
                       aria-controls="sidebarContent2"
                       aria-haspopup="true"
                       aria-expanded="false"
                       data-unfold-event="click"
                       data-unfold-hide-on-scroll="false"
                       data-unfold-target="#sidebarContent2"
                       data-unfold-type="css-animation"
                       data-unfold-overlay='{
                            "className": "u-sidebar-bg-overlay",
                            "background": "rgba(0, 0, 0, .7)",
                            "animationSpeed": 100
                        }'
                       data-unfold-animation-in="fadeInLeft"
                       data-unfold-animation-out="fadeOutLeft"
                       data-unfold-duration="100">
                        <svg width="20px" height="18px">
                            <path fill-rule="evenodd"  fill="rgb(25, 17, 11)" d="M-0.000,-0.000 L20.000,-0.000 L20.000,2.000 L-0.000,2.000 L-0.000,-0.000 Z"/>
                            <path fill-rule="evenodd"  fill="rgb(25, 17, 11)" d="M-0.000,8.000 L15.000,8.000 L15.000,10.000 L-0.000,10.000 L-0.000,8.000 Z"/>
                            <path fill-rule="evenodd"  fill="rgb(25, 17, 11)" d="M-0.000,16.000 L20.000,16.000 L20.000,18.000 L-0.000,18.000 L-0.000,16.000 Z"/>
                        </svg>
                    </a>
                </div>
                <div class="site-branding pr-7">
                    <a href="index.html" class="d-block mb-1">
                        <img class ="navbar-toggler-icon" src="assets/img/logo.png" style="width: 100% ;"></img>
                    </a>
                </div>
                <div class="site-search ml-xl-0 ml-md-auto w-r-100 flex-grow-1 mr-md-5 mt-2 mt-md-0 order-1 order-md-0">
                    <form class="form-inline my-2 my-xl-0">
                        <div class="input-group input-group-borderless w-100">
                            <div class="input-group-prepend border-right mr-0 d-none d-xl-block">
                                <select class="custom-select pr-7 pl-4 rounded-right-0 height-5 shadow-none border-0 text-dark bg-white-100 bg-focus__1" id="inputGroupSelect01">

                                    <!--                                        fetch categ here -->

                                    <option selected>All Categories</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <!--                                        fetch categ here -->

                                </select>
                            </div>
                            <input type="text" class="form-control px-3 bg-white-100 bg-focus__1" placeholder="Search for books by keyword" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-3 py-2" type="submit"><i class="mx-1 glph-icon flaticon-loupe text-white"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-flex align-items-center mt-lg-3 mt-xl-0">
                    <!-- Account Sidebar Toggle Button -->
                    <a id="sidebarNavToggler" href="javascript:;" role="button"
                       aria-controls="sidebarContent"
                       aria-haspopup="true"
                       aria-expanded="false"
                       data-unfold-event="click"
                       data-unfold-hide-on-scroll="false"
                       data-unfold-target="#sidebarContent"
                       data-unfold-type="css-animation"
                       data-unfold-overlay='{
                                "className": "u-sidebar-bg-overlay",
                                "background": "rgba(0, 0, 0, .7)",
                                "animationSpeed": 500
                            }'
                       data-unfold-animation-in="fadeInRight"
                       data-unfold-animation-out="fadeOutRight"
                       data-unfold-duration="500">
                        <div class="d-flex align-items-center text-white font-size-2 text-lh-sm">
                            <i class="flaticon-user font-size-4 text-dark"></i>
                            <div class="ml-2 d-none d-lg-block">
                                <span class="text-secondary-gray-1080 font-size-1">Sign In</span>
                                <div class="text-secondary-black-100 font-size-2">My Account</div>
                            </div>
                        </div>
                    </a>
                    <!-- End Account Sidebar Toggle Button -->

                    <!-- Cart Sidebar Toggle Button -->
                    <a id="sidebarNavToggler1" href="javascript:;" role="button" class="ml-4 d-none d-lg-block"
                       aria-controls="sidebarContent1"
                       aria-haspopup="true"
                       aria-expanded="false"
                       data-unfold-event="click"
                       data-unfold-hide-on-scroll="false"
                       data-unfold-target="#sidebarContent1"
                       data-unfold-type="css-animation"
                       data-unfold-overlay='{
                                "className": "u-sidebar-bg-overlay",
                                "background": "rgba(0, 0, 0, .7)",
                                "animationSpeed": 500
                            }'
                       data-unfold-animation-in="fadeInRight"
                       data-unfold-animation-out="fadeOutRight"
                       data-unfold-duration="500">
                        <div class="d-flex align-items-center text-white font-size-2 text-lh-sm position-relative">
                            <span class="position-absolute width-16 height-16 rounded-circle d-flex align-items-center justify-content-center bg-dark-1 text-white font-size-n9 left-0 top-0 ml-n2 mt-n1">3</span>
                            <i class="flaticon-icon-126515 font-size-4 text-secondary-black-100"></i>
                            <div class="ml-2">
                                <span class="text-secondary-gray-1080 font-size-1">My Cart</span>
                                <div class="font-size-2 text-secondary-black-100">$40.93</div>
                            </div>
                        </div>
                    </a>
                    <!-- End Cart Sidebar Toggle Button -->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="bg-primary rounded-md d-none d-md-block">
                <div class="d-flex align-items-center justify-content-center position-relative">
                    <div class="site-navigation mr-auto d-none d-xl-block">
                        <ul class="nav pl-xl-4">
                            <li class="nav-item">
                                <a href="#" class="nav-link link-black-100 mx-3 px-0 py-3
                                    font-size-2 font-weight-medium">Home</a></li>
                            <li class="nav-item">
                                <a href="#" class="nav-link link-black-100 mx-3 px-0 py-3
                                    font-size-2 font-weight-medium">Categories</a></li>
                            <li class="nav-item dropdown">
                                <a id="shopDropdownInvoker" href="#" class="dropdown-toggle nav-link link-black-100 mx-3 px-0 py-3 font-size-2 font-weight-medium d-flex align-items-center"
                                   aria-haspopup="true"
                                   aria-expanded="false"
                                   data-unfold-event="hover"
                                   data-unfold-target="#shopDropdownMenu"
                                   data-unfold-type="css-animation"
                                   data-unfold-duration="200"
                                   data-unfold-delay="50"
                                   data-unfold-hide-on-scroll="true"
                                   data-unfold-animation-in="slideInUp"
                                   data-unfold-animation-out="fadeOut">

                                    categorys
                                </a>
                                <ul id="shopDropdownMenu" class="dropdown-unfold dropdown-menu font-size-2 rounded-0 border-gray-900" aria-labelledby="shopDropdownInvoker">
                                    <li class="position-relative">
                                        <a id="shopDropdownsubmenuoneInvoker"
                                           href="#" class="dropdown-toggle dropdown-item dropdown-item__sub-menu link-black-100 d-flex align-items-center justify-content-between"
                                           aria-haspopup="true"
                                           aria-expanded="false"
                                           data-unfold-event="hover"
                                           data-unfold-target="#shopDropdownsubMenuone"
                                           data-unfold-type="css-animation"
                                           data-unfold-duration="200"
                                           data-unfold-delay="100"
                                           data-unfold-hide-on-scroll="true"
                                           data-unfold-animation-in="slideInUp"
                                           data-unfold-animation-out="fadeOut">
                                            sub1
                                        </a>
                                        <ul id="shopDropdownsubMenuone" class="dropdown-unfold dropdown-menu dropdown-sub-menu font-size-2 rounded-0 border-gray-900" aria-labelledby="shopDropdownsubmenuoneInvoker">
                                            <li><a href="../shop/v1.html" class="dropdown-item link-black-100">childe 1</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="../shop/store-location.html" class="dropdown-item link-black-100">
                                            sub2</a></li>
                                </ul>
                            </li>




                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Account Sidebar Navigation - Desktop -->




