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

                        <form action="{{route('admin.client.store')}}" id="form" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6 pr-0">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>@lang('Account Information')</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>@lang('Username')*</label>
                                                <input type="text" class="form-control" placeholder="@lang('Username')"
                                                       name="username" value="">
                                            </div>

                                            <div class="form-group">
                                                <label>@lang('Password')</label>
                                                <input type="text" class="form-control" value=""
                                                       placeholder="@lang('Enter Password')" name="password">
                                                <p class="text-muted">@lang('Leave blank to Auto generate')</p>
                                            </div>

                                            <div class="form-group">
                                                <label>@lang('Registered Email') *</label>
                                                <input type="text" class="form-control" value=""
                                                       placeholder="@lang('Registered Email')" name="email">
                                                <p class="text-muted">@lang('Leave blank to Auto generate')</p>
                                            </div>


                                            <div class="form-group">
                                                <label>@lang('Credit Balance')</label>
                                                <input type="number" vala class="form-control" value="0"
                                                       placeholder="@lang('Credit Balance')" name="balance">
                                            </div>


                                            <div class="form-group">
                                                <label>@lang('Status')</label>
                                                <select name="status" class="form-control" id="">
                                                    <option value="active">@lang('Active')</option>
                                                    <option value="blocked">@lang('Blocked')</option>
                                                    <option value="inactive">@lang('Inactive')</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>@lang('Client Group')</label>
                                                <select name="client_group_id" class="form-control" id="">
                                                    @foreach ($groups as $group)
                                                        <option value="{{$group->id}}">{{$group->group_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 pl-1">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>@lang('Personal Information') <small
                                                    class="text-muted">[Optional]</small></h4>
                                        </div>

                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>@lang('First Name')</label>
                                                        <input type="text" class="form-control"
                                                               placeholder="@lang('First Name')" name="first_name"
                                                               value="">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>@lang('Last Name')</label>
                                                        <input type="text" class="form-control"
                                                               placeholder="@lang('Last Name')" name="last_name"
                                                               value="">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group ">
                                                <label>@lang('Phone Number')</label>
                                                <input type="text" class="form-control" value=""
                                                       placeholder="@lang('Phone Number')" name="phone">
                                            </div>

                                            <div class="form-group ">
                                                <label>@lang('Company')</label>
                                                <input type="text" class="form-control" value=""
                                                       placeholder="@lang('Company')" name="company">
                                            </div>

                                            <div class="form-group ">
                                                <label>@lang('Address')</label>
                                                <textarea name="address" class="form-control"
                                                          style="height: 108px;"></textarea>
                                            </div>

                                            <div class="form-group ">
                                                <label>@lang('Address 2')</label>
                                                <textarea name="address2" class="form-control"
                                                          style="height: 108px;"></textarea>
                                            </div>
                                            <div class="form-group ">
                                                <label>@lang('Country')</label>
                                                <select name="" class="form-control" id="">
                                                    @foreach($countrys as $country)
                                                        @if($country->is_default==1)
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                        @endif

                                                    @endforeach
                                                        @foreach($countrys as $country)
                                                            @if($country->is_default!=1)
                                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                                            @endif

                                                        @endforeach
                                                </select>
                                            </div>

                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>@lang('State')</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="state"
                                                                   value="" placeholder="@lang('State')">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>@lang('City')</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="city" value=""
                                                                   placeholder="@lang('City')">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>@lang('Zip')</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="zip" value=""
                                                                   placeholder="@lang('Zip')">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>@lang('News Letter')</label>
                                                <div class="input-group">
                                                    <select name="newsletter" class="form-control" id="newsletter">
                                                        <option value="1">@lang('Active')</option>
                                                        <option value="0">@lang('Inactive')</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group fixed-bottom-buttons">
                                                <button type="submit"
                                                        class="btn btn-primary btn-lg">@lang('Submit')</button>
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

@include('admin.design.js')
