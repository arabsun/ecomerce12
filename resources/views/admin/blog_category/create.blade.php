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

                        <form action="{{route('admin.blog.category.store')}}" id="form" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('Name')</label>
                                        <input type="text" class="form-control" placeholder="@lang('Category Name')"
                                               name="name" value="">
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
