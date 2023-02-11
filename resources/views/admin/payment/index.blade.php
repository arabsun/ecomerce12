@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">

                <div class="tab-content">
                    <div class="tab-pane active">

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table class="table ">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Checkout</th>
                                                <th scope="col">Service</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if ($datas->count() > 0)
                                                @foreach ($datas as $key => $item)
                                                    <tr>
                                                        <th scope="row">{{$key+1}}</th>

                                                        <td>{{$item->name}}</td>
                                                        <td>
                                                            <div class="dropdown show">
                                                                <a class="btn btn-secondary dropdown-toggle" href="#"
                                                                   role="button" id="dropdownMenuLink"
                                                                   data-toggle="dropdown" aria-haspopup="true"
                                                                   aria-expanded="false">
                                                                    {{$item->checkout == 1 ? 'Yes' : 'No'}}
                                                                </a>
                                                                <div class="dropdown-menu"
                                                                     aria-labelledby="dropdownMenuLink">
                                                                    <a class="dropdown-item status_verify"
                                                                       href="{{route('admin.gateway.status',[$item->id,1,'checkout'])}}">Yes</a>
                                                                    <a class="dropdown-item status_verify"
                                                                       href="{{route('admin.gateway.status',[$item->id,0,'checkout'])}}">No</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="dropdown show">
                                                                <a class="btn btn-secondary dropdown-toggle" href="#"
                                                                   role="button" id="dropdownMenuLink"
                                                                   data-toggle="dropdown" aria-haspopup="true"
                                                                   aria-expanded="false">
                                                                    {{$item->service == 1 ? 'Yes' : 'No'}}
                                                                </a>
                                                                <div class="dropdown-menu"
                                                                     aria-labelledby="dropdownMenuLink">
                                                                    <a class="dropdown-item status_verify"
                                                                       href="{{route('admin.gateway.status',[$item->id,1,'service'])}}">Yes</a>
                                                                    <a class="dropdown-item status_verify"
                                                                       href="{{route('admin.gateway.status',[$item->id,0,'service'])}}">No</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('admin.gateway.edit',$item->id)}}"
                                                               class="btn btn-primary btn-sm link-page"> <i
                                                                        class="fas fa-edit"></i> @lang('Edit')</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="text-center">
                                                    <td colspan="4"><strong>@lang('No Data Found')</strong></td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@include('admin.design.js')
