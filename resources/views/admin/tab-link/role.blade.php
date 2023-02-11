@php
    $url =request()->url();
@endphp
<li class="nav-item"> <a href="{{route('admin.role.index')}}"  class="nav-link {{$url == route('admin.role.index') ? 'active' : ''}}">List Role</a> </li>
<li class="nav-item"> <a href="{{route('admin.role.create')}}"  class="nav-link {{$url == route('admin.blog.index') ? 'active' : ''}}">Add Role</a> </li>

<div class="loader_image">
    <img class="" width="100%" src="{{asset('public/admin/asset/images/loader.gif')}}" style="z-index: 9999;" alt="">

</div>
