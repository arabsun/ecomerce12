
@php
$url =request()->url();
@endphp
<li class="nav-item"> <a href="{{route('admin.product.catalog.edit',$id)}}" class="nav-link {{$url == route('admin.product.catalog.edit',$id) ? 'active' : ''}}">@lang('Product Informtion')</a> </li>
<li class="nav-item"> <a href="{{route('admin.product.catalog.field.create',$id)}}" class="nav-link {{$url == route('admin.product.catalog.field.create',$id) ? 'active' : ''}}">@lang('Field')</a> </li>

<li class="nav-item"> <a href="{{route('admin.product.catalog.pricing.create',$id)}}" class="nav-link {{$url == route('admin.product.catalog.pricing.create',$id) ? 'active' : ''}}">@lang('Pricing')</a> </li>
<div class="loader_image">
    <img class="" width="100%" src="{{asset('public/admin/asset/images/loader.gif')}}" style="z-index: 9999;" alt="">

</div>
