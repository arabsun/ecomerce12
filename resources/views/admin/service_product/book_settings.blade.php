@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
                    @include('admin.tab-link.service_product')
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">

                        <form action="{{route('admin.book.service.setting.update')}}" id="form" method="POST">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="book_status">@lang('Booking Service')</label>
                                    <select name="book_status" id="book_status" class="form-control">
                                        <option value="1" {{$gs->book_status == 1 ? 'selected' : ''}} >Active</option>
                                        <option value="0"{{$gs->book_status == 0 ? 'selected' : ''}} >Deactive</option>
                                    </select>
                                </div>

                                <hr>
                                <div class="form-group">
                                    <strong>Service Offdays</strong>
                                </div>


                                @php
                                    if($gs->holidays && $gs->holidays != 'null'){

                                        $offdays = json_decode($gs->holidays,true);
                                    }else{
                                        $offdays = [];
                                    }

                                @endphp

                                <div class="form-group">
                                    <label class="custom-switch pl-0">
                                        <input type="checkbox" name="holidays[]" class="custom-switch-input"
                                               {{in_array('1',$offdays) ? 'checked' : ''}} value="1">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="ml-2">@lang('Monday')</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="custom-switch pl-0">
                                        <input type="checkbox" name="holidays[]" class="custom-switch-input"
                                               {{in_array('4',$offdays) ? 'checked' : ''}} value="4">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="ml-2">@lang('Tuesday')</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="custom-switch pl-0">
                                        <input type="checkbox" name="holidays[]" class="custom-switch-input"
                                               {{in_array('3',$offdays) ? 'checked' : ''}} value="3">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="ml-2">@lang('Wednesday')</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="custom-switch pl-0">
                                        <input type="checkbox" name="holidays[]" class="custom-switch-input"
                                               {{in_array('2',$offdays) ? 'checked' : ''}} value="2">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="ml-2">@lang('Thursday')</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="custom-switch pl-0">
                                        <input type="checkbox" name="holidays[]" class="custom-switch-input"
                                               {{in_array('5',$offdays) ? 'checked' : ''}} value="5">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="ml-2">@lang('Friday')</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="custom-switch pl-0">
                                        <input type="checkbox" name="holidays[]" class="custom-switch-input"
                                               {{in_array('6',$offdays) ? 'checked' : ''}} value="6">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="ml-2">@lang('Saturday')</span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="custom-switch pl-0">
                                        <input type="checkbox" name="holidays[]" class="custom-switch-input"
                                               {{in_array('0',$offdays) ? 'checked' : ''}} value="0">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="ml-2">@lang('Sunday')</span>
                                    </label>
                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">@lang('Updae')</button>
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
