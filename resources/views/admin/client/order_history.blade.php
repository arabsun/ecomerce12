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
                                                    <th>#</th>
                                                    <th>@lang('Date')</th>
                                                    <th>@lang('File')</th>
                                                    <th>@lang('Services')</th>
                                                    <th>@lang('Api')</th>
                                                    <th>@lang('Order Status')</th>
                                                    <th>@lang('Auction')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if (count($orders) > 0)
                                                    @foreach ($orders as $key => $item)

                                                    @endforeach
                                                @else
                                                    <tr class="text-center">
                                                        <td colspan="6"><strong>@lang('No Data Found')</strong></td>
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
