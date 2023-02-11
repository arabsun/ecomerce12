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
                                        <div class="card-header">
                                            <button class="btn btn-primary" type="button" data-toggle="modal"
                                                    data-target="#addModal">@lang('+ Add Coupon')</button>
                                        </div>
                                        <div class="card-body table-responsive">
                                            <table class="table " id="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">@lang('Coupon Code')</th>
                                                    <th scope="col">@lang('Discount')</th>
                                                    <th scope="col">@lang('Created at')</th>
                                                    <th scope="col">@lang('Validity')</th>
                                                    <th scope="col">@lang('Expired at')</th>
                                                    <th scope="col">@lang('Status')</th>
                                                    <th scope="col">@lang('Action')</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @forelse ($coupons as $key => $coupon)
                                                    <tr>
                                                        <td>{{$coupon->code}}</td>
                                                        <td>{{$coupon->discount}}%</td>
                                                        <td>{{$coupon->created_at->format('d M Y')}}</td>
                                                        <td>{{$coupon->validity}} @lang('days')</td>
                                                        <td>{{Carbon\Carbon::parse($coupon->created_at)->addDays($coupon->validity)->format('d M Y')}}</td>
                                                        <td>
                                                            @if ($coupon->status == 1)
                                                                <span class="badge badge-secondary">@lang('Used')</span>
                                                            @else
                                                                <span class="badge badge-success">@lang('Unused')</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button
                                                                data-href="{{route('admin.coupon.remove',$coupon->id)}}"
                                                                class="btn btn-danger btn-sm delete">@lang('Remove')</button>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="12"
                                                            class="text-center">@lang('No Coupon Found')</td>
                                                    </tr>
                                                @endforelse


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


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('admin.client.coupon.add',$client->id)}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Add new coupon')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>@lang('Discount (%)')</label>
                        <input class="form-control" type="number" name="discount" required>
                    </div>

                    <div class="form-group">
                        <label>@lang('Validity (in days)')</label>
                        <input class="form-control" type="number" placeholder="E.g : 5" name="validity" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                </div>
            </div>
        </form>
    </div>
</div>

@include('admin.design.js')
