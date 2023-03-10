@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="overview-tab-wapper">
                    @include('admin.tab-link.setting_link')
                    <div class="tab-content">
                        <div class="tab-pane active">

                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12 pr-0">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>@lang('Site Information')</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card mb-4">
                                                        <div
                                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                            <h6 class="m-0 font-weight-bold text-primary">{{ __('Add Custom Menu') }}</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="alert alert-danger show__url__validation"
                                                                 style="display: none" role="alert">
                                                                <button type="button" class="close hide-close"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <p class="m-0">{{__('Url Not Valid')}}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="title">{{ __('Title') }} *</label>
                                                                <input type="text" class="form-control" id="title"
                                                                       placeholder="{{ __('Enter Title') }}" value=""
                                                                       required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="url">{{ __('Url') }} *</label>
                                                                <input type="text" class="form-control" id="url"
                                                                       placeholder="{{ __('Enter Url') }}" value=""
                                                                       required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="target">{{ __('Target') }} *</label>
                                                                <select class="form-control" id="target">
                                                                    <option value="self">Self</option>
                                                                    <option value="blank">New Tab</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" id="custom-submit"
                                                                        class="btn btn-primary btn-block">{{ __('Submit') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card mb-4">
                                                        <div
                                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                            <h6 class="m-0 font-weight-bold text-primary">{{ __('Website Menus') }}</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <form action="{{route('admin.menu.update')}}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="menu" value="menu">
                                                                <div id="section-list">
                                                                    @if(!empty($gs->menu))
                                                                        @foreach(json_decode($gs->menu,true) as $key => $menu)
                                                                            <div class="card mt-2  draggable-item">
                                                                                <div class="card-body">
                                                                                    <div class="media">
                                                                                        <div class="media-body">
                                                                                            <h5 class="mb-1 mt-0">{{ $menu['title'] }}</h5>
                                                                                            <input type="hidden"
                                                                                                   name="{{ $key }}[title]"
                                                                                                   value="{{ $menu['title'] }}">
                                                                                            <input type="hidden"
                                                                                                   name="{{ $key }}[dropdown]"
                                                                                                   value="{{ $menu['dropdown'] }}">
                                                                                            <input type="hidden"
                                                                                                   name="{{ $key }}[href]"
                                                                                                   value="{{ $menu['href'] }}">
                                                                                            <input type="hidden"
                                                                                                   name="{{ $key }}[target]"
                                                                                                   value="{{ $menu['target'] }}">
                                                                                        </div>
                                                                                        <i class="remove-menu fa fa-trash-alt"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                                <div class="form-group my-2">
                                                                    <button type="submit"
                                                                            class="btn btn-primary btn-block">{{ __('Submit') }}</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.design.js')

