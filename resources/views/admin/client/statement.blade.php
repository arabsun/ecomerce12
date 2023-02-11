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
                                                    <th scope="col">@lang('Txn Number')</th>
                                                    <th scope="col">@lang('Date')</th>
                                                    <th scope="col">@lang('Description')</th>
                                                    <th scope="col">@lang('Type')</th>
                                                    <th scope="col">@lang('Amount')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if ($tranactions->count() > 0)
                                                    @foreach ($tranactions as $key => $item)
                                                        <tr>
                                                            <th scope="row">{{$key+1}}</th>
                                                            <td>{{$item->txn_number}}</td>
                                                            <td>{{$item->created_at}}</td>
                                                            <td>{{$item->details}}</td>
                                                            <td>
                                                                @if ($item->type == '+')
                                                                    <span
                                                                        class="badge badge-success p-2">{{$item->type}}</span>
                                                                @else
                                                                    <span
                                                                        class="badge badge-danger p-2">{{$item->type}}</span>
                                                                @endif

                                                            </td>
                                                            <td>{{$item->amount}} USD</td>
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

</div>

@include('admin.design.js')
