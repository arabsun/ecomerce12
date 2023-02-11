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

                        <form action="{{route('admin.product.catalog.api.submit',$product->id)}}" id="form"
                              method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>API Connection</label>
                                        <select name="api" class="form-control" id="">
                                            <option value="">--None--</option>
                                            @foreach ($apis as $item)
                                                <option
                                                    value="{{$item->id}}" {{$product->api_connection == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-muted">Select Key group when user place order of this service
                                            if any key available from this group then user will get automatically reply
                                            of key</small>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary">Save</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@include('admin.design.js')
