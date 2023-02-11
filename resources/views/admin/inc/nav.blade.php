<aside class="lyear-layout-sidebar">
    <!-- logo -->
    <div id="logo" class="sidebar-header">
        <a href="{{route('admin.index')}}"><img src="images/logo-sidebar.png" title="{{env('APP_NAME')}}" alt="{{env('APP_NAME')}}" /></a>
    </div>
    <div class="lyear-layout-sidebar-scroll">
        <nav class="sidebar-main">
            <ul class="nav nav-drawer">
                <li class="nav-item active"> <a class="multitabs" href="{{route('admin.dashboard')}}"><i class="mdi mdi-home"></i> <span>{{__('dashboard')}}</span></a> </li>
                <li class="nav-item nav-item-has-subnav">
                    <a href="javascript:void(0)"><i class="mdi mdi-palette"></i> <span>{{__('test')}}</span></a>
                    <ul class="nav nav-subnav">
                        <li> <a class="multitabs" href="lyear_ui_buttons.html">{{__('test')}}</a> </li>
                        <li> <a class="multitabs" href="lyear_ui_cards.html">{{__('test')}}</a> </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="sidebar-footer">
            <p class="copyright">{{__('Copyright')}} &copy; {{date('Y')}}. <a target="_blank" href="{{env('APP_URL')}}">{{__('APP_NAME')}}</a> {{__('All rights reserved.')}}</p>
        </div>
    </div>
</aside>
