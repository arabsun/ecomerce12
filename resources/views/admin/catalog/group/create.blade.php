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
                        <form action="{{route('admin.product.group.store')}}" id="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>@lang('Group Name')</label>
                                <input type="text" name="name" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>@lang('Listed in Group')    </label>
                                <select name="parent_id" class="form-control" id="">
                                    <option value="" selected>@lang('Select One')</option>
                                    @foreach (DB::table('product_groups')->where('type','cat')->get() as $group)
                                        @if ($group->parent_id)
                                            @foreach (DB::table('product_groups')->where('parent_id',$group->id)->get() as $sub)
                                                <option cla value="{{$sub->id}}">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;{{$sub->name}}</option>
                                            @endforeach
                                        @else
                                            <option cla value="{{$group->id}}">{{$group->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>@lang('Group Photo')</label>
                                <input type="file" name="photo" value="" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>@lang('Status')</label>
                                <select name="status" class="form-control" id="">
                                    <option value="1">@lang('Active')</option>
                                    <option value="0">@lang('Inactive')</option>
                                </select>
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
