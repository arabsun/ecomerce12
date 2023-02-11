@php
    $url =request()->url();
@endphp
<li class="nav-item"> <a href="{{route('admin.product.catalog.index')}}"   class="nav-link {{$url == route('admin.product.catalog.index') ? 'active' : ''}}">List Product</a> </li>
<li class="nav-item"> <a href="{{route('admin.product.catalog.create')}}"  class="nav-link {{$url == route('admin.product.catalog.create') ? 'active' : ''}}">Add New Product</a> </li>
<li class="nav-item"> <a href="{{route('admin.product.group.index')}}"     class="nav-link {{$url == route('admin.product.group.index') ? 'active' : ''}}">List Product Group</a> </li>
<li class="nav-item"> <a href="{{route('admin.product.group.create')}}"     class="nav-link {{$url == route('admin.product.group.create') ? 'active' : ''}}">Add Product Group</a> </li>
{{-- <li class="nav-item"> <a href="{{route('admin.digital.inventory.create')}}" class="nav-link">Home Page Group</a> </li> --}}
<div class="loader_image">
    <img class="" width="100%" src="{{asset('public/admin/asset/images/loader.gif')}}" style="z-index: 9999;" alt="">

</div>
