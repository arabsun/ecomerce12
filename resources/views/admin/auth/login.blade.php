<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0045)https://fusiondemo.dhru.com/admincp/index.php -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Arab Sun | Admin | Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/assets/admin/images/logo.png">
    <meta name="ROBOTS" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <style type="text/css">
        * {
            -webkit-appearance: none
        }

        body {
            color: #333333;
            font-family: arial;
            font-size: 11px;
            padding-top: 100px;
            font-family: 'myriad-pro', sans-serif;
        }

        body {
            background-color: white;
            margin: 0;
        }

        a, a:visited {
            color: #717275;
            text-decoration: none;
        }

        strong {
            font-weight: 100;
        }

        a:hover {
            text-decoration: none;
        }

        form {
            margin: 0;
            padding: 0;
        }

        td strong {
            color: white;
        }

        .groupstabes {
            border-radius: 0 0 0 0;
            margin-bottom: 5px;
            width: 310px;
            margin: auto;
        }

        .groupstabescontant {
        }

        .groupstabes h2 {
            background: none repeat scroll 0 0 #FAFAFA;
            border-bottom: 1px solid #EEEEEE;
            border-radius: 5px 5px 0 0;
            color: black;
            font-size: 16px;
            font-weight: normal;
            margin-top: 0;
            padding: 10px;
        }

        .groupstabescontant table td, .form td {
            padding: 0;
        }

        .groupstabescontant table tr:hover td small, .form tr:hover td small, .form tr:hover td a {
            color: black;
        }

        .groupstabescontant table tr:last-child td, .form tr:last-child td {
            border-bottom: medium none;
        }

        input[type="text"], input[type="password"] {
            border: 1px solid #DDDDDD;
            color: #575757;
            font-family: arial;
            outline: 0 none;
            padding: 15px 4%;
            box-sizing: border-box;
            width: 100%;
        }

        input[type="text"]:focus, select:focus, input[type="password"]:focus, textarea:focus {
            border: 1px solid #DDDDDD;
        }

        input[type="text"]:hover, select:hover, textarea:hover, input[type="password"]:hover {
            border: 1px solid #DDDDDD;
        }

        .dv img {
            opacity: 0;
            right: -65px
        }

        .dv:hover img, input[type="text"]:focus + img, input[type="password"]:focus + img {
            opacity: 1;
        }

        input[type="checkbox"] {
            vertical-align: middle;
        }


        input.button_save, .btn.active, .btn.save, .submit {
            background: #717275;
            color: white !important;
            font-size: 14px;
            font-weight: 100;
            padding: 6px 10px;
            border: 0px;
        }

        #login_container {
            background: none repeat scroll 0 0 white;
            border-radius: 10px 10px 10px 10px;
            margin: 20px auto 10px;
            text-align: left;
            width: 330px;
        }

        #logo {
            margin: 0;
            padding: 50px 0 0;
            text-align: center;
        }

        #login_container #login {
            padding: 0 20px;
            text-align: left;
        }

        #login_container #login_failed {
            background-color: #FCF9D2;
            margin: 0 0 1px;
            padding: 10px;
            text-align: center;
        }

        #extra_info {
            background-color: #313c42;
            font-size: 13px;
            font-weight: 100;
            margin-top: 20px;
            text-align: left;
        }

        .username {
            background: url("images/login_username.png") no-repeat scroll right center white;
            border-radius: 5px 5px 0 0;
        }

        .passwordd, .passwordo {
            background: url("images/login_password.png") no-repeat scroll right center white;
            border-radius: 0 0 5px 5px;
            margin-bottom: 5px;
        }

        .checkbox input[type="checkbox"], .radio input[type="radio"] {
            margin: 0 10px 0 0;
            z-index: -9999;
        }

        .checkbox label, .radio label {
            cursor: pointer;
            height: 17px;
            line-height: 17px;
            margin-left: -5px;
            margin-right: 10px;
            z-index: 1;
        }

        /* Base for label styling */
        [type="checkbox"].custom-checkbox:not(:checked),
        [type="checkbox"].custom-checkbox:checked {
            position: absolute;
            left: -9999px;
        }

        [type="checkbox"].custom-checkbox:not(:checked) + label,
        [type="checkbox"].custom-checkbox:checked + label {
            position: relative;
            padding-left: 25px;
            cursor: pointer;
        }

        /* checkbox aspect */
        [type="checkbox"].custom-checkbox:not(:checked) + label:before,
        [type="checkbox"].custom-checkbox:checked + label:before {
            content: '';
            position: absolute;
            left: 0;
            top: 2px;
            width: 17px;
            height: 17px;
            border: 1px solid #aaa;
            border-radius: 3px;
        }

        /* checked mark aspect */
        [type="checkbox"].custom-checkbox:not(:checked) + label:after,
        [type="checkbox"].custom-checkbox:checked + label:after {
            content: "\02713";
            position: absolute;
            top: 3px;
            left: 4px;
            font-size: 18px;
            line-height: 0.8;
            color: #09ad7e;
            transition: all .2s;
            border: transparent solid 1px !important;
        }

        /* checked mark aspect changes */
        [type="checkbox"].custom-checkbox:not(:checked) + label:after {
            opacity: 0;
            transform: scale(0);
        }

        [type="checkbox"].custom-checkbox:checked + label:before {
            opacity: 1;
            transform: scale(1);
            border: none;
        }

        /* disabled checkbox */
        [type="checkbox"].custom-checkbox:disabled:not(:checked) + label:before,
        [type="checkbox"].custom-checkbox:disabled:checked + label:before {
            box-shadow: none;
            border-color: #bbb;
            background-color: #ddd;
        }

        [type="checkbox"].custom-checkbox:disabled:checked + label:after {
            color: #999;
        }

        [type="checkbox"].custom-checkbox:disabled + label {
            color: #aaa;
        }

        .pulse-button {
            position: relative;
            top: 50%;
            left: 50%;
            margin-left: -135px;
            margin-top: -50px;
            display: inline-block;
            width: 50px;
            height: 50px;
            font-size: 1.3em;
            font-weight: light;
            font-family: 'Trebuchet MS', sans-serif;
            text-transform: uppercase;
            text-align: center;
            line-height: 50px;
            letter-spacing: -1px;
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 0 0 0 rgba(90, 153, 212, 0.5);
            -webkit-animation: pulse 1.5s infinite;
        }

        .pulse-button:hover {
            -webkit-animation: none;
        }

        @-webkit-keyframes pulse {
            0% {
                -moz-transform: scale(0.9);
                -ms-transform: scale(0.9);
                -webkit-transform: scale(0.9);
                transform: scale(0.9);
            }
            70% {
                -moz-transform: scale(1);
                -ms-transform: scale(1);
                -webkit-transform: scale(1);
                transform: scale(1);
                box-shadow: 0 0 0 30px rgba(90, 153, 212, 0);
            }
            100% {
                -moz-transform: scale(0.9);
                -ms-transform: scale(0.9);
                -webkit-transform: scale(0.9);
                transform: scale(0.9);
                box-shadow: 0 0 0 0 rgba(90, 153, 212, 0);
            }
        }

        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px white inset;
        }


        .text-logo {
            font-size: 28px;
            color: #f59730;
            font-weight: 300;
            padding: 5px 20px;
            width: 100%;
        }

        .text-logo span {
            color: #f59730;
        }

        @media only screen and (max-width: 786px) {
            body {
                padding-top: 60px;
            }

            #login_container {
                width: 80%;
                margin: auto !important;
            }

            input[type="text"], input[type="password"] {

            }

            .btn.save {

            }
        }


        ::-webkit-input-placeholder {
            font-style: italic;
        }

        ::-moz-placeholder {
            font-style: italic;
        }

        :-ms-input-placeholder {
            font-style: italic;
        }

        :-moz-placeholder {
            font-style: italic;
        }


        .circles {
            position: absolute;
            top: -15px;
            left: 0;
            right: 0;
            z-index: -1;
            height: 100%;
            overflow: hidden;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(21, 212, 207, 0.76);
            animation: animate 25s linear infinite;
            bottom: -150px;
        }

        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }


        .circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .circles li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .circles li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .circles li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .circles li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .circles li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }


        @keyframes animate {

            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }

            100% {
                transform: translateY(-400px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }

        }


    </style>

    <script language="javascript">

        function sf() {

            document.getElementById('username').focus();
        }


    </script>

</head>
<body onload="">

<ul class="circles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
</ul>


<div align="center" style="margin: auto;">

    <img src="http://netronsoft.com/assets/images/16714627711.svg" style="height: 50px;">
    <br><br>
    <span style="color: #242c6a;">@Arab Sun Tech</span>

</div>

<div id="login_container">


    <div id="accountinfo1" class="groupstabes">
        <div class="groupstabescontant">

            <div id="login">
                <form id="loginform" action="{{route('admin.auth')}}" method="POST">
                    @csrf

                    <div style="position: relative;margin: 0;padding: 0;margin-bottom:-4px" class="dv">
                        <input type="text" placeholder="{{__('username')}}" class="form-control" name="username" id="username" style="border-bottom: none;"
                              value="" tabindex="1" n size="30" >
                    </div>
                    <div style="position: relative;margin: 0;padding: 0;margin-top:-4px" class="dv">
                        <input type="password" autocomplete="off" tabindex="2" placeholder="{{__('password')}}"  id="password" name="password"
                               size="30" value="" style="height: 45px;" class="passwordd">
                    </div>


                    <div align="right" style="margin-right: 5px;margin-top: 4px"><a
                            href="" tabindex="4">{{ __('Forgot Password?') }}</a></div>

                    <div id="" class="login-btn"
                         style="margin-top:20px;border-bottom: 0px solid #eee; padding: 7px 0px;position: relative;">
                        <div style="float: left;margin: 4px 0 0 10px;" class="checkbox">
                            <input type="checkbox" class="custom-checkbox" tabindex="5" name="rememberme"
                                   id="rememberme" autocomplete="off" {{ old('remember') ? 'checked' : '' }}>
                            <label for="rememberme" style="color:#888;padding-top:5px">{{ __('Remember Password') }}</label>
                        </div>
                        <input id="authdata" type="hidden"  value="{{ __('Authenticating...') }}">
                        <button class="btn save" style="float: right;"
                                autocomplete>{{ __('Login') }}</button>

                        <div style="clear: both;"></div>
                    </div>


                    <br>
                </form>

            </div>

            <script>
                $('input').attr({'autocomplete': 'off'});
            </script>

        </div>
    </div>
</div>

<div align="center" style="color: #ccc;">
    Version 1
</div>

<div align="center">
    Secure SSL Access

</div>


<div id="extra_info" style="position: fixed;bottom: 0;width: 100%;left:0;color:white">
    <table width="100%" border="0" cellspacing="10" cellpadding="0">
        <tbody>
        <tr>
            <td align="left" valign="middle">
                <span>IP Logged in : <strong>91.186.250.159</strong></span></td>

        </tr>
        </tbody>
    </table>

</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block alert-message-admin">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block alert-message-admin">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block alert-message-admin">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block alert-message-admin">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<script type="text/javascript" src="{{asset('public/admin/asset/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/admin/asset/js/bootstrap.min.js')}}"></script>

@if ($errors->any())
    <div class="alert alert-danger alert-message-admin">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Please check the form below for errors
    </div>
@endif
<style>
    .alert-message-admin{
        position: absolute;
        bottom: 3%;
        right: 1%;
    }
</style>

</body>
</html>
