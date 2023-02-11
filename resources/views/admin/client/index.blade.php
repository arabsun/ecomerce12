@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
                    @include('admin.tab-link.client-supplier')
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table class="table table-bordered ">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">@lang('Username')</th>
                                                <th scope="col">@lang('Email')</th>
                                                <th scope="col">@lang('Group')</th>
                                                <th scope="col">@lang('Available Balance')</th>
                                                <th scope="col">@lang('Registration Date')</th>
                                                <th scope="col">@lang('Action')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if ($datas->count() > 0)
                                                @foreach ($datas as $key => $item)
                                                    <tr>
                                                        <th scope="row">{{$key+1}}</th>
                                                        <td>{{$item->username}}</td>
                                                        <td>{{$item->email}}</td>
                                                        <td>
                                                            <span
                                                                class="badge badge-dark p-2">{{$item->group->group_name}}</span>
                                                        </td>
                                                        <td>{{$item->balance}} USD</td>
                                                        <td>{{$item->created_at->format('Y-m-d h:i a')}}</td>
                                                        <td>
                                                            <a href="{{route('admin.client.overview',$item->id)}}"
                                                               class="btn btn-primary btn-sm link-page"> <i
                                                                    class="fas fa-edit"></i> @lang('Edit')</a>
                                                            <a href="javascript:;"
                                                               data-redirect="{{route('admin.client.index')}}"
                                                               data-href="{{route('admin.client.delete',$item->id)}}"
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
                                        <div class="d-flex flex-row-reverse bd-highlight">
                                            {{ $datas->links() }}
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

</div>
@include('admin.design.js')
