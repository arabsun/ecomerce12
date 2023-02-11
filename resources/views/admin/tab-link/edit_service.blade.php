
@php
$url =request()->url();
@endphp
<li class="nav-item"> <a href="{{route('admin.service.product.index')}}" class="nav-link {{$url == route('admin.service.product.edit',$id) ? 'active' : ''}}">List Service </a> </li>
<li class="nav-item"> <a href="{{route('admin.service.product.pricing.create',$id)}}" class="nav-link {{$url == route('admin.service.product.pricing.create',$id) ? 'active' : ''}}">Pricing</a> </li>
<div class="loader_image">
    <img class="" width="100%" src="{{asset('public/admin/asset/images/loader.gif')}}" style="z-index: 9999;" alt="">

</div>
