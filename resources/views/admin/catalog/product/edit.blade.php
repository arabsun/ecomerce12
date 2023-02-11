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

                        <form action="{{route('admin.product.catalog.update',$product->id)}}" id="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="name" value="{{$product->name}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Image Type</label>
                                <select name="img_type" class="form-control img_type" id="">
                                    <option value="1" {{$product->img_type == 1 ? 'selected':""}}>@lang('File')</option>
                                    <option
                                        value="2" {{$product->img_type == 2 ? 'selected':""}}>@lang('CDN link')</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Product Thumbnail</label>
                                <div class="img_in">
                                    @if ($product->img_type == 1)
                                        <input type="file" name="thumbnail" value="" class="form-control">
                                    @else
                                        <input type="text" name="thumbnail" value="{{$product->photo}}"
                                               class="form-control">
                                    @endif
                                </div>
                                @if ($product->img_type == 1)
                                    <img width="100" class="mt-2" src="{{asset('assets/images/'.$product->photo)}}"
                                         alt="">

                                @endif
                            </div>

                            <div class="form-group">
                                <label>Product Gallery</label>
                                <input type="file" name="gallery[]" value="" class="form-control" multiple>
                            </div>

                            @foreach ($product->galleries as $gallery)
                                <img width="100" src="{{asset('assets/images/'.$gallery->photo)}}" alt="">
                            @endforeach

                            <div class="form-group mt-3">
                                <label>Product Description</label>
                                <textarea name="details" class="form-control"
                                          style="height: 120">{{$product->details}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Listed in Group </label>
                                <select name="group_id" class="form-control" id="">
                                    <option value="" selected>Select One</option>
                                    @foreach (DB::table('product_groups')->get() as $group)
                                        <option
                                            value="{{$group->id}}" {{$product->group_id == $group->id ? 'selected' : ''}}>{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control" id="">
                                            <option value="1" {{$product->status == 1 ? 'selected' : ''}}>Active
                                            </option>
                                            <option value="0" {{$product->status == 0 ? 'selected' : ''}}>Inactive
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>POS</label>
                                        <select name="pos" class="form-control" id="">
                                            <option value="1" {{$product->pos == 1 ? 'selected' : ''}}>Enable</option>
                                            <option value="0" {{$product->pos == 1 ? 'selected' : ''}}>Disable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6 {{$product->delivery_time_type != 'instant' ? '' :'d-none'}}"
                                     id="delivery_time">
                                    <div class="form-group">
                                        <label>Delivery Time</label>
                                        <input type="text" name="delivery_time" id="" class="form-control"
                                               value="{{$product->delivery_time}}">
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Select</label>
                                        <select name="delivery_time_type" class="form-control" id="delivery_time_type">
                                            <option
                                                value="minite" {{$product->delivery_time_type == 'minite' ? 'selected' : ''}} >
                                                Minite
                                            </option>
                                            <option
                                                value="hour" {{$product->delivery_time_type == 'hour' ? 'selected' : ''}}>
                                                Hour
                                            </option>
                                            <option
                                                value="day" {{$product->delivery_time_type == 'day' ? 'selected' : ''}}>
                                                Day
                                            </option>
                                            <option
                                                value="month" {{$product->delivery_time_type == 'month' ? 'selected' : ''}}>
                                                Month
                                            </option>
                                            <option
                                                value="instant" {{$product->delivery_time_type == 'instant' ? 'selected' : ''}}>
                                                Instant
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label>Price</label>
                                    <input type="number" name="price" value="{{$product->price}}" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="d-block">&nbsp;</label>
                                    <button class="btn btn-primary" type="button" data-toggle="modal"
                                            data-target="#g_price">@lang('Group Price')</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>SKU</label>
                                <input type="text" name="sku" value="{{$product->sku}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Affiliate Commission (%)</label>
                                <input type="number" name="affiliate_commission"
                                       value="{{$product->affiliate_commission}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Tax Applicable</label>
                                <select name="is_tax" class="form-control" id="">
                                    <option value="1" {{$product->is_tax == 1 ? 'selected' : ''}}>Enable</option>
                                    <option value="0" {{$product->is_tax == 0 ? 'selected' : ''}}>Disable</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Availability On</label>
                                <input type="date" name="end_date" value="{{$product->end_date}}" class="form-control">
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Minimum Quantity </label>
                                        <input type="number" name="min_qty" value="{{$product->min_qty}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Maximum Quantity </label>
                                        <input type="number" name="max_qty" value="{{$product->max_qty}}"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="custom-switch pl-0">
                                    <input type="checkbox" name="is_virtual"
                                           {{$product->is_virtual == 1 ? 'checked' : ''}} class="custom-switch-input"
                                           value="1">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="ml-2">@lang('Virtual product, No shipping')</span>
                                </label>
                            </div>


                            <h5> @lang('Extra Settings')</h5>
                            <hr>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Special Deal</label>
                                        <select name="special_deal" class="form-control" id="">
                                            <option value="1" {{$product->special_deal == 1 ? 'selected' : ''}}>Enable
                                            </option>
                                            <option value="0" {{$product->special_deal == 0 ? 'selected' : ''}}>
                                                Disable
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Show on Top Up Section</label>
                                        <select name="top_up" class="form-control" id="">
                                            <option value="1" {{$product->top_up == 1 ? 'selected' : ''}}>Enable
                                            </option>
                                            <option value="0" {{$product->top_up == 0 ? 'selected' : ''}}>Disable
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Best Selling</label>
                                        <select name="best_sell" class="form-control" id="">
                                            <option value="1" {{$product->best_sell == 1 ? 'selected' : ''}}>Enable
                                            </option>
                                            <option value="0" {{$product->best_sell == 0 ? 'selected' : ''}}>Disable
                                            </option>
                                        </select>
                                    </div>
                                </div>

                            </div>

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

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="g_price" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('admin.group.pricing.submit',$product->id)}}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Group Pricing')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach ($clientsGroup as $group)
                        <div class="form-group row m-2">
                            <label class="col-md-4 mt-1">{{$group->group_name}} : </label>
                            <input class="form-control col-md-8" type="text" value="{{$group->price($product->id)}}"
                                   name="price[{{$group->id}}]">
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn-primary">@lang('Save')</button>
                </div>
            </div>
        </form>
    </div>
</div>

@include('admin.design.js')
