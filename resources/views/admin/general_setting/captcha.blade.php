@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="overview-tab-wapper">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <form action="" id="form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12 pr-0">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>@lang('ReCaptcha Settings')</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <h5 class="text-primary mb-4">@lang('Recaptcha Status')</h5>
                                                    <div class="form-group">
                                                        <label>@lang('Login Recaptcha')</label>
                                                        <select name="login_captcha" class="form-control" required>
                                                            <option value="1" {{$gs->login_captcha == 1 ? 'selected':''}}>@lang('Enable')</option>
                                                            <option value="0" {{$gs->login_captcha == 0 ? 'selected':''}}>@lang('Disable')</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>@lang('Registration Recaptcha')</label>
                                                        <select name="reg_captcha" class="form-control" required>
                                                            <option value="1" {{$gs->reg_captcha == 1 ? 'selected':''}}>@lang('Enable')</option>
                                                            <option value="0" {{$gs->reg_captcha == 0 ? 'selected':''}}>@lang('Disable')</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6">
                                                    <h5 class="text-primary mb-4">@lang('Recaptcha Credentials')</h5>
                                                    <div class="form-group">
                                                        <label>@lang('ReCaptcha Secret Key')</label>
                                                        <input type="text" class="form-control" name="secret_key"
                                                               value="{{$gs->captcha_secret}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>@lang('ReCaptcha Site Key')</label>
                                                        <input type="text" class="form-control" name="site_key"
                                                               value="{{$gs->captcha_site_key}}">
                                                    </div>

                                                </div>

                                                <div class="col-md-12 text-center mt-5">
                                                    <button type="submit"
                                                            class="btn btn-primary btn-lg">@lang('Update')</button>
                                                </div>

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

