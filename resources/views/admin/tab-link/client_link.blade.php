@php
    $url =request()->url();
@endphp

<div class="overview-tab-menu">
    <div class="overview-author">
      <h5>{{$client->username}}</h5>
    </div>
  <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
    <li class="nav-item"> <a href="{{route('admin.client.overview',$id)}}" class="nav-link {{$url == route('admin.client.overview',$id) ? 'active' : ''}}">Overview</a> </li>
    <li class="nav-item"> <a href="{{route('admin.client.financial',$id)}}" class="nav-link {{$url == route('admin.client.financial',$id) ? 'active' : ''}}">Financial</a> </li>
    <li class="nav-item"> <a href="{{route('admin.client.edit',$id)}}" class="nav-link {{$url == route('admin.client.edit',$id) ? 'active' : ''}}">Profile</a> </li>
    <li class="nav-item"> <a href="{{route('admin.client.permission',$id)}}" class="nav-link {{$url == route('admin.client.permission',$id) ? 'active' : ''}}">Permission</a> </li>
    <li class="nav-item"> <a href="{{route('admin.client.statement',$id)}}" class="nav-link {{$url == route('admin.client.statement',$id) ? 'active' : ''}}">Statement</a> </li>

    <li class="nav-item"> <a href="{{route('admin.client.activitylog',$id)}}" class="nav-link {{$url == route('admin.client.activitylog',$id) ? 'active' : ''}}">Activity Log</a> </li>

    <li class="nav-item"> <a href="{{route('admin.client.invoice',$id)}}" class="nav-link {{$url == route('admin.client.invoice',$id) ? 'active' : ''}}">Invoice</a> </li>

    <li class="nav-item"> <a href="{{route('admin.client.products',$id)}}" class="nav-link {{$url == route('admin.client.products',$id) ? 'active' : ''}}">Products</a> </li>

    <li class="nav-item"> <a href="{{route('admin.client.email.preference',$id)}}" class="nav-link {{$url == route('admin.client.email.preference',$id) ? 'active' : ''}}">Email Preference</a> </li>

    <li class="nav-item"> <a href="{{route('admin.client.email.setprice',$id)}}" class="nav-link {{$url == route('admin.client.email.setprice',$id) ? 'active' : ''}}">Set Price</a> </li>

    <li class="nav-item"> <a href="{{route('admin.client.order.history',$id)}}" class="nav-link {{$url == route('admin.client.order.history',$id) ? 'active' : ''}}">Order History</a> </li>

    <li class="nav-item"> <a href="{{route('admin.client.coupons',$id)}}" class="nav-link {{$url == route('admin.client.coupons',$id) ? 'active' : ''}}">@lang('Coupons')</a> </li>

  </ul>
</div>


<div class="loader_image">
    <img class="" width="100%" src="{{asset('public/admin/asset/images/loader.gif')}}" style="z-index: 9999;" alt="">

</div>
