<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{asset('public/admin/asset/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/asset/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/asset/js/bootstrap-multitabs/multitabs.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/asset/css/tagify.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/asset/css/datatable.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/asset/css/tagify.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/asset/css/style.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin/asset/css/colorpicker.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/js/all.min.js"></script>

<style>
    .form-control.tagify__input {
  min-height: 38px;
  height: auto;
  padding-top: 0;
  padding-bottom: 0;
}
[class*="col-xxl"] {
  position: relative;
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
}


 /**custom switch **/
 .wrapper {
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 2rem;
    background-color: #fafafa;
  }

  .switch--box {
    width: 25rem;
    text-align: center;
    padding: 2rem;
    border: 0.1rem solid rgba(15, 31, 77, 0.1);
    border-radius: 1.2rem;
    background-color: #fafafa;
    box-shadow: 0 0.5rem 1.2rem rgba(15, 31, 77, 0.1);
  }

  .cswitch {
    position: relative;
    display: inline-flex;
    flex-direction: row-reverse;
    align-items: center;
    -webkit-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;
    cursor: pointer;
  }
  .cswitch--label {
    margin-left: 0.5rem;
    color: #0f1f4d;
    -webkit-user-select: none;
       -moz-user-select: none;
        -ms-user-select: none;
            user-select: none;
  }
  .cswitch--input {
    position: absolute;
    opacity: 0;
    display: none;
    width: 0;
    height: 0;
    top: -100rem;
    left: -100rem;
  }
  .cswitch--trigger {
    position: relative;
    height: 1.8rem;
    width: 4rem;
    border-radius: 5rem;
    transition: all 0.3s ease-in;
    background-color: rgba(15, 31, 77, 0.15);
  }
  .cswitch--trigger::after {
    content: "";
    position: absolute;
    height: 1.3rem;
    width: 1.3rem;
    background: #fff;
    left: 0.9rem;
    top: 50%;
    transform: translate(-50%, -50%);
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    border-radius: 100%;
    box-shadow: 0 1px 2px 0 rgba(34, 36, 38, 0.15), 0 0 0 1px rgba(34, 36, 38, 0.15) inset;
  }
  .cswitch:hover .cswitch--trigger {
    background-color: rgba(15, 31, 77, 0.2);
  }

  .cswitch input:checked ~ .cswitch--trigger {
    box-shadow: 0 0 0.25rem 0 #33cabb inset;
    background-color: #33cabb;
  }
  .cswitch input:checked ~ .cswitch--trigger::after {
    left: calc(100% - 0.9rem);
  }



  @media screen and (min-width:992px) {
    .chat__list {
        min-height: 400px;
    }
}
.chat__list {
    margin: 0;
    display: block;
    max-height: calc(100vh - 250px);
    overflow-y: scroll;
}

.chat__list > li {
    width: 100%;
    border-bottom: 1px solid #e1e1e1;
    padding: 10px 0;
}

.chat__list > li:last-child {
    border: none;
}

.chat__item {
    width: 100%;
}

.chat__item .item__inner {
    display: block;
    padding: 10px 15px;
    border-radius: 5px;
}

.chat__item .item__inner .chat__meta {
    margin: 3px;
    margin-top: -25px;
    padding-left: 65px;
    font-size: 13px;
}

.chat__item .item__inner a {
    color: #456;
}

.chat__item.active .item__inner, .chat__item:hover .item__inner {
    background: rgba(31, 31, 35, 0.05);
}
.chat__msg-header .post__creator {
    display: inline-flex;
    position: relative;
}

.chat__msg-header .post__creator .profile-link {
    position: absolute;
    content: "";
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
}
.msg__wrapper {
    padding: 0;
}
.chat__msg-body {
    max-height: calc(100vh - 250px);
    min-height: 400px;
    overflow-y: scroll;
    background: #d3d3d329;
}
.chat__msg-body .msg__wrapper li p {

    padding: 10px 15px;
    background: rgba(31, 31, 35, 0.05);
    border-radius: 15px 15px 15px 0;
    font-size: 15px;
    display: inline-block;
}
.out__msg {

    background: #6777efd1!important;
    color: #fff;
}


.chat__msg-footer .send__msg {
    box-shadow: 0 0 15px rgba(31, 31, 35, 0.05);
}

.chat__msg-footer .send__msg .input-group {
    position: relative;
}

.chat__msg-footer .send__msg .form--control {
    border: 1px solid #e1e1e1 !important;
    height: 50px;
    padding: 10px 15px;
    padding-left: 60px;
}

.chat__msg-footer .send__msg .send-btn {
    background: rgba(31, 31, 35, 0.05);
    width: 50px !important;
    height: 50px !important;
    padding: 0;
    font-size: 24px;
    color: #fff;
    background: #6777ef !important;
}

.chat__msg-footer .send__msg .upload-file {
    cursor: pointer;
    position: absolute;
    left: 0px;
    top: 0px;
    bottom: 0;
    z-index: 11;
    width: 50px;
    height: 50px;
    background: rgba(31, 31, 35, 0.05);
    font-size: 18px;
    border-radius: 5px 0 0 5px !important;
}

.msg__item .comment-img {
    max-width: 300px;
    width: 100%;
}

.msg__item .comment-img img {
    width: 100%;
}
ul li {
    list-style: none;
}
.msg__item .post__creator-content {
    padding-top: 0;
}
.chat__msg-footer .send__msg .upload-file,
.chat__msg-footer .send__msg .upload-file i {
    text-align: center;
    line-height: 50px !important;
}
.send-btn {
    border-radius: 0 5px 5px 0;
    line-height: 50px;
}
.msg__item .post__creator-content .comment-date {
    display: block;
    font-size: 11px;
    margin-bottom: 7px;
}

.outgoing__msg .post__creator {
    flex-direction: row-reverse;
}
.chat__msg-footer {
    margin-top: 20px;
}

.outgoing__msg .post__creator-content {
    text-align: right;
    padding-left: 18px;
    padding-right: 18px;
}
.incoming__msg .post__creator-content {
    padding-left: 18px;
    padding-right: 18px;
}

.outgoing__msg .post__creator-content p {
    border-radius: 15px 15px 0 15px !important;
}
.outgoing__msg .post__creator {
    display: flex;
    flex-wrap: wrap;
    flex-direction: row-reverse;
}


.post__creator-content {
    max-width: 90%;}
    @media screen and (min-width: 768px) {

.post__creator-content {
    max-width: 575px;}
    }


body * ::-webkit-scrollbar {
    width: 5px !important;
    height: 5px;
}

body * ::-webkit-scrollbar-thumb {
    background: rgba(31, 31, 35, 0.4) !important;
    border-radius: 5px !important;
}
.msg__wrapper li {
    list-style: none;
    padding: 0;
}
.msg__wrapper li  p {
    margin-bottom: 0;
}
</style>
