@include('frontend.inc.header')

@include('frontend.inc.account_nav')

@include('frontend.inc.cart_nav')

@include('frontend.inc.categories_nav')


@yield('content')

<!-- ========== FOOTER ========== -->
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
@include('frontend.inc.footer')

