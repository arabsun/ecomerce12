@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
                    @include('admin.tab-link.client-supplier')
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">

                        <form action="{{route('admin.group.store')}}" id="form" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>@lang('Group Name')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Group Name')"
                                           name="group_name" value="">
                                </div>

                                <div class="form-group">
                                    <p>@lang('Show Group pricing')</p>
                                    <label class="custom-switch pl-0">
                                        <input type="checkbox" name="is_group_pricing" value="1"
                                               class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description text-muted">@lang('Show this Group pricing on Products and Services')
                            </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="membership_type">@lang('Membership Type')</label>
                                    <select name="membership_type" id="membership_type" class="form-control">
                                        <option value="onetime">@lang('Onetime')</option>
                                        <option value="monthly">@lang('Monthly')</option>
                                        <option value="custom">@lang('Custom')</option>
                                    </select>
                                </div>

                                <div class="form-group membership_time d-none">
                                    <label>@lang('Membership Time (Days)')</label>
                                    <input type="text" class="form-control" value=""
                                           placeholder="@lang('Membership Time')" name="membership_time">
                                </div>

                                <div class="form-group">
                                    <label>@lang('Membership Fee')</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                $
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" value="" name="membership_fee"
                                               placeholder="@lang('Membership Fee')">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>@lang('Add Fund Minimum Limit')</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="fund_min_limit" value=""
                                               placeholder="@lang('Max Credit Limit')">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>@lang('Add Fund Maximum Limit')</label>
                                    <div class="input-group">
                                        <input type="number" name="fund_max_limit" class="form-control"
                                               placeholder="@lang('Max Credit Limit')">
                                    </div>
                                </div>

                                <div class="justify-content-md-around">
                                    <div class="form-group">
                                        <p>@lang('Retail Group')</p>
                                        <label class="custom-switch pl-0 ">
                                            <input type="checkbox" name="is_retail_group" class="custom-switch-input"
                                                   value="1">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description text-muted">@lang('Auto update Retail service price to this group')
                                </span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <p>@lang('ID Verification/KYC')</p>
                                        <label class="custom-switch pl-0">
                                            <input type="checkbox" name="is_kyc" class="custom-switch-input" value="1">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary btn-lg">@lang('Submit')</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@include('admin.design.js')
