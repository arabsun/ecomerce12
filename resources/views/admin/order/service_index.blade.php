@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table class="table ">
                                            <thead>
                                            <tr>
                                                <th>@lang('Order Number')</th>
                                                <th>@lang('Payment Method')</th>
                                                <th>@lang('Amount')</th>
                                                <th>@lang('Payment Status')</th>
                                                <th>@lang('Order Status')</th>
                                                <th>@lang('Created At')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td data-label="TRX">
                                                        <a href="javascript:;">{{$order->order_number}}</a>
                                                    </td>
                                                    <td data-label="Payment Method">
                                                        <div>
                                                            {{$order->payment_method}}
                                                        </div>
                                                    </td>
                                                    <td data-label="Rate">
                                                        <div>
                                                            USD{{$order->total_amount}}
                                                        </div>
                                                    </td>
                                                    <td data-label="Payment Status">
                                                        @if ($order->payment_status == 'Completed')
                                                            <span class="text-success">@lang('Completed')</span>
                                                        @else
                                                            <span class="badge badge-danger">@lang('Pending')</span>
                                                        @endif
                                                    </td>
                                                    <td data-label="Status">
                                                        @if ($order->order_status == 'Completed')
                                                            <span class="text-success">@lang('Completed')</span>
                                                        @else
                                                            <span class="text-danger">@lang('Pending')</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{$order->created_at->format('d/M/Y')}}
                                                    </td>

                                                    <td>
                                                        <a href="{{route('admin.order.service.details',$order->id)}}"
                                                           class="btn btn-primary btn-sm link-page"> <i
                                                                    class="fas fa-eye"></i> @lang('Details')</a>

                                                    </td>
                                                </tr>
                                            @endforeach
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
