@extends('admin.layouts.app_tag')
@section('content')

    <div class="container-fluid p-t-15">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{route('admin.reset.password.form')}}" class="site-form">
                            @csrf
                            <div class="form-group">
                                <label for="old-password">{{__('Old Password')}}</label>
                                <input type="password" class="form-control" name="oldpwd" id="old-password" placeholder="{{__('Old Password')}}">
                                @if ($errors->has('oldpwd'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('oldpwd') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="new-password">{{__('New Password')}}</label>
                                <input type="password" class="form-control" name="newpwd" id="new-password" placeholder="{{__('New Password')}}">
                                @if ($errors->has('newpwd'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('newpwd') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">{{__('Confirm the new password')}}</label>
                                <input type="password" class="form-control" name="confirmpwd" id="confirm-password" placeholder="{{__('Confirm the new password')}}">
                                @if ($errors->has('confirmpwd'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('confirmpwd') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
