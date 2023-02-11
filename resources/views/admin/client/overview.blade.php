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
                                        <div class="card-body">
                                            <div class="overview-info">
                                                <div class="overview-info-left mb-3">
                                                    <h5>
                                                        @lang('Personal Information')
                                                    </h5>
                                                    <ul class="py-0">
                                                        <li>{{$client->email}}</li>
                                                        <li>{{$client->phone}}
                                                            <span id="is_phone_verify"
                                                                  data="{{$client->is_phone_verify}}"
                                                                  data-user="{{$client->id}}"
                                                                  class="text-{{$client->is_phone_verify == 1 ? 'success' : 'danger'}}">
                                                {{$client->is_phone_verify == 1 ? 'Phone Verified' : 'Phone Unverified'}}</span>
                                                        </li>
                                                        <li>@lang('User Since') {{$client->created_at->format('d M Y')}}</li>
                                                        <li>ID/KYC : <span class="text-info">@lang('Completed')</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="status mb-3">
                                                    <button class="btn btn-primary">@lang('Active')</button>
                                                    <a href="#" class="d-block mt-2">@lang('Login as Client')</a>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-wrap balance--card">
                                                <div class="item">
                                                    <h5 class="title">£0.07 GBP</h5>
                                                    <small>Locked Amount</small>
                                                </div>
                                                <div class="item">
                                                    <h5 class="title">£99.95 GBP</h5>
                                                    <small>Total Receipts</small>
                                                </div>

                                            </div>
                                            <div class="py-4 border-bottom border-top">
                                                <h5 class="mb-2">Credit Info</h5>
                                                <div class="d-flex flex-wrap">
                                                    <h3 class="mr-4">${{$client->balance}}GBP</h3>
                                                    <div>
                                                        <a class="btn btn-success"
                                                           href="{{route('admin.client.financial',$client->id).'?type=credit'}}">Add</a>
                                                        <a class="btn btn-danger"
                                                           href="{{route('admin.client.financial',$client->id).'?type=rebate'}}">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-4 border-bottom">
                                                <h5 class="mb-2">Unpaid Balance</h5>
                                                <div class="mb-4">
                                                    <h3 class="mr-4 mb-0">$36.00 GBP</h3>
                                                    <small>Unpaid Proforma Invoices Generated by Admin</small>
                                                </div>
                                                <h6 class="mb-0">£0.00 GBP</h6>
                                                <small class="text-danger">Due Balance as On 2022-04-19</small>
                                            </div>
                                            <div class="py-4 border-bottom">
                                                <h5>
                                                    Quick Actions
                                                </h5>
                                                <ul class="py-0 info--list">
                                                    <li>
                                                        <a href="">Reset password and send mail</a>
                                                    </li>

                                                </ul>
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
</div>

@include('admin.design.js')
