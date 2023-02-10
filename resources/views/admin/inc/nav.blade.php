
<!--左侧导航-->
<aside class="lyear-layout-sidebar">

    <!-- logo -->
    <div id="logo" class="sidebar-header">
        <a href="index.html"><img src="images/logo-sidebar.png" title="LightYear" alt="LightYear" /></a>
    </div>
    <div class="lyear-layout-sidebar-scroll">

        <nav class="sidebar-main">
            <ul class="nav nav-drawer">
                <li class="nav-item active"> <a class="multitabs" href="lyear_main.html"><i class="mdi mdi-home"></i> <span>后台首页</span></a> </li>
                <li class="nav-item nav-item-has-subnav">
                    <a href="javascript:void(0)"><i class="mdi mdi-palette"></i> <span>UI 元素</span></a>
                    <ul class="nav nav-subnav">
                        <li> <a class="multitabs" href="lyear_ui_buttons.html">按钮</a> </li>
                        <li> <a class="multitabs" href="lyear_ui_cards.html">卡片</a> </li>
                    </ul>
                </li>

            </ul>
        </nav>

        <div class="sidebar-footer">
            <p class="copyright">{{__('Copyright')}} &copy; {{date('Y')}}. <a target="_blank" href="{{env('APP_URL')}}">{{__('APP_NAME')}}</a> {{__('All rights reserved.')}}</p>
        </div>
    </div>

</aside>
<!--End 左侧导航-->
