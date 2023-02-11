@extends('admin.layouts.app_tag')
@section('content')


    <div class="container-fluid p-t-15">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="edit-avatar">
                            <img src="images/users/avatar.jpg" alt="..." class="img-avatar">
                            <div class="avatar-divider"></div>
                            <div class="edit-avatar-content">
                                <button class="btn btn-default">{{__('Modify avatar')}}</button>
                                <p class="m-0">{{__('Choose the image you like, it will automatically generate 264x264 size after cropping, the size of the uploaded image cannot exceed 2M.')}}</p>
                            </div>
                        </div>
                        <hr>
                        <form method="post" action="{{route('admin.profile.form')}}" class="site-form">
                            @csrf
                            <div class="form-group">
                                <label for="username">{{__('Username')}}</label>
                                <input type="text" class="form-control" name="username" id="username" value="{{$user->username}}" disabled="disabled" />
                            </div>
                            <div class="form-group">
                                <label for="first_name">{{__('First name')}}</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="{{__('First name')}}" value="{{$user->first_name}}">
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="last_name">{{__('Last name')}}</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="{{__('Last name')}}" value="{{$user->last_name}}">
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth">{{__('Date of birth')}}</label>
                                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="{{__('Date of birth')}}" value="{{$user->date_of_birth}}">
                                @if ($errors->has('date_of_birth'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">{{__('Email')}}</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="{{__('Email')}}" value="{{$user->email}}">
                                <small id="emailHelp" class="form-text text-muted">{{__('Please ensure that the email address you fill in is correct.')}}</small>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone">{{__('Phone')}}</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="{{__('Phone')}}" value="{{$user->phone}}">
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="lang_code">{{__('Language code')}}</label>
                                <select class="form-control" name="lang_code" id="lang_code">
                                    <option value="-1">{{__('Select language')}}</option>
                                </select>
                                @if ($errors->has('lang_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lang_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="currency_id">{{__('Currency')}}</label>
                                <select class="form-control" name="currency_id" id="currency_id">
                                    <option value="-1">{{__('Select currency')}}</option>
                                </select>
                                @if ($errors->has('currency_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('currency_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">{{__('Description')}}</label>
                                <textarea class="form-control" name="description" id="description" rows="3">{{$user->description}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
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
