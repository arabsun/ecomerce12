@include('admin.design.css')
<style>
    body {
        padding: 25px 25px;
        margin-bottom: 25px
    }

    label {
        color: #1f2937;
        font-weight: bold;
        padding: 10px;

    }
</style>
<body>
<div class="container-fluid p-t-15">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="overview-tab-wapper">

                    <div class="tab-content">
                        <div class="tab-pane active">
                            <form action="{{route('admin.setting.update')}}" id="form" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12 pr-0">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4><span class="mdi mdi-settings"></span>
                                                    @lang('Site Information')</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container border">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label>@lang('Company Name') {{$gs->company_name}}
                                                                    *</label>
                                                                <input type="text" class="form-control"
                                                                       name="company_name"
                                                                       value="{{$gs->company_name}}">
                                                            </div>
                                                            <div class="col">
                                                                <label>@lang('Site Name')*</label>
                                                                <input type="text" class="form-control" name="site_name"
                                                                       value="{{$gs->site_name}}"></div>
                                                            <div class="col">
                                                                <label for="theme_color">{{ __('Theme Color') }}</label>
                                                                <div class="input-group cp">
                                                                    <input type="text"
                                                                           class="form-control colorpicker-element"
                                                                           value="{{$gs->color}}" id="theme_color"
                                                                           name="color"
                                                                           placeholder="{{ __('Theme Color') }}">
                                                                    <span class="input-group-append">
                                                           <span
                                                               class="input-group-text colorpicker-input-addon"><i></i>

                                                           </span>
                                                           </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="container border">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <label>@lang('Logo')*</label>
                                                            <img width="200px" class="m-2"
                                                                 src="{{asset('public/frontend/img/'.$gs->logo)}}"
                                                                 alt="">
                                                            <input type="file" class="form-control" name="logo"
                                                                   value="{{$gs->logo}}">
                                                        </div>
                                                        <div class="col-4">
                                                            <label>@lang('Favicon Icon')*</label>
                                                            <img width="80" class="m-2"
                                                                 src="{{asset('public/frontend/img/'.$gs->favicon)}}"
                                                                 alt="">
                                                            <input type="file" class="form-control" name="favicon">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="container border">
                                                        <div class="form-group">
                                                            <label>@lang('Default User Image')*</label>
                                                            <img width="80" class="m-2"
                                                                 src="{{asset('assets/images/'.$gs->user_img)}}" alt="">
                                                            <input type="file" class="form-control" name="user_img">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="container border">
                                                        <div class="col">
                                                            <label>@lang('Defult Group') Current group
                                                                ID* {{$gs->defult_group}} </label>
                                                            <select name="defult_group" class="form-control" id="">
                                                                @foreach ($groups as $group)
                                                                    <option
                                                                        value="{{$group->id}}">{{$group->group_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col">
                                                            <label>@lang('site link') </label>
                                                            <input type="text" class="form-control" name="site_link"
                                                                   value="{{$gs->site_link}}">


                                                        </div>
                                                        <div class="col">
                                                            <label>@lang('site link ssl') </label>
                                                            <input type="text" class="form-control" name="site_ssl_link"
                                                                   value="{{$gs->site_ssl_link}}">


                                                        </div>


                                                    </div>


                                                </div>

                                                <div class="form-group fixed-bottom-buttons">
                                                    <button type="submit"
                                                            class="btn btn-primary btn-lg">@lang('Update')</button>
                                                </div>

                                            </div>
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
</div>
@include('admin.design.js')

