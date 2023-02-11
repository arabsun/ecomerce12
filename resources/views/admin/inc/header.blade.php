<header class="lyear-layout-header">
    <nav class="navbar navbar-default">
        <div class="topbar">
            <div class="topbar-left">
                <div class="lyear-aside-toggler">
                    <span class="lyear-toggler-bar"></span>
                    <span class="lyear-toggler-bar"></span>
                    <span class="lyear-toggler-bar"></span>
                </div>
            </div>
            <ul class="topbar-right">
                <li class="dropdown dropdown-profile">
                    <a href="javascript:void(0)" data-toggle="dropdown">
                        <img class="img-avatar img-avatar-48 m-r-10" src="{{auth('admin')->user()->avatar}}" alt="{{auth('admin')->user()->first_name}}" />
                        <span>{{auth('admin')->user()->first_name}}<span class="caret"></span></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li> <a class="multitabs" data-url="{{route('admin.profile')}}" href="javascript:void(0)"><i class="mdi mdi-account"></i>{{__('Profile')}}</a> </li>
                        <li> <a class="multitabs" data-url="{{route('admin.reset.password')}}" href="javascript:void(0)"><i class="mdi mdi-lock-outline"></i>{{__('Reset password')}}</a> </li>
                        <li class="divider"></li>
                        <li> <a href="{{route('admin.logout')}}"><i class="mdi mdi-logout-variant"></i>{{__('Logout')}}</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <nav id="main-header-iframe" data-url="{{route('admin.dashboard')}}" data-title="{{__('main')}}" class="d-none"></nav>
</header>
