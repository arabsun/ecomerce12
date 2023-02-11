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
                                    <h6 class="mb-2">Order Information</h6>
                                    <li class="list-group-item d-flex justify-content-between"><b>Order Number :</b>
                                        <span>{{$order->order_number}}</span></li>
                                    <li class="list-group-item d-flex justify-content-between"><b>Payment Method :</b>
                                        <span>{{$order->payment_method}}</span></li>
                                    <li class="list-group-item d-flex justify-content-between"><b>Amount :</b>
                                        <span>USD{{$order->total_amount}}</span></li>
                                    <li class="list-group-item d-flex justify-content-between"><b>Payment Status :</b>
                                        @if ($order->payment_status == 'Completed')
                                            <span class="text-success">@lang('Completed')</span>
                                        @else
                                            <span class="badge badge-danger">@lang('Pending')</span>
                                        @endif
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><b>Order Status :</b>
                                        @if ($order->order_status == 'Completed')
                                            <span class="text-success">@lang('Completed')</span>
                                        @else
                                            <span class="text-danger">@lang('Pending')</span>
                                        @endif
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between"><b>Date :</b>
                                        <span> {{$order->date}}</span></li>
                                    <li class="list-group-item d-flex justify-content-between"><b>Time :</b>
                                        <span> {{$order->time}}</span></li>
                                    <li class="list-group-item d-flex justify-content-between"><b>Created at :</b>
                                        <span> {{$order->created_at->format('d/M/Y')}}</span></li>

                                    <hr>
                                    <h6 class="mb-2">Customer Information</h6>
                                    <li class="list-group-item d-flex justify-content-between"><b>First Name :</b>
                                        <span>{{$order->customer_first_name}}</span></li>
                                    @if($order->customer_last_name)
                                        <li class="list-group-item d-flex justify-content-between"><b>Last Name :</b>
                                            <span>{{$order->customer_last_name}}</span></li>
                                    @endif
                                    <li class="list-group-item d-flex justify-content-between"><b>Email :</b>
                                        <span>{{$order->customer_email}}</span></li>
                                    <li class="list-group-item d-flex justify-content-between"><b>Phone :</b>
                                        <span>{{$order->customer_phone}}</span></li>
                                    <li class="list-group-item d-flex justify-content-between"><b>Address :</b>
                                        <span>{{$order->customer_address}}</span></li>
                                    <li class="list-group-item d-flex justify-content-between"><b>City :</b>
                                        <span>{{$order->customer_city}}</span></li>
                                    <li class="list-group-item d-flex justify-content-between"><b>State :</b>
                                        <span>{{$order->customer_state}}</span></li>
                                    <li class="list-group-item d-flex justify-content-between"><b>Zip :</b>
                                        <span>{{$order->customer_zip}}</span></li>
                                    <li class="list-group-item d-flex justify-content-between"><b>Country :</b>
                                        <span>{{$order->customer_country}}</span></li>


                                    <hr>
                                    <h6 class="mb-2">Products</h6>

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
