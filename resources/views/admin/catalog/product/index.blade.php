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
                                        <table class="table " id="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">#ID</th>
                                                <th scope="col">Service Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Special Deal</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if ($products)
                                                @foreach ($products as $key => $product)
                                                    <tr>
                                                        <th scope="row">{{$product->id}}</th>

                                                        <td>{{$product->name}}</td>
                                                        <td data-label="@lang('Special Deal')">
                                                            @if($product->is_virtual == 1)
                                                                <span
                                                                    class="badge badge-success">@lang('Virtual')</span>
                                                            @else
                                                                <span class="badge badge-info">@lang('Physical')</span>
                                                            @endif
                                                        </td>
                                                        <td> ${{$product->price}}</td>
                                                        <td data-label="@lang('Special Deal')">
                                                            @if($product->special_deal == 1)
                                                                <span class="badge badge-success">@lang('Yes')</span>
                                                            @else
                                                                <span class="badge badge-warning">@lang('No')</span>
                                                            @endif
                                                        </td>
                                                        <td>{{$product->created_at->format('Y-m-d h:i a')}}</td>
                                                        <td>
                                                            <a href="{{route('admin.product.catalog.edit',$product->id)}}"
                                                               class="btn btn-primary btn-sm link-page"> <i
                                                                    class="fas fa-edit"></i> @lang('Edit')</a>

                                                            <a href="javascript:;"
                                                               data-href="{{route('admin.service.product.delete',$product->id)}}"
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
                                        <div class="d-flex flex-row-reverse bd-highlight">
                                            {{ $products->links() }}
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
