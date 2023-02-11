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
                            <form action="{{route('admin.client.financial.submit',$client->id)}}" id="form"
                                  method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12 pr-0">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>@lang('Edit Account Information')</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>@lang('Transaction')*</label>
                                                    <div class="example-box">
                                                        <label class="lyear-checkbox checkbox-inline checkbox-primary">
                                                            <input type="checkbox" class="check_type_amount"
                                                                   name="credit"
                                                                   value="1" {{request()->input('type') ? (request()->input('type') == 'credit' ? 'checked' : '') :'checked' }}><span> @lang('Add Credit')</span>
                                                        </label>
                                                        <label class="lyear-checkbox checkbox-inline checkbox-primary">
                                                            <input type="checkbox" class="check_type_amount"
                                                                   name="rebate"
                                                                   value="1" {{request()->input('type') ? (request()->input('type') == 'rebate' ? 'checked' : '') :'' }}><span> @lang('Rebate Credit')</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div
                                                    class="credit_amount {{request()->input('type') ? (request()->input('type') == 'credit' ? '' : 'd-none') :'' }}">
                                                    <div class=" mb-2 d-flex">
                                                        <p> £{{$client->balance}} GBP</p>
                                                        + <input type="number" name="plus_amount"
                                                                 balance="{{$client->balance}}" value=""
                                                                 id="amount_plus" class="form-control w-25"> =
                                                        <p class="up_final_balance">{{$client->balance}}</p>
                                                    </div>
                                                </div>

                                                <div
                                                    class="rebate_amount {{request()->input('type') ? (request()->input('type') == 'rebate' ? '' : 'd-none') :'d-none' }} ">
                                                    <div class="mb-2 d-flex">
                                                        <p> £{{$client->balance}} GBP</p>
                                                        - <input type="text" name="mius_amount"
                                                                 balance="{{$client->balance}}" id="amount_mius"
                                                                 value="" class="form-control w-25"> =
                                                        <p class="down_final_balance">{{$client->balance}}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group invoice_check">
                                                    <div class="example-box">
                                                        <label class="lyear-checkbox checkbox-inline checkbox-primary">
                                                            <input type="checkbox" id="generate_invoice" checked
                                                                   name="generate_invoice"
                                                                   value="1"><span> @lang('Generate Invoice')</span>
                                                        </label>
                                                        <label class="lyear-checkbox checkbox-inline checkbox-primary">
                                                            <input type="checkbox" id="amount_paid" name="paid"
                                                                   value="1"><span> @lang('Paid')</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div id="show_financial_form">
                                                    <div class="form-group">
                                                        <label>@lang('Due days')*</label>
                                                        <input type="date" class="form-control" value="" name="due_day">
                                                    </div>


                                                    <div class="form-group">
                                                        <label>@lang('Payment Gateway')*</label>
                                                        <select name="payment_gateway" class="form-control" id="">
                                                            <option value="stripe">Stripe</option>
                                                            <option value="stripe">Paypal</option>
                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>@lang('Transaction ID')*</label>
                                                        <input type="text" class="form-control" value="" name="txn_id">
                                                    </div>


                                                    <div class="form-group">
                                                        <label>@lang('Fees')*</label>
                                                        <input type="text" class="form-control" value="" name="txn_id">
                                                    </div>


                                                    <div class="form-group">
                                                        <label>@lang('Credit Balance Validity')*</label>
                                                        <input type="number" class="form-control" value=""
                                                               name="balance_validity">
                                                    </div>

                                                </div>


                                                <div class="form-group fixed-bottom-buttons">
                                                    <button type="submit"
                                                            class="btn btn-primary btn-lg">@lang('Update')</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.design.js')

