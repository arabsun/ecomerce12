@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
                    @include('admin.tab-link.client-supplier')
                </ul>
                <div class="tab-content">
                    <div class="panel panel-primary">

                        <div class="panel-body" id="messages">
                            @foreach($conv->messages as $key=>$message)
                                @if($message->user_id != 0)
                                    <div class="single-reply-area user">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="reply-area">
                                                    <div class="text-left">
                                                        <p>{{ $message->message }}</p>
                                                        @if ($message->photo != NULL)
                                                            <a href="{{ asset('assets/images/'.$message->photo)}}"
                                                               download="" class=""><i
                                                                    class="fas fa-paperclip"></i> @lang('attachment')
                                                                -{{ $key +=1 }}</a>
                                                        @endif
                                                    </div>
                                                    <div class="text-right">
                                                        <a target="_blank" class="d-block profile-btn mt-1" href=""
                                                           class="d-block">{{ __('View Profile') }}</a>
                                                        <p class="ticket-date">{{ $message->created_at->diffForHumans() }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                @else

                                    <div class="single-reply-area admin">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="reply-area">
                                                    <div class="left">
                                                        <img class="img-circle" width="100"
                                                             src="{{ Auth::guard('admin')->user()->photo ? asset('assets/images/'.Auth::guard('admin')->user()->photo ):asset('assets/images/noimage.png') }}"
                                                             alt="">
                                                        <p class="ticket-date">{{ $message->created_at->diffForHumans() }}</p>
                                                    </div>
                                                    <div class="right">
                                                        <p>{{ $message->message }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                @endif

                            @endforeach
                        </div>
                        <div class="panel-footer">
                            <form id="messageform" action="{{route('admin.message.store')}}"
                                  data-href="{{ route('admin-message-load',$conv->id) }}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="0">
                                    <input type="hidden" name="conversation_id" value="{{$conv->id}}">
                                    <textarea class="form-control" name="message" id="wrong-invoice" rows="5"
                                              required="" placeholder="{{ __('Message') }}"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-rounded">
                                        {{ __('Add Reply') }}
                                    </button>
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
