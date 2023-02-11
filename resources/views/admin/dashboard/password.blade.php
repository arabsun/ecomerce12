@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">

                <div class="tab-content">
                    <div class="tab-pane active">

                        <form action="{{route('admin.password.update')}}" id="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Current Password')</label>
                                        <input type="password" class="form-control" name="cpass" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('New Password')</label>
                                        <input type="password" class="form-control" name="npass" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Re-new Password')</label>
                                        <input type="password" class="form-control" name="repass" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary btn-lg">@lang('Submit')</button>
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
