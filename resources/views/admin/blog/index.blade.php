@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
                    @include('admin.tab-link.blog_link')
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table class="table ">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">@lang('Photo')</th>
                                                <th scope="col">@lang('Title')</th>
                                                <th scope="col">@lang('Category')</th>
                                                <th scope="col">@lang('Date')</th>
                                                <th scope="col">@lang('Action')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if ($blogs)
                                                @foreach ($blogs as $key => $blog)
                                                    <tr>
                                                        <th scope="row">{{$key+1}}</th>
                                                        <td><img width="100"
                                                                 src="{{asset('assets/images/'.$blog->photo)}}" alt="">
                                                        </td>
                                                        <td>{{$blog->title}}</td>
                                                        <td>{{$blog->category->name}}</td>
                                                        <td>{{$blog->date}}</td>
                                                        <td>
                                                            <a href="{{route('admin.blog.edit',$blog->id)}}"
                                                               class="btn btn-primary btn-sm link-page"> <i
                                                                    class="fas fa-edit"></i> @lang('Edit')</a>
                                                            <a href="javascript:;"
                                                               data-href="{{route('admin.blog.edit',$blog->id)}}"
                                                               class="btn btn-danger btn-sm delete" data-toggle="modal"
                                                               data-target="#deleteModal"> <i
                                                                    class="fas fa-trash"></i> @lang('Delete')</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="text-center">
                                                    <td colspan="4"><strong>@lang('No Data Found')</strong></td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    {{$blogs->links()}}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@include('admin.design.js')

