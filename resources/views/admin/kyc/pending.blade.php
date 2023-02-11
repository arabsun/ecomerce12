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
                                                <th scope="col">Client Username</th>
                                                <th scope="col">Client Email</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if ($clients->count() > 0)
                                                @foreach ($clients as $key => $client)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$client->username}}</td>
                                                        <td>{{$client->email}}</td>
                                                        <td>
                                                            <div class="dropdown show">
                                                                <a class="btn btn-secondary dropdown-toggle" href="#"
                                                                   role="button" id="dropdownMenuLink"
                                                                   data-toggle="dropdown" aria-haspopup="true"
                                                                   aria-expanded="false">
                                                                    Pending
                                                                </a>
                                                                <div class="dropdown-menu"
                                                                     aria-labelledby="dropdownMenuLink">
                                                                    <a class="dropdown-item status_verify"
                                                                       href="{{ route('admin.user.kyc',['id' => $client->id, 'status' => 2]) }}">Approve</a>
                                                                    <a class="dropdown-item status_verify"
                                                                       href="{{ route('admin.user.kyc',['id' => $client->id, 'status' => 0]) }}">Reject</a>

                                                                </div>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <a href="{{route('admin.kyc.details',$client->id)}}"
                                                               class="btn btn-primary btn-sm link-page"> <i
                                                                        class="fas fa-eye"></i> @lang('Details')</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="text-center">
                                                    <td colspan="5">Data Not Found</td>
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
