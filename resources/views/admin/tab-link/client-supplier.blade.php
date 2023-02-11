@php
    $url =request()->url();
@endphp

<li class="nav-item"> <a href="{{route('admin.client.index')}}" class="nav-link {{$url == route('admin.client.index') ? 'active' : ''}}">View Client</a> </li>
<li class="nav-item"> <a href="{{route('admin.client.create')}}" class="nav-link {{$url == route('admin.client.create') ? 'active' : ''}}">Add Client</a> </li>
<li class="nav-item"> <a href="{{route('admin.group.index')}}" class="nav-link {{$url == route('admin.group.index') ? 'active' : ''}}">View Group</a> </li>
<li class="nav-item"> <a href="{{route('admin.group.create')}}" class="nav-link {{$url == route('admin.group.create') ? 'active' : ''}}">Add Group</a> </li>
<div class="loader_image">
    <img class="" width="100%" src="{{asset('public/admin/asset/images/loader.gif')}}" style="z-index: 9999;" alt="">

</div>
