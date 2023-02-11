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
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        @endif
                        <form action="{{route('admin.product.catalog.pricing.submit',$product->id)}}" id="form"
                              method="POST">
                            @csrf

                            <div class="load_pricing">
                                @if ($product->pricings->count() > 0)
                                    @foreach ($product->pricings as $pricing)

                                        <div class=" row justify-content-center mb-2 ">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="title[]" value="{{$pricing->title}}"
                                                           required class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Price (USD)</label>
                                                    <input type="number" name="price[]" value="{{$pricing->price}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>API Connection</label>
                                                    <select name="api_id[]" class="form-control" id="" required>
                                                        @foreach ($apis as $item)
                                                            <option
                                                                value="{{$item->id}}" {{$pricing->api_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
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
                                @endif
                            </div>


                            <div class="text-center">
                                <button id="add_price" type="button" class="btn btn-danger">Add More</button>
                                <div class="form-group fixed-bottom-buttons">
                                    <button type="submit" class="btn btn-primary btn-lg">@lang('Save')</button>
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
<script>


    let field = `<div class=" row justify-content-center mb-2 ">
                                <div class="col-md-4">
                                   <div class="form-group">
                                      <label>Title</label>
                                      <input type="text" name="title[]" value="" required class="form-control">
                                   </div>
                                </div>
                                <div class="col-md-3">
                                   <div class="form-group">
                                      <label>Price (USD)</label>
                                      <input type="number" name="price[]"  value="" class="form-control">
                                   </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label>API Connection</label>
                                            <select name="api_id[]" class="form-control" id="">
                                                <option value="">--None--</option>
                                              @foreach ($apis as $item)
    <option value="{{$item->id}}" {{$product->api_connection == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                              @endforeach
    </select>
 </div>
</div>


<div class="col-md-2">
<div class="form-group">
<label>Action</label>
<p>
  <button class="badge badge-danger removeField text-white btn btn-sm">X</button>
</p>
</div>
</div>
</div>`;


    $(document).on('click', '#add_price', function () {
        $('.load_pricing').append(field);
    })

    $(document).on('click', '.removeField', function () {
        let removeItem = $(this).parent().parent().parent().parent();
        removeItem.remove();
    })

</script>
