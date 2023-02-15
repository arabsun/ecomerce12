@extends('frontend.layouts.master')

@section('content')
   <!-- ====== MAIN CONTENT ===== -->
   <main id="content">
       <div class="container">
           <div class="row">
               <div class="col-md-3 border-right">
                   <h6 class="font-weight-medium font-size-7 pt-5 pt-lg-8  mb-5 mb-lg-7">@lang('My account')</h6>
                   <div class="tab-wrapper">
                       <ul class="my__account-nav nav flex-column mb-0" role="tablist" id="pills-tab">
                           <li class="nav-item mx-0">
                               <a class="nav-link d-flex align-items-center px-0 active" data-url="" href="javascript:void(0)" >
                                   <span class="font-weight-normal text-gray-600">@lang('Dashboard')</span>
                               </a>
                           </li>
                           <li class="nav-item mx-0">
                               <a class="nav-link d-flex align-items-center px-0" data-url="order" href="javascript:void(0)">
                                   <span class="font-weight-normal text-gray-600">@lang('My Orders')</span>
                               </a>
                           </li>
                           <li class="nav-item mx-0">
                               <a class="nav-link d-flex align-items-center px-0" data-url="setting" href="javascript:void(0)">
                                   <span class="font-weight-normal text-gray-600">@lang('Setting')</span>
                               </a>
                           </li>
                           <li class="nav-item mx-0">
                               <a class="nav-link d-flex align-items-center px-0" data-url="address" href="javascript:void(0)">
                                   <span class="font-weight-normal text-gray-600">@lang('Address')</span>
                               </a>
                           </li>
                           <li class="nav-item mx-0">
                               <a class="nav-link d-flex align-items-center px-0" data-url="ticket" href="javascript:void(0)">
                                   <span class="font-weight-normal text-gray-600">@lang('Ticket')</span>
                               </a>
                           </li>
                           <li class="nav-item mx-0">
                               <a class="nav-link d-flex align-items-center px-0" href="{{route('frontend.logout')}}">
                                   <span class="font-weight-normal text-gray-600">@lang('Logout')</span>
                               </a>
                           </li>
                       </ul>
                   </div>
               </div>
               <div class="col-md-9">
                   <div class="tab-content" id="pills-tabContent">
                       <div class="content-dashboard" id="content_dashboard">

                       </div>
                   </div>
               </div>
           </div>
       </div>
   </main>

   <!-- ====== END MAIN CONTENT ===== -->
@endsection
@section('script')

    <script>
        $( ".nav-item .nav-link" ).click(function() {
            contentPage($(this).attr('data-url'));
        });
        $( document ).ready(function() {
            contentPage('{{ isset($content) ? $content : "" }}');
        });
        function contentPage(that){
            var content = that;
            if(that == ''){
                var link = '{{ strstr( url()->previous(), 'dashboard' ,-1).'dashboard' }}';

            }else{
                var link = '{{ strstr( url()->previous(), 'dashboard' ,-1).'dashboard/' }}'+content;
            }
            $.ajax({
                url: "{{route('frontend.content')}}?content="+content,
                type: "POST",
                data: {content:content, _token: '{{ csrf_token() }}'},
                success: function(data) {
                    $("#content_dashboard").html(data);
                    window.history.pushState("Details", "Title", link );
                }
            });
        }

    </script>
@endsection
