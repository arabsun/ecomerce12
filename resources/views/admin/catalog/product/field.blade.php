@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
                    @include('admin.tab-link.product',['id' => $product->id])
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">

                        <form action="{{route('admin.product.catalog.field.submit',$product->id)}}" id="form"
                              method="POST">
                            @csrf

                            <div class="load_field">


                                @foreach ($fields as $field)
                                    <div class=" row text-center mb-2 ">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Field Type</label>
                                                <select name="type[]" class="form-control" required id="">
                                                    <option value="text" {{$field->type == 'text' ? 'selected' : ''}}>
                                                        Text
                                                    </option>
                                                    <option
                                                        value="dropdown" {{$field->type == 'dropdown' ? 'selected' : ''}}>
                                                        DropDown
                                                    </option>
                                                    <option value="radio" {{$field->type == 'radio' ? 'selected' : ''}}>
                                                        Radio
                                                    </option>
                                                    <option
                                                        value="textarea" {{$field->type == 'textarea' ? 'selected' : ''}}>
                                                        Textarea
                                                    </option>
                                                    <option
                                                        value="checkbox" {{$field->type == 'checkbox' ? 'selected' : ''}}>
                                                        CheckBox
                                                    </option>
                                                    <option value="date" {{$field->type == 'date' ? 'selected' : ''}}>
                                                        DatePicker
                                                    </option>
                                                    <option value="time" {{$field->type == 'time' ? 'selected' : ''}}>
                                                        TimePicker
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name[]" value="{{$field->name}}" required
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" name="description[]" value="{{$field->description}}"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Field Options</label>
                                                <input type="text" name="field_options[]"
                                                       value="{{$field->field_options}}" class="form-control">
                                                <small class="text-muted">More then one values separated by
                                                    commas</small>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Required</label>
                                                <select name="required[]" class="form-control" required id="">
                                                    <option value="1" {{$field->required == 1 ? 'selected' : ''}}>True
                                                    </option>
                                                    <option value="0" {{$field->required == 0 ? 'selected' : ''}}>
                                                        False
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label>Action</label>
                                                <p>
                                                    <button
                                                        class="badge badge-danger removeField text-white btn btn-sm">
                                                        X
                                                    </button>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>

                            <button id="add_field" type="button" class="btn btn-danger">Add More</button>
                            <div class="form-group fixed-bottom-buttons">
                                <button type="submit" class="btn btn-primary btn-lg">@lang('Save')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@include('admin.design.js')
<script>


    let field = `
   <div class=" row text-center mb-2 ">
   <div class="col-md-2">
    <div class="form-group">
                            <label>Field Type</label>
                            <select name="type[]" class="form-control" required id="">
                                <option value="text">Text</option>
                                <option value="dropdown">DropDown</option>
                                <option value="radio">Radio</option>
                                <option value="textarea">Textarea</option>
                                <option value="checkbox">CheckBox</option>
                                <option value="date">DatePicker</option>
                                <option value="time">TimePicker</option>
                            </select>
                            </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name[]" value="" required class="form-control">
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description[]"  value="" class="form-control">
                                  </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Field Options</label>
                                    <input type="text" name="field_options[]" value="" class="form-control">
                                    <small class="text-muted">More then one values separated by commas</small>
                                  </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Required</label>
                                    <select name="required[]" class="form-control" required id="">
                                    <option value="1">True</option>
                                    <option value="0">False</option>
                            </select>
                                  </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Action</label>
                                    <p>
                                        <button class="badge badge-danger removeField text-white btn btn-sm">X</button>
                                    </p>
                                  </div>
                            </div>
                            <div>
                            </div>
                            `;


    $(document).on('click', '#add_field', function () {
        $('.load_field').append(field);
    })

    $(document).on('click', '.removeField', function () {
        let removeItem = $(this).parent().parent().parent().parent();
        removeItem.remove();
    })

</script>
