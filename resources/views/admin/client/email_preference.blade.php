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
                                            <form action="">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 40px !important;">@lang('Active')</th>
                                                        <th>@lang('Template')</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td>
                                                            <div class="checkbox"><label><input checked=""
                                                                                                type="checkbox"
                                                                                                name="tid[49]"
                                                                                                value="49"><i
                                                                        class="helper"></i></label></div>
                                                        </td>
                                                        <td>@lang('Send shipping details')</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="checkbox"><label><input checked=""
                                                                                                type="checkbox"
                                                                                                name="tid[50]"
                                                                                                value="50"><i
                                                                        class="helper"></i></label></div>
                                                        </td>
                                                        <td>@lang('Shop Order Rejected')</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="checkbox"><label><input checked=""
                                                                                                type="checkbox"
                                                                                                name="tid[73]"
                                                                                                value="73"><i
                                                                        class="helper"></i></label></div>
                                                        </td>
                                                        <td>@lang('Price update notification')</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="checkbox"><label><input checked=""
                                                                                                type="checkbox"
                                                                                                name="tid[17]"
                                                                                                value="17"><i
                                                                        class="helper"></i></label></div>
                                                        </td>
                                                        <td>@lang('Server Order successfull')</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="checkbox"><label><input checked=""
                                                                                                type="checkbox"
                                                                                                name="tid[45]"
                                                                                                value="45"><i
                                                                        class="helper"></i></label></div>
                                                        </td>
                                                        <td>@lang('Server Order Cancelled')</td>
                                                        <td></td>
                                                    </tr>

                                                    </tbody>
                                                </table>

                                                <div class="form-group fixed-bottom-buttons">
                                                    <button type="submit"
                                                            class="btn btn-primary btn-lg">@lang('Update')</button>
                                                </div>
                                            </form>
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
