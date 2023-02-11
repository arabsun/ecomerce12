@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="overview-tab-wapper">

                    <div class="tab-content">
                        <div class="tab-pane active">
                            <form action="" id="form" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12 pr-0">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>@lang('Social Login Credentials')</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row justify-content-center">
                                                    <div class="com-md-6 col-sm-6 col-lg-6">
                                                        <h5 class="text-primary">@lang('Google Settings')</h5>

                                                        <div class="form-group">
                                                            <label>@lang('Google Login')</label>
                                                            <select name="google_login" class="form-control" required>
                                                                <option
                                                                    value="ENABLE" {{env('GOOGLE_LOGIN') == 'ENABLE' ? 'selected':''}}>@lang('Enable')</option>
                                                                <option
                                                                    value="DISABLE" {{env('GOOGLE_LOGIN') == 'DISABLE' ? 'selected':''}}>@lang('Disable')</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('Google Client ID')</label>
                                                            <input type="text" class="form-control"
                                                                   name="google_client_id"
                                                                   value="{{env('GOOGLE_CLIENT_ID')}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('Google Client Secret')</label>
                                                            <input type="text" class="form-control"
                                                                   name="google_secret_id"
                                                                   value="{{env('GOOGLE_SECRET_ID')}}">
                                                        </div>

                                                        <hr>

                                                        <h5 class="text-primary">@lang('Facebook Settings')</h5>

                                                        <div class="form-group">
                                                            <label>@lang('Facebook Login')</label>
                                                            <select name="facebook_login" class="form-control" required>
                                                                <option
                                                                    value="ENABLE" {{env('FACEBOOK_LOGIN') == 'ENABLE' ? 'selected':''}}>@lang('Enable')</option>
                                                                <option
                                                                    value="DISABLE" {{env('FACEBOOK_LOGIN') == 'DISABLE' ? 'selected':''}}>@lang('Disable')</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('Facebook Client ID')</label>
                                                            <input type="text" class="form-control"
                                                                   name="facebook_client_id"
                                                                   value="{{env('FACEBOOK_CLIENT_ID')}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('Facebook Client Secret')</label>
                                                            <input type="text" class="form-control"
                                                                   name="facebook_secret_id"
                                                                   value="{{env('FACEBOOK_SECRET_ID')}}">
                                                        </div>

                                                        <hr>

                                                        <h5 class="text-primary">@lang('Twitter Settings')</h5>

                                                        <div class="form-group">
                                                            <label>@lang('Twitter Login')</label>
                                                            <select name="twitter_login" class="form-control" required>
                                                                <option
                                                                    value="ENABLE" {{env('TWITTER_LOGIN') == 'ENABLE' ? 'selected':''}}>@lang('Enable')</option>
                                                                <option
                                                                    value="DISABLE" {{env('TWITTER_LOGIN') == 'DISABLE' ? 'selected':''}}>@lang('Disable')</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('Twitter Client ID')</label>
                                                            <input type="text" class="form-control"
                                                                   name="twitter_client_id"
                                                                   value="{{env('TWITTER_CLIENT_ID')}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>@lang('Twitter Client Secret')</label>
                                                            <input type="text" class="form-control"
                                                                   name="twitter_secret_id"
                                                                   value="{{env('TWITTER_SECRET_ID')}}">
                                                        </div>


                                                        <div class="form-group fixed-bottom-buttons">
                                                            <button type="submit"
                                                                    class="btn btn-primary btn-lg">@lang('Update')</button>
                                                        </div>
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
</div>
@include('admin.design.js')

