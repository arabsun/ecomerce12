@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="tab-content">
                    <div class="tab-pane active">

                        <form action="{{route('admin.gateway.update',$data->id)}}" id="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf


                            <div class="card-body">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Name')</label>
                                        <input type="text" class="form-control" placeholder="" name="name"
                                               value="{{$data->name}}">
                                    </div>
                                </div>

                                @if($data->information != null)
                                    @foreach($data->convertAutoData() as $pkey => $pdata)

                                        @if($pkey == 'sandbox_check')

                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>{{ __( $data->name.' '.ucwords(str_replace('_',' ',$pkey)) ) }}
                                                        *</label>
                                                    <input type="checkbox" class="form-control" placeholder=""
                                                           name="pkey[{{ __($pkey) }}]"
                                                           {{ $pdata == 1 ? "checked":"" }} value="1">
                                                </div>
                                            </div>

                                        @else

                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label>{{ __( $data->name.' '.ucwords(str_replace('_',' ',$pkey)) ) }}
                                                        *</label>
                                                    <input type="text" class="form-control" placeholder=""
                                                           name="pkey[{{ __($pkey) }}]" value="{{ $pdata }}">
                                                </div>
                                            </div>

                                        @endif

                                    @endforeach
                                @endif

                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary btn-lg">@lang('Submit')</button>
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
