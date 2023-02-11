@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
                    @include('admin.tab-link.catalog_cart')
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">

                        <form action="{{route('admin.product.group.update',$group->id)}}" id="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>@lang('Group Name')</label>
                                <input type="text" name="name" value="{{$group->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>@lang('Listed in Group')    </label>
                                <select name="parent_id" class="form-control" id="">
                                    <option value="" selected>@lang('Select One')</option>
                                    @foreach (DB::table('product_groups')->get() as $groupp)
                                        <option
                                            value="{{$groupp->id}}" {{$groupp->id == $group->parent_id ? 'selected' : ''}} >{{$groupp->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>@lang('Status')</label>
                                <select name="status" class="form-control" id="">
                                    <option
                                        value="1" {{$group->status == 1 ? 'selected ' : ''}}>@lang('Active')</option>
                                    <option
                                        value="0" {{$group->status == 0 ? 'selected ' : ''}}>@lang('Inactive')</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>@lang('Group Photo')</label>
                                <input type="file" name="photo" value="" class="form-control">
                            </div>
                            <img width="100" class="mb-2" src="{{asset('assets/images/'.$group->photo)}}" alt="">

                            <div class="form-group">
                                <label>@lang('SEO Page Title')</label>
                                <input type="text" name="meta_title" value="{{$group->meta_title}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label>@lang('SEO Description')</label>
                                <textarea name="meta_description" class="form-control"
                                          style="height: 108px;">{{$group->meta_descripiton}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>@lang('Description')</label>
                                <textarea name="description" class="form-control"
                                          style="height: 108px;">{{$group->description}}</textarea>
                            </div>

                            <button class="btn btn-primary">@lang('Create')</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@include('admin.design.js')
