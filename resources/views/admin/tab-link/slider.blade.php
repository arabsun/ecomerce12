@php
    $url =request()->url();
@endphp
<li class="nav-item"> <a href="{{route('admin.slider.index')}}"  class="nav-link {{$url == route('admin.slider.index') ? 'active' : ''}}">List Sliders</a> </li>
<li class="nav-item"> <a href="{{route('admin.slider.create')}}"  class="nav-link {{$url == route('admin.slider.create') ? 'active' : ''}}">Add New Slider</a> </li>

<div class="loader_image">
    <img class="" width="100%" src="{{asset('public/admin/asset/images/loader.gif')}}" style="z-index: 9999;" alt="">

</div>
