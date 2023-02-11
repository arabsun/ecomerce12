@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
                    @include('admin.tab-link.catalog_cart')
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
                                                <th scope="col">@lang('Group Name')</th>
                                                <th scope="col">@lang('Action')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if ($groups)
                                                @foreach ($groups as $key => $group)
                                                    <tr>
                                                        <th scope="row">{{$key+1}}</th>
                                                        <td><strong>{{$group->name}}</strong>
                                                            @foreach (DB::table('product_groups')->where('parent_id',$group->id)->whereStatus(1)->get() as $item)
                                                                <br> <i class="fas fa-arrow-right"></i> {{$item->name}}
                                                            @endforeach

                                                        </td>
                                                        <td>
                                                            <a href="{{route('admin.product.group.edit',$group->id)}}"
                                                               class="btn btn-primary btn-sm link-page"> <i
                                                                    class="fas fa-edit"></i> @lang('Edit')</a>
                                                            <a href="javascript:;"
                                                               data-href="{{route('admin.product.group.delete',$group->id)}}"
                                                               class="btn btn-danger btn-sm delete"> <i
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

