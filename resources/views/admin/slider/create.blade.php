@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
                    @include('admin.tab-link.slider')
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">

                        <form action="{{route('admin.slider.store')}}" id="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Sub Title')</label>
                                        <input type="text" class="form-control" placeholder="@lang('Sub Title')"
                                               name="subtitle_text" value="">
                                    </div>
                                </div>


                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Title')</label>
                                        <input type="text" class="form-control" name="title_text" value="" min="1">
                                    </div>
                                </div>


                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Description')</label>
                                        <textarea name="details_text" class="form-control" style="height:120px"
                                                  id=""></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Current Featured Image') </label>
                                        <input type="file" class="form-control" name="photo" value="" min="1">
                                    </div>
                                </div>


                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('Link') }}</label>
                                        <input type="text" class="form-control" name="link" value="">
                                    </div>
                                </div>


                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Text Position')</label>
                                        <select name="position" class="form-control" id="">
                                            <option value="">{{ __('Select Position') }}</option>
                                            <option value="slide-one">{{ __('Left') }}</option>
                                            <option value="slide-two">{{ __('Center') }}</option>
                                            <option value="slide-three">{{ __('Right') }}</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Color')</label>
                                        <select name="color" class="form-control" id="">
                                            <option value="primary">{{ __('Black & Primary') }}</option>
                                            <option value="white">{{ __('White') }}</option>
                                        </select>
                                    </div>
                                </div>


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
