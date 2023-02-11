@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">

                <div class="tab-content">
                    <div class="tab-pane active">

                        <div class="form-group">
                            <label>@lang('Select KYC Type')</label>
                            <select class="form-control kyc_type" name="kyc_type" required>
                                <option value="1" {{$gs->kyc_type == 1 ? 'selected':''}}>@lang('Auto')</option>
                                <option value="2" {{$gs->kyc_type == 2 ? 'selected':''}}>@lang('Manual')</option>
                            </select>
                        </div>

                        <hr>

                        <form action="{{route('admin.kyc.add')}}" method="POST">
                            @csrf
                            <code>@lang('Below form will only works if the KYC type is selected as Manual')</code>
                            <hr>
                            <div class="form-group">
                                <label>@lang('Select Input Type')</label>
                                <select class="form-control type" name="type" required>
                                    <option value="1">@lang('Input')</option>
                                    <option value="2">@lang('Image')</option>
                                    <option value="3">@lang('Textarea')</option>
                                </select>
                            </div>

                            <div class="append">
                                <div class="form-group">
                                    <label>@lang('label')</label>
                                    <input class="form-control" type="text" name="label" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>@lang('Required')</label>
                                <select class="form-control" name="required" required>
                                    <option value="1">@lang('Yes')</option>
                                    <option value="0">@lang('No')</option>
                                </select>
                            </div>
                            <div class="form-group mt-2 text-right">
                                <button type="submit" class="btn btn-primary">@lang('Add Field')</button>
                            </div>
                        </form>
                        <hr>
                        @forelse ($userForms as $field)
                            @if ($field->type == 1 || $field->type == 3 )
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="font-weight-bold">@lang($field->label) <small
                                                        class="text--danger">({{$field->required == 1 ? 'Required':'Optional'}}
                                                    )</small> </label>
                                            @if($field->type == 1)
                                                <input class="form-control" type="text"
                                                       placeholder="{{strtolower($field->label)}}">
                                            @else
                                                <textarea class="form-control"></textarea>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label for="" class="d-block">&nbsp;</label>
                                            <a href="javascript:void(0)" class="btn btn-primary edit"
                                               data-info="{{$field}}"><i class="fas fa-edit"></i></a>
                                            <a href="javascript:void(0)" data-id="{{$field->id}}"
                                               class="btn  btn-danger delete"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>

                            @elseif($field->type == 2)
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            @if ($field->type == 2 )
                                                <label class="font-weight-bold">@lang($field->label)</label>
                                                <input class="form-control" type="file" class="form-control">
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group">
                                            <label class="d-block">&nbsp;</label>
                                            <a href="javascript:void(0)" class="btn btn-primary edit"
                                               data-info="{{$field}}"><i class="fas fa-edit"></i></a>
                                            <a href="javascript:void(0)" data-id="{{$field->id}}"
                                               class="btn  btn-danger delete"><i class="fas fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="form-group text-center">
                                <h6 class="my-3">@lang('No fields available')</h6>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title"><h6>@lang('Update Field')</h6></div>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.kyc.form.update')}}" method="POST">
                @csrf
                <input type="hidden" name="id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>@lang('Select Input Type')</label>
                        <select class="form-control type" name="type" required>
                            <option value="1">@lang('Input')</option>
                            <option value="2">@lang('Image')</option>
                            <option value="3">@lang('Textarea')</option>
                        </select>
                    </div>
                    <div class="append">
                        <div class="form-group">
                            <label>@lang('label')</label>
                            <input class="form-control" type="text" name="label" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>@lang('Required')</label>
                        <select class="form-control" name="required" required>
                            <option value="1">@lang('Yes')</option>
                            <option value="0">@lang('No')</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn-primary">@lang('Update')</button>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close ml-auto m-3" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <form action="{{route('admin.kyc.form.delete')}}" method="POST">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-body text-center">

                    <i class="las la-exclamation-circle text-danger display-2 mb-15"></i>
                    <h4 class="text--secondary mb-15">@lang('Are you sure want to delete this?')</h4>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn-danger">@lang('Delete')</button>
                </div>

            </form>
        </div>
    </div>
</div>

@include('admin.design.js')
