@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
                    @include('admin.tab-link.blog_link')
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">

                        <form action="{{route('admin.blog.store')}}" id="form" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Blog Title')</label>
                                        <input type="text" class="form-control" placeholder="@lang('Blog Title')"
                                               name="title" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Photo')</label>
                                        <input type="file" class="form-control" name="photo" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Category')</label>
                                        <select name="category_id" class="form-control" id="">
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Details')</label>
                                        <textarea name="details" class="form-control" style="height:120px"
                                                  id=""></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Date')</label>
                                        <input type="date" class="form-control" name="date" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary btn-lg">@lang('Submit')</button>
                                    </div>
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
