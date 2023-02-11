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
                            <form action="{{route('admin.client.permission.submit',$client->id)}}" id="form"
                                  method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12 pr-0">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>@lang('Edit Account Information')</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="com-md-4 col-sm-6 col-lg-4">


                                                        <div class="form-group">
                                                            <label>@lang('Status')*</label>
                                                            <select name="status" class="form-control" id="">
                                                                <option
                                                                    value="active" {{$client->status == 'active' ? 'selected' : ''}}>
                                                                    Active
                                                                </option>
                                                                <option
                                                                    value="inactive" {{$client->status == 'inactive' ? 'selected' : ''}}>
                                                                    Inactive
                                                                </option>
                                                                <option
                                                                    value="blocked" {{$client->status == 'blocked' ? 'selected' : ''}}>
                                                                    Blocked
                                                                </option>
                                                            </select>
                                                        </div>


                                                        <div class="form-group">
                                                            <label>@lang('ID/KYC')*</label>
                                                            <select name="is_kyc" class="form-control" id="">
                                                                <option
                                                                    value="1" {{$client->is_kyc == '1' ? 'selected' : ''}}>
                                                                    Verified
                                                                </option>
                                                                <option
                                                                    value="0" {{$client->is_kyc == '0' ? 'selected' : ''}}>
                                                                    Pending
                                                                </option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('Transfer Credit')*</label>
                                                            <div class="example-box">
                                                                <label
                                                                    class="lyear-checkbox checkbox-inline checkbox-primary">
                                                                    <input type="checkbox" name="is_transfer_credit"
                                                                           value="1" {{$client->is_transfer_credit == 1 ? 'checked' : ''}}><span> Transfer Credit</span>
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('Affiliate')*</label>
                                                            <select name="affiliate" class="form-control" id="">
                                                                <option
                                                                    value="1" {{$client->affiliate == '1' ? 'selected' : ''}}>
                                                                    Enable
                                                                </option>
                                                                <option
                                                                    value="0" {{$client->affiliate == '0' ? 'selected' : ''}}>
                                                                    Disable
                                                                </option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('Add Fund Minimum Limit')*</label>
                                                            <input type="number" class="form-control"
                                                                   name="add_min_found"
                                                                   value="{{$client->add_min_found}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>@lang('Add Fund Maximum Limit')*</label>
                                                            <input type="number" class="form-control"
                                                                   name="add_max_found"
                                                                   value="{{$client->add_max_found}}">
                                                        </div>
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

