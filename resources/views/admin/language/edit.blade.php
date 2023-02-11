@include('admin.design.css')
<body>

<div class="container-fluid p-t-15">
    <div class="row justify-content-center mt-3">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Language Form') }}</h6>
                </div>
                <div class="card-body">
                    <form action="{{route('language.update',$language->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="inp-name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="inp-name" name="name"
                                       value="{{$language->language}}" placeholder="{{ __('Enter Name') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inp-name">{{ __('Code') }}</label>
                                <input type="text" class="form-control" id="inp-name" value="{{$language->code}}"
                                       placeholder="{{ __('Enter Code') }}" disabled>
                            </div>
                        </div>

                        <div class="mt-3 text-right">
                            <button type="submit" id="submit-btn"
                                    class="btn btn-primary btn-lg">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <div class="form-group mb-0">
                        <input class="form-control search mb-1" type="text" placeholder="@lang('Search')">
                    </div>

                    <a href="javascript:void(0)" data-toggle="modal" data-target="#translate"
                       class="btn btn-primary add"> <i class="fas fa-plus"></i> @lang('Add New')
                    </a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-primary mb-2">
                            <tr>
                                <th class="text-white">@lang('Sl')</th>
                                <th class="text-white">@lang('Key')</th>
                                <th class="text-white">@lang('Value')</th>
                                <th class="text-right text-white">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody class="custom-data">
                            @php
                                $i = 0;
                            @endphp
                            @forelse ($lang as $key => $value)
                                <tr class="elements">
                                    <td data-label="@lang('Sl')">
                                        {{++$i}}
                                    </td>
                                    <td data-label="@lang('Key')" data-toggle="tooltip" title="{{$key}}">
                                        {{Str::limit($key,60)}}
                                    </td>
                                    <td data-label="@lang('Value')" data-toggle="tooltip"
                                        title="{{$value}}">{{Str::limit($value,40)}}</td>
                                    <td data-label="@lang('Action')" class="text-right">
                                        <a class="btn btn-primary edit mt-2" data-key="{{$key}}" data-value="{{$value}}"
                                           data-route="{{route('translate.update',$language->id)}}"
                                           href="javascript:void(0)"><i class="fas fa-edit"></i></a>

                                        <a class="btn btn-danger remove mt-2" data-key="{{$key}}"
                                           data-value="{{$value}}"
                                           data-route="{{route('translate.remove',$language->id)}}"
                                           href="javascript:void(0)"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty

                                <tr>
                                    <td class="text-center" colspan="100%">@lang('No Data Found')</td>
                                </tr>

                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="translate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('translate.store',$language->id)}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Add New Translation')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>@lang('Key')</label>
                        <input class="form-control" type="text" name="key" required value="{{old('key')}}">
                    </div>
                    <div class="form-group">
                        <label>@lang('Value')</label>
                        <textarea class="form-control" name="value" required>{{old('value')}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn-primary">@lang('Save')</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="remove" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('translate.remove')}}" method="post">
            @csrf
            <input type="hidden" name="language" value="{{$language->id}}">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="mt-3">@lang('Are you sure to remove?')</h5>
                    <input type="hidden" name="key" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn-danger">@lang('Confirm')</button>
                </div>
            </div>
        </form>
    </div>
</div>
@include('admin.design.js')
