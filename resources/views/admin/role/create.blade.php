@include('admin.design.css')
<body>

<div class="container-fluid p-t-15">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header justify-content-between">

                    <div class="form-group">
                        <input class="form-control search" type="text" placeholder="@lang('Search Permission Name')">
                    </div>
                    <label class="cswitch mb-2 d-flex justify-content-between align-items-center border p-2 rounded">
                        <span class="cswitch--label font-weight-bold ml-4">@lang('Check All')</span>
                        <input class="cswitch--input check-all" type="checkbox"/>
                        <span class="cswitch--trigger wrapper"></span>
                    </label>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>@lang('Role Name')</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>


                        <div class="row custom-data">
                            <div class="col-md-12 mb-3">
                                <h6>@lang('Assign Permissions')</h6>
                                <hr>
                            </div>
                            @foreach ($permissions as $item)
                                <div class="col-md-4 col-lg-3 elements">
                                    <div class="card">
                                        <div class="card-body">
                                            <label class="cswitch mb-0 d-flex justify-content-between align-items-center">
                                                <input class="cswitch--input permission" name="permissions[]"
                                                       value="{{$item->id}}" type="checkbox"/>
                                                <span class="cswitch--trigger wrapper"></span>
                                                <span class="cswitch--label font-weight-bold ">@lang(ucwords($item->name))</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary btn-lg">@lang('Submit')</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@include('admin.design.js')
