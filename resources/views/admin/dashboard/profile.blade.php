@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">

                <div class="tab-content">
                    <div class="tab-pane active">

                        <form action="{{route('admin.profile.update')}}" id="form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-6 col-lg-6">
                                    <img src="{{asset('assets/images/'.auth()->guard('admin')->user()->photo)}}" width="100" alt="">
                                    <div class="form-group">
                                        <label>@lang('Photo')</label>
                                        <input type="file" class="form-control"  name="photo" >
                                    </div>

                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Name')</label>
                                        <input type="text" class="form-control"  name="name" value="{{auth()->guard('admin')->user()->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Email')</label>
                                        <input type="email" class="form-control" name="email"  value="{{auth()->guard('admin')->user()->email}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Phone')</label>
                                        <input type="text" class="form-control" name="phone"  value="{{auth()->guard('admin')->user()->phone}}">
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
