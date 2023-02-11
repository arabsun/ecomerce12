@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="overview-tab-wapper">
                    @include('admin.tab-link.client_link',['id'=>$client->id])
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
                                                    <th scope="col">@lang('Date')</th>
                                                    <th scope="col">@lang('Product')</th>
                                                    <th scope="col">@lang('Order Status')</th>
                                                    <th scope="col">@lang('Amount')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if (count($products) > 0)
                                                    @foreach ($products as $key => $item)

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
</div>

@include('admin.design.js')
