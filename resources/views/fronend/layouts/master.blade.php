<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>Maak App </title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{URL::asset('frontend/vendor/font-awesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/vendor/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/vendor/slick-carousel/slick/slick.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('frontend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">

    <!-- JS Front -->
    <link rel="stylesheet" href=" {{URL::asset('frontend/vendor/animate.css/animate.css')}}">
    <link rel="stylesheet" href="{{URL::asset('frontend/vendor/hs-megamenu/src/hs.megamenu.css')}}">

    <!-- CSS Bookworm Template -->
    <link rel="stylesheet" href="{{URL::asset('frontend/css/theme.css')}}">
</head>

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
                        <img class ="navbar-toggler-icon" src="{{URL::asset('frontend/img/logo.png')}}" style="width: 100% ;"></img>
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
<aside id="sidebarContent" class="u-sidebar u-sidebar__lg" aria-labelledby="sidebarNavToggler">
    <div class="u-sidebar__scroller">
        <div class="u-sidebar__container">
            <div class="u-header-sidebar__footer-offset">
                <!-- Toggle Button -->
                <div class="d-flex align-items-center position-absolute top-0 right-0 z-index-2 mt-5 mr-md-6 mr-4">
                    <button type="button" class="close ml-auto"
                            aria-controls="sidebarContent"
                            aria-haspopup="true"
                            aria-expanded="false"
                            data-unfold-event="click"
                            data-unfold-hide-on-scroll="false"
                            data-unfold-target="#sidebarContent"
                            data-unfold-type="css-animation"
                            data-unfold-animation-in="fadeInRight"
                            data-unfold-animation-out="fadeOutRight"
                            data-unfold-duration="500">
                        <span aria-hidden="true">Close <i class="fas fa-times ml-2"></i></span>
                    </button>
                </div>
                <!-- End Toggle Button -->

                <!-- Content -->
                <div class="js-scrollbar u-sidebar__body">
                    <div class="u-sidebar__content u-header-sidebar__content">
                        <form class="">
                            <!-- Login -->
                            <div id="login" data-target-group="idForm">
                                <!-- Title -->
                                <header class="border-bottom px-4 px-md-6 py-4">
                                    <h2 class="font-size-3 mb-0 d-flex align-items-center"><i class="flaticon-user mr-3 font-size-5"></i>Account</h2>
                                </header>
                                <!-- End Title -->

                                <div class="p-4 p-md-6">
                                    <!-- Form Group -->
                                    <div class="form-group mb-4">
                                        <div class="js-form-message js-focus-state">
                                            <label id="signinEmailLabel" class="form-label" for="signinEmail">Username or email *</label>
                                            <input type="email" class="form-control rounded-0 height-4 px-4" name="email" id="signinEmail" placeholder="creativelayers088@gmail.com" aria-label="creativelayers088@gmail.com" aria-describedby="signinEmailLabel" required>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <!-- Form Group -->
                                    <div class="form-group mb-4">
                                        <div class="js-form-message js-focus-state">
                                            <label id="signinPasswordLabel" class="form-label" for="signinPassword">Password *</label>
                                            <input type="password" class="form-control rounded-0 height-4 px-4" name="password" id="signinPassword" placeholder="" aria-label="" aria-describedby="signinPasswordLabel" required>
                                        </div>
                                    </div>
                                    <!-- End Form Group -->

                                    <div class="d-flex justify-content-between mb-5 align-items-center">
                                        <!-- Checkbox -->
                                        <div class="js-form-message">
                                            <div class="custom-control custom-checkbox d-flex align-items-center text-muted">
                                                <input type="checkbox" class="custom-control-input" id="termsCheckbox" name="termsCheckbox" required>
                                                <label class="custom-control-label" for="termsCheckbox">
                                                        <span class="font-size-2 text-secondary-gray-700">
                                                            Remember me
                                                        </span>
                                                </label>
                                            </div>
                                        </div>
                                        <!-- End Checkbox -->

                                        <a class="js-animation-link text-dark font-size-2 t-d-u link-muted font-weight-medium" href="javascript:;"
                                           data-target="#forgotPassword"
                                           data-link-group="idForm"
                                           data-animation-in="fadeIn">Forgot Password?</a>
                                    </div>

                                    <div class="mb-4d75">
                                        <button type="submit" class="btn btn-block py-3 rounded-0 btn-primary">Sign In</button>
                                    </div>
                                    <div class="mb-2">
                                        <a href="javascript:;"
                                           class="js-animation-link btn btn-block py-3 rounded-0 btn-outline-dark font-weight-medium"
                                           data-target="#signup"
                                           data-link-group="idForm"
                                           data-animation-in="fadeIn">Create Account</a>
                                    </div>


                                    <hr class="bg-primary border-2 border-top border-primary">

                                    <div class="mb-2">

                                        <div class="row justify-content-center p-2d75 m-6  ">
                                            <div class="col-md-8 col-md-offset-2">
                                                <a href="#" class="btn btn-primary facebook">
                                                    <span></span> <i class="fab fa-facebook-f font-size-6 text-lh-2" style="color: #0b93d5"></i> </a>


                                                <a href="#" class="btn btn-primary google-plus "
                                                >  <i class="fab fa-google font-size-6 text-lh-2" style="color:#c71610"></i> </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Signup -->
                                <div id="signup" style="display: none; opacity: 0;" data-target-group="idForm">
                                    <!-- Title -->
                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i class="flaticon-resume mr-3 font-size-5"></i>Create Account</h2>
                                    </header>
                                    <!-- End Title -->

                                    <div class="p-4 p-md-6">
                                        <!-- Form Group -->
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel1" class="form-label" for="signinEmail1">Email *</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4" name="email" id="signinEmail1" placeholder="creativelayers088@gmail.com" aria-label="creativelayers088@gmail.com" aria-describedby="signinEmailLabel1" required>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->

                                        <!-- Form Group -->
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinPasswordLabel1" class="form-label" for="signinPassword1">Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4" name="password" id="signinPassword1" placeholder="" aria-label="" aria-describedby="signinPasswordLabel1" required>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->

                                        <!-- Form Group -->
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signupConfirmPasswordLabel" class="form-label" for="signupConfirmPassword">Confirm Password *</label>
                                                <input type="password" class="form-control rounded-0 height-4 px-4" name="confirmPassword" id="signupConfirmPassword" placeholder="" aria-label="" aria-describedby="signupConfirmPasswordLabel" required>
                                            </div>
                                        </div>
                                        <!-- End Input -->

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Create Account</button>
                                        </div>

                                        <div class="text-center mb-4">
                                            <span class="small text-muted">Already have an account?</span>
                                            <a class="js-animation-link small" href="javascript:;"
                                               data-target="#login"
                                               data-link-group="idForm"
                                               data-animation-in="fadeIn">Login
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Signup -->

                                <!-- Forgot Password -->
                                <div id="forgotPassword" style="display: none; opacity: 0;" data-target-group="idForm">
                                    <!-- Title -->
                                    <header class="border-bottom px-4 px-md-6 py-4">
                                        <h2 class="font-size-3 mb-0 d-flex align-items-center"><i class="flaticon-question mr-3 font-size-5"></i>Forgot Password?</h2>
                                    </header>
                                    <!-- End Title -->

                                    <div class="p-4 p-md-6">
                                        <!-- Form Group -->
                                        <div class="form-group mb-4">
                                            <div class="js-form-message js-focus-state">
                                                <label id="signinEmailLabel3" class="form-label" for="signinEmail3">Email *</label>
                                                <input type="email" class="form-control rounded-0 height-4 px-4" name="email" id="signinEmail3" placeholder="creativelayers088@gmail.com" aria-label="creativelayers088@gmail.com" aria-describedby="signinEmailLabel3" required>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-block py-3 rounded-0 btn-dark">Recover Password</button>
                                        </div>

                                        <div class="text-center mb-4">
                                            <span class="small text-muted">Remember your password?</span>
                                            <a class="js-animation-link small" href="javascript:;"
                                               data-target="#login"
                                               data-link-group="idForm"
                                               data-animation-in="fadeIn">Login
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Forgot Password -->
                        </form>
                    </div>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </div>
</aside>
<!-- End Account Sidebar Navigation - Desktop -->

<!-- Cart Sidebar Navigation -->
<aside id="sidebarContent1" class="u-sidebar u-sidebar__xl" aria-labelledby="sidebarNavToggler1">
    <div class="u-sidebar__scroller js-scrollbar">
        <div class="u-sidebar__container">
            <div class="u-header-sidebar__footer-offset">
                <!-- Toggle Button -->
                <div class="d-flex align-items-center position-absolute top-0 right-0 z-index-2 mt-5 mr-md-6 mr-4">
                    <button type="button" class="close ml-auto"
                            aria-controls="sidebarContent1"
                            aria-haspopup="true"
                            aria-expanded="false"
                            data-unfold-event="click"
                            data-unfold-hide-on-scroll="false"
                            data-unfold-target="#sidebarContent1"
                            data-unfold-type="css-animation"
                            data-unfold-animation-in="fadeInRight"
                            data-unfold-animation-out="fadeOutRight"
                            data-unfold-duration="500">
                        <span aria-hidden="true">Close <i class="fas fa-times ml-2"></i></span>
                    </button>
                </div>
                <!-- End Toggle Button -->

                <!-- Content -->
                <div class="u-sidebar__body">
                    <div class="u-sidebar__content u-header-sidebar__content">
                        <!-- Title -->
                        <header class="border-bottom px-4 px-md-6 py-4">
                            <h2 class="font-size-3 mb-0 d-flex align-items-center"><i class="flaticon-icon-126515 mr-3 font-size-5"></i>Your shopping bag (3)</h2>
                        </header>
                        <!-- End Title -->

                        <div class="px-4 py-5 px-md-6 border-bottom">
                            <div class="media">
                                <a href="#" class="d-block"><img src="https://placehold.it/100x153"
                                                                 class="img-fluid" alt="image-description"></a>
                                <div class="media-body ml-4d875">
                                    <div class="text-primary text-uppercase font-size-1 mb-1 text-truncate">
                                        <a href="#">Hard Cover</a></div>
                                    <h2 class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2">
                                        <a href="#" class="text-dark">The Ride of a Lifetime: Lessons Learned  from 15 Years as CEO</a>
                                    </h2>
                                    <div class="font-size-2 mb-1 text-truncate"><a href="#" class="text-gray-700">Robert Iger</a></div>
                                    <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                        <span class="woocommerce-Price-amount amount">1 x <span class="woocommerce-Price-currencySymbol">$</span>125.30</span>
                                    </div>
                                </div>
                                <div class="mt-3 ml-3">
                                    <a href="#" class="text-dark"><i class="fas fa-times"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-5 px-md-6 border-bottom">
                            <div class="media">
                                <a href="#" class="d-block"><img src="https://placehold.it/100x153" class="img-fluid" alt="image-description"></a>
                                <div class="media-body ml-4d875">
                                    <div class="text-primary text-uppercase font-size-1 mb-1 text-truncate"><a href="#">Hard Cover</a></div>
                                    <h2 class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2">
                                        <a href="#" class="text-dark">The Rural Diaries: Love, Livestock, and  Big Life Lessons Down</a>
                                    </h2>
                                    <div class="font-size-2 mb-1 text-truncate"><a href="#" class="text-gray-700">Hillary Burton</a></div>
                                    <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                        <span class="woocommerce-Price-amount amount">2 x <span class="woocommerce-Price-currencySymbol">$</span>200</span>
                                    </div>
                                </div>
                                <div class="mt-3 ml-3">
                                    <a href="#" class="text-dark"><i class="fas fa-times"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-5 px-md-6 border-bottom">
                            <div class="media">
                                <a href="#" class="d-block"><img src="https://placehold.it/100x153" class="img-fluid" alt="image-description"></a>
                                <div class="media-body ml-4d875">
                                    <div class="text-primary text-uppercase font-size-1 mb-1 text-truncate"><a href="#">Paperback</a></div>
                                    <h2 class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2">
                                        <a href="#" class="text-dark">Russians Among Us: Sleeper Cells,  Ghost Stories, and the Hunt.</a>
                                    </h2>
                                    <div class="font-size-2 mb-1 text-truncate"><a href="#" class="text-gray-700">Gordon Corera</a></div>
                                    <div class="price d-flex align-items-center font-weight-medium font-size-3">
                                        <span class="woocommerce-Price-amount amount">6 x <span class="woocommerce-Price-currencySymbol">$</span>100</span>
                                    </div>
                                </div>
                                <div class="mt-3 ml-3">
                                    <a href="#" class="text-dark"><i class="fas fa-times"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-5 px-md-6 d-flex justify-content-between align-items-center font-size-3">
                            <h4 class="mb-0 font-size-3">Subtotal:</h4>
                            <div class="font-weight-medium">$750.00</div>
                        </div>

                        <div class="px-4 mb-8 px-md-6">
                            <button type="submit" class="btn btn-block py-4 rounded-0 btn-outline-dark mb-4">View Cart</button>
                            <button type="submit" class="btn btn-block py-4 rounded-0 btn-dark">Checkout</button>
                        </div>
                    </div>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </div>
</aside>
<!-- End Cart Sidebar Navigation -->

<!-- Categories Sidebar Navigation -->
<aside id="sidebarContent2" class="u-sidebar u-sidebar__md u-sidebar--left" aria-labelledby="sidebarNavToggler2">
    <div class="u-sidebar__scroller js-scrollbar">
        <div class="u-sidebar__container">
            <div class="u-header-sidebar__footer-offset">
                <!-- Content -->
                <div class="u-sidebar__body">
                    <div class="u-sidebar__content u-header-sidebar__content">
                        <!-- Title -->
                        <header class="border-bottom px-4 px-md-5 py-4 d-flex align-items-center justify-content-between">
                            <h2 class="font-size-3 mb-0">SHOP BY CATEGORY</h2>

                            <!-- Toggle Button -->
                            <div class="d-flex align-items-center">
                                <button type="button" class="close ml-auto"
                                        aria-controls="sidebarContent2"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        data-unfold-event="click"
                                        data-unfold-hide-on-scroll="false"
                                        data-unfold-target="#sidebarContent2"
                                        data-unfold-type="css-animation"
                                        data-unfold-animation-in="fadeInLeft"
                                        data-unfold-animation-out="fadeOutLeft"
                                        data-unfold-duration="500">
                                    <span aria-hidden="true"><i class="fas fa-times ml-2"></i></span>
                                </button>
                            </div>
                            <!-- End Toggle Button -->
                        </header>
                        <!-- End Title -->

                        <div class="border-bottom">
                            <div class="zeynep pt-4">
                                <ul>

                                    <li class="has-submenu">
                                        <a href="#" data-submenu="off-pages11">Pages111</a>

                                        <div id="off-pages11" class="submenu">
                                            <div class="submenu-header" data-submenu-close="off-pages11">
                                                <a href="#">Pages1111</a>
                                            </div>

                                            <ul>
                                                <li class="has-submenu">
                                                    <a href="#" data-submenu="off-home11">Home Pages</a>

                                                    <div id="off-home11" class="submenu js-scrollbar">
                                                        <div class="submenu-header" data-submenu-close="off-home11">
                                                            <a href="#">Home Pages</a>
                                                        </div>

                                                        <ul class="">
                                                            <li>
                                                                <a href="../home/index.html">Home v1</a>
                                                            </li>

                                                            <li>
                                                                <a href="../home/home-v2.html">Home v2</a>
                                                            </li>

                                                            <li>
                                                                <a href="../home/home-v3.html">Home v2</a>
                                                            </li>

                                                            <li>
                                                                <a href="../home/home-v3.html">Home v3</a>
                                                            </li>

                                                            <li>
                                                                <a href="../home/home-v4.html">Home v4</a>
                                                            </li>

                                                            <li>
                                                                <a href="../home/home-v5.html">Home v5</a>
                                                            </li>

                                                            <li>
                                                                <a href="../home/home-v6.html">Home v6</a>
                                                            </li>

                                                            <li>
                                                                <a href="../home/home-v7.html">Home v7</a>
                                                            </li>

                                                            <li>
                                                                <a href="../home/home-v8.html">Home v8</a>
                                                            </li>

                                                            <li>
                                                                <a href="../home/home-v9.html">Home v9</a>
                                                            </li>

                                                            <li>
                                                                <a href="../home/home-v10.html">Home v10</a>
                                                            </li>

                                                            <li>
                                                                <a href="../home/home-v11.html">Home v11</a>
                                                            </li>

                                                            <li>
                                                                <a href="../home/home-v12.html">Home v12</a>
                                                            </li>

                                                            <li>
                                                                <a href="../home/home-v13.html">Home v13</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>

                                                <li class="has-submenu">
                                                    <a href="#" data-submenu="off-single-product1">Single Product</a>

                                                    <div id="off-single-product1" class="submenu js-scrollbar">
                                                        <div class="submenu-header" data-submenu-close="off-single-product">
                                                            <a href="#">Single Product</a>
                                                        </div>

                                                        <ul class="">
                                                            <li>
                                                                <a href="../shop/single-product-v1.html">Single Product v1</a>
                                                            </li>

                                                            <li>
                                                                <a href="../shop/single-product-v2.html">Single Product v2</a>
                                                            </li>

                                                            <li>
                                                                <a href="../shop/single-product-v3.html">Single Product v3</a>
                                                            </li>

                                                            <li>
                                                                <a href="../shop/single-product-v4.html">Single Product v4</a>
                                                            </li>

                                                            <li>
                                                                <a href="../shop/single-product-v5.html">Single Product v5</a>
                                                            </li>

                                                            <li>
                                                                <a href="../shop/single-product-v6.html">Single Product v6</a>
                                                            </li>

                                                            <li>
                                                                <a href="../shop/single-product-v7.html">Single Product v7</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>

                                                <li class="has-submenu">
                                                    <a href="#" data-submenu="off-shop-pages1">Shop Pages</a>

                                                    <div id="off-shop-pages1" class="submenu js-scrollbar">
                                                        <div class="submenu-header" data-submenu-close="off-shop-pages">
                                                            <a href="#">Shop Pages</a>
                                                        </div>

                                                        <ul class="">
                                                            <li>
                                                                <a href="../shop/cart.html">Shop cart</a>
                                                            </li>

                                                            <li>
                                                                <a href="../shop/checkout.html">Shop checkout</a>
                                                            </li>

                                                            <li>
                                                                <a href="../shop/my-account.html">Shop My Account</a>
                                                            </li>

                                                            <li>
                                                                <a href="../shop/order-received.html">Shop Order Received</a>
                                                            </li>

                                                            <li>
                                                                <a href="../shop/order-tracking.html">Shop Order Tracking</a>
                                                            </li>

                                                            <li>
                                                                <a href="../shop/store-location.html">Shop Store Location</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>


                                                <li class="px-5">
                                                    <a href="../../documentation/index.html" class="btn btn-primary mb-3 mb-md-0 mb-xl-3 mt-4 font-size-2 btn-block">Documentation</a>
                                                </li>

                                                <li class="px-5 mb-4">
                                                    <a href="../../starter/index.html" class="btn btn-secondary font-size-2 btn-block mb-2">Starter</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>




                                </ul>
                            </div>
                        </div>

                        <div class="px-4 px-md-5 pt-5 pb-4 border-bottom">
                            <h2 class="font-size-3 mb-3">HELP & SETTINGS </h2>
                            <ul class="list-group list-group-flush list-group-borderless">
                                <li class="list-group-item px-0 py-2 border-0"><a href="#" class="h-primary">Your Account</a></li>
                                <li class="list-group-item px-0 py-2 border-0"><a href="#" class="h-primary">Help</a></li>
                                <li class="list-group-item px-0 py-2 border-0"><a href="#" class="h-primary">Sign In</a></li>
                            </ul>
                        </div>

                        <div class="px-4 px-md-5 py-5">
                            <select class="custom-select mb-4 rounded-0 pl-4 height-4 shadow-none text-dark">
                                <option selected>English (United States)</option>
                                <option value="1">English (UK)</option>
                                <option value="2">Arabic (Saudi Arabia)</option>
                                <option value="3">Deutsch</option>
                            </select>
                            <select class="custom-select mb-4 rounded-0 pl-4 height-4 shadow-none text-dark">
                                <option selected>$ USD</option>
                                <option value="1">د.إ AED</option>
                                <option value="2">¥ CNY</option>
                                <option value="3">€ EUR</option>
                            </select>
                            <!-- Social Networks -->
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a class="h-primary pr-2 font-size-2" href="#">
                                        <span class="fab fa-facebook-f btn-icon__inner"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="h-primary pr-2 font-size-2" href="#">
                                        <span class="fab fa-google btn-icon__inner"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="h-primary pr-2 font-size-2" href="#">
                                        <span class="fab fa-twitter btn-icon__inner"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="h-primary pr-2 font-size-2" href="#">
                                        <span class="fab fa-github btn-icon__inner"></span>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Social Networks -->
                        </div>
                    </div>
                </div>
                <!-- End Content -->
            </div>
        </div>
    </div>
</aside>
<!-- End Categories Sidebar Navigation -->

<!-- ===== END HEADER CONTENT ===== -->

@yield('content')
<footer class="site-footer_v8">
    <div class="bg-primary">
        <div class="container">
            <!-- Newsletter -->
            <div class="space-2">
                <div class="row">
                    <div class="col-lg-7">
                        <div>
                            <h5 class="font-size-7 font-weight-medium text-white">Join Our Newsletter</h5>
                            <p class="text-white font-size-2 mb-0">Signup to be the first to hear about exclusive deals, special offers and upcoming collections</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="pr-lg-10">
                            <!-- Form Group -->
                            <div class="form-row justify-content-center">
                                <div class="col-lg mb-2">
                                    <div class="js-form-message">
                                        <div class="input-group">
                                            <input type="text" class="form-control font-size-2 px-5 py-2 rounded-md border-0 height-60" name="name" id="signupSrName" placeholder="Enter email for weekly newsletter." aria-label="Your name" required="" data-msg="Name must contain only letters." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 ml-2">
                                    <button type="submit" class="btn btn-dark btn-wide py-2 height-60 font-weight-medium">Subscribe
                                    </button>
                                </div>
                            </div>
                            <!-- End Form Group -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End  Newsletter -->
        </div>
    </div>
    <div class="bg-light space-2 space-lg-3 d-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-md-0 ">
                    <div class="pb-md-6">
                        <a href="index.html" class="d-inline-block mb-5">

                            <img class ="navbar-toggler-icon" src="assets/img/logo.png" style="width: 100% ;"></img>


                        </a>
                        <address class="font-size-2 mb-5">
                                <span class="mb-2 font-weight-normal ">
                                    1418 River Drive, Suite 35 Cottonhall, CA 9622 <br> United States
                                </span>
                        </address>
                        <div class="mb-4">
                            <a href="mailto:sale@bookworm.com" class="font-size-2 d-block  mb-1">sale@bookworm.com</a>
                            <a href="tel:+1246-345-0695" class="font-size-2 d-block ">+1 246-345-0695</a>
                        </div>
                        <ul class="list-unstyled mb-0 d-flex">
                            <li class="btn pl-0">
                                <a class="" href="#">
                                    <span class="fab fa-instagram"></span>
                                </a>
                            </li>
                            <li class="btn">
                                <a class="" href="#">
                                    <span class="fab fa-facebook-f"></span>
                                </a>
                            </li>
                            <li class="btn">
                                <a class="" href="#">
                                    <span class="fab fa-youtube"></span>
                                </a>
                            </li>
                            <li class="btn">
                                <a class="" href="#">
                                    <span class="fab fa-twitter"></span>
                                </a>
                            </li>
                            <li class="btn">
                                <a class="" href="#">
                                    <span class="fab fa-pinterest"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 mb-5 mb-md-0">
                    <h4 class="font-size-3 font-weight-medium mb-2 mb-xl-5 pb-xl-1 text-primary">Explore</h4>
                    <ul class="list-unstyled mb-0">
                        <li class="pb-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">About as</a>
                        </li>
                        <li class="py-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Sitemap</a>
                        </li>
                        <li class="py-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Bookmarks</a>
                        </li>
                        <li class="pt-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Sign in/Join</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-5 mb-md-0">
                    <h4 class="font-size-3 font-weight-medium mb-2 mb-xl-5 pb-xl-1 text-primary">Customer Service</h4>
                    <ul class="list-unstyled mb-0">
                        <li class="pb-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Help Center</a>
                        </li>
                        <li class="py-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Returns</a>
                        </li>
                        <li class="py-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Product Recalls</a>
                        </li>
                        <li class="py-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Accessibility</a>
                        </li>
                        <li class="py-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Contact Us</a>
                        </li>
                        <li class="pt-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Store Pickup</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-5 mb-md-0">
                    <h4 class="font-size-3 font-weight-medium mb-2 mb-xl-5 pb-xl-1 text-primary">Policy</h4>
                    <ul class="list-unstyled mb-0">
                        <li class="pb-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Return Policy</a>
                        </li>
                        <li class="py-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Terms Of Use</a>
                        </li>
                        <li class="py-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Security</a>
                        </li>
                        <li class="pt-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Privacy</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-5 mb-md-0">
                    <h4 class="font-size-3 font-weight-medium mb-2 mb-xl-5 pb-xl-1 text-primary">Categories</h4>
                    <ul class="list-unstyled mb-0">
                        <li class="pb-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Action</a>
                        </li>
                        <li class="py-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Comedy</a>
                        </li>
                        <li class="py-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Drama</a>
                        </li>
                        <li class="py-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Horror</a>
                        </li>
                        <li class="py-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Kids</a>
                        </li>
                        <li class="pt-2">
                            <a class="font-size-2  widgets-hover transition-3d-hover" href="#">Romantic Comedy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="space-1 bg-dark border-top border-gray-810">
        <div class="container">
            <div class="d-lg-flex text-center text-lg-left justify-content-between align-items-center">
                <!-- Copyright -->
                <p class="mb-3 mb-lg-0 font-size-2 text-gray-500">©2020 Book Worm. All rights reserved</p>
                <!-- End Copyright -->
                <div class="d-lg-flex justify-content-xl-end align-items-center">
                    <!-- Select -->
                    <select class="js-select selectpicker dropdown-select mb-3 mb-md-0"
                            data-style="text-gray-500 bg-light px-4 py-2 rounded-md height-5 outline-none shadow-none form-control font-size-2"
                            data-dropdown-align-right="true">
                        <option value="one" selected>English (United States)</option>
                        <option value="two">Deutsch</option>
                        <option value="three">Français</option>
                        <option value="four">Español</option>
                    </select>
                    <!-- End Select -->

                    <!-- Select -->
                    <select class="js-select selectpicker dropdown-select ml-md-3"
                            data-style="text-gray-500 bg-light px-4 py-2 rounded-md height-5 outline-none shadow-none form-control font-size-2"
                            data-width="fit"
                            data-dropdown-align-right="true">
                        <option value="one" selected>$ USD</option>
                        <option value="two">€ EUR</option>
                        <option value="three">₺ TL</option>
                        <option value="four">₽ RUB</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ========== END FOOTER ========== -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ URL::asset('frontend/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ URL::asset('frontend/vendor/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
<script src="{{ URL::asset('frontend/vendor/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{ URL::asset('frontend/vendor/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('frontend/vendor/slick-carousel/slick/slick.js')}}"></script>
<script src="{{ URL::asset('frontend/vendor/multilevel-sliding-mobile-menu/dist/jquery.zeynep.js')}}"></script>
<script src="{{ URL::asset('frontend/vendor/hs-megamenu/src/hs.megamenu.js')}}"></script>
<script src="{{ URL::asset('frontend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{ URL::asset('frontend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{ URL::asset('frontend/vendor/slick-carousel/slick/slick.min.js')}}"></script>

<!-- JS HS Components -->
<script src="{{ URL::asset('frontend/js/hs.core.js')}}"></script>
<script src="{{ URL::asset('frontend/js/components/hs.unfold.js')}}"></script>
<script src="{{ URL::asset('frontend/js/components/hs.malihu-scrollbar.js')}}"></script>
<script src="{{ URL::asset('frontend/js/components/hs.slick-carousel.js')}}"></script>
<script src="{{ URL::asset('frontend/js/components/hs.selectpicker.js')}}"></script>
<script src="{{ URL::asset('frontend/js/components/hs.show-animation.js')}}"></script>

<!-- JS Bookworm -->
<!-- <script src="../../assets/js/bookworm.js"></script> -->

<script>
    $(document).on('ready', function () {
        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

        // initialization of select picker
        $.HSCore.components.HSSelectPicker.init('.js-select');

        // initialization of slick carousel
        $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

        // initialization of malihu scrollbar
        $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

        // initialization of show animations
        $.HSCore.components.HSShowAnimation.init('.js-animation-link');

        // init zeynepjs
        var zeynep = $('.zeynep').zeynep({
            onClosed: function () {
                // enable main wrapper element clicks on any its children element
                $("body main").attr("style", "");

                console.log('the side menu is closed.');
            },
            onOpened: function () {
                // disable main wrapper element clicks on any its children element
                $("body main").attr("style", "pointer-events: none;");

                console.log('the side menu is opened.');
            }
        });

        // handle zeynep overlay click
        $(".zeynep-overlay").click(function () {
            zeynep.close();
        });

        // open side menu if the button is clicked
        $(".cat-menu").click(function () {
            if ($("html").hasClass("zeynep-opened")) {
                zeynep.close();
            } else {
                zeynep.open();
            }
        });
    });
</script>

</body>
</html>



