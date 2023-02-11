@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
                    @include('admin.tab-link.service_product')
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">

                        <form action="{{route('admin.service.product.store')}}" id="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="name" value="" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Image Type</label>
                                <select name="img_type" class="form-control img_type" id="">
                                    <option value="1">@lang('File')</option>
                                    <option value="2">@lang('CDN link')</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product Thumbnail</label>
                                <div class="img_in">
                                    <input type="file" name="thumbnail" value="" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Product Gallery</label>
                                <input type="file" name="gallery[]" value="" class="form-control" multiple>
                            </div>

                            <div class="form-group mt-3">
                                <label>Product Description</label>
                                <textarea name="details" class="form-control" style="height: 120"></textarea>
                            </div>


                            <div class="form-group">
                                <label>Listed in Group </label>
                                <select name="group_id" class="form-control" id="">
                                    <option value="" selected>Select One</option>
                                    @foreach (DB::table('product_groups')->get() as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" id="">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" value="" class="form-control">
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
