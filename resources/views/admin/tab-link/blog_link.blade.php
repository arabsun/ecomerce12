@php
    $url =request()->url();
@endphp
<li class="nav-item"> <a href="{{route('admin.blog.index')}}"  class="nav-link {{$url == route('admin.blog.index') ? 'active' : ''}}">List Blog</a> </li>
<li class="nav-item"> <a href="{{route('admin.blog.create')}}"  class="nav-link {{$url == route('admin.blog.create') ? 'active' : ''}}">Add New Blog</a> </li>
<li class="nav-item"> <a href="{{route('admin.blog.category.index')}}"  class="nav-link {{$url == route('admin.blog.category.index') ? 'active' : ''}}">Blog Category</a> </li>
<li class="nav-item"> <a href="{{route('admin.blog.category.create')}}"  class="nav-link {{$url == route('admin.blog.category.create') ? 'active' : ''}}">Add Category</a> </li>

<div class="loader_image">
    <img class="" width="100%" src="{{asset('public/admin/asset/images/loader.gif')}}" style="z-index: 9999;" alt="">

</div>
