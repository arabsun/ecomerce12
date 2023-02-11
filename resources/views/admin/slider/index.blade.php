@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
                    @include('admin.tab-link.slider')
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
                                                <th scope="col">Image</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if ($datas->count() > 0)
                                                @foreach ($datas as $key => $item)
                                                    <tr>
                                                        <th scope="row">{{$key+1}}</th>
                                                        <td><img src="{{asset('assets/images/'.$item->photo)}}"
                                                                 width="120" alt=""></td>
                                                        <td>{{$item->title_text}}</td>
                                                        <td>
                                                            <a href="{{route('admin.slider.edit',$item->id)}}"
                                                               class="btn btn-primary btn-sm link-page"> <i
                                                                        class="fas fa-edit"></i> @lang('Edit')</a>
                                                            <a href="javascript:;"
                                                               data-redirect="{{route('admin.client.index')}}"
                                                               data-href="{{route('admin.slider.delete',$item->id)}}"
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
