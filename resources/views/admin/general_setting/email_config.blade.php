@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="overview-tab-wapper">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="card">
                            <div class="card-body">
                                <form action="" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input type="hidden" name="check_smtp" value="1">
                                    <div class="form-group row mb-3">
                                        <label class="col-sm-3 col-form-label"
                                               for="mail_type">{{ __('Mail System') }}</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="mail_type" name="mail_type">
                                                <option value="php_mail" {{$gs->mail_type == 'php_mail' ? 'selected' : ''}}>{{trans('PHP Mail')}}</option>
                                                <option value="php_mailer" {{$gs->mail_type == 'php_mailer' ? 'selected' : ''}}>{{trans('SMTP Mail')}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="smtp__check {{$gs->mail_type != 'php_mail' ? '' : 'd-none'}}">
                                        <div class="form-group row mb-3">
                                            <label for="smtp_host"
                                                   class="col-sm-3 col-form-label">{{ __('SMTP Host') }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="smtp_host" name="smtp_host"
                                                       placeholder="{{ __('SMTP Host') }}" value="{{$gs->smtp_host}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="smtp_port"
                                                   class="col-sm-3 col-form-label">{{ __('SMTP Port') }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="smtp_port" name="smtp_port"
                                                       placeholder="{{ __('SMTP Port') }}" value="{{$gs->smtp_port}}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="smtp_user"
                                                   class="col-sm-3 col-form-label">{{ __('SMTP Username') }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="smtp_user" name="smtp_user"
                                                       placeholder="{{ __('SMTP Username') }}"
                                                       value="{{ $gs->smtp_user }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label for="smtp_pass"
                                                   class="col-sm-3 col-form-label">{{ __('SMTP Password') }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="smtp_pass" name="smtp_pass"
                                                       placeholder="{{ __('SMTP Password') }}"
                                                       value="{{ $gs->smtp_pass }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-sm-3 col-form-label"
                                                   for="mail_encryption">{{ __('Mail Encryption') }}</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="mail_encryption"
                                                        name="mail_encryption">
                                                    <option value="tls" {{$gs->mail_encryption == 'tls' ? 'selected' : ''}}>{{trans('TLS')}}</option>
                                                    <option value="ssl" {{$gs->mail_encryption == 'ssl' ? 'selected' : ''}}>{{trans('SSL')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="from_email"
                                               class="col-sm-3 col-form-label">{{ __('From Email') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="from_email" name="from_email"
                                                   placeholder="{{ __('From Email') }}" value="{{ $gs->from_email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="from_name"
                                               class="col-sm-3 col-form-label">{{ __('From Name') }}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="from_name" name="from_name"
                                                   placeholder="{{ __('From Name') }}" value="{{$gs->from_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 text-right">
                                            <button type="submit"
                                                    class="btn btn-primary btn-lg">{{trans('Save')}}</button>
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
</div>
@include('admin.design.js')
