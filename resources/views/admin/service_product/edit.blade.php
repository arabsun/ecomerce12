@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
                    @include('admin.tab-link.edit_service',['id'=>$product->id])
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">

                        <form action="{{route('admin.service.product.update',$product->id)}}" id="form" method="POST"
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

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" id="">
                                    <option value="1" {{$product->status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$product->status == 0 ? 'selected' : ''}}>Inactive</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" value="{{$product->price}}" class="form-control">
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

@include('admin.design.js')
