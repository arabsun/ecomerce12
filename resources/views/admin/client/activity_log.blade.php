@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="overview-tab-wapper">
                    @include('admin.tab-link.client_link',['id'=>$client->id])
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
                                                    <th scope="col">@lang('Login From')</th>
                                                    <th scope="col">@lang('Login Time')</th>
                                                    <th scope="col">@lang('IP')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if (count($logs) > 0)
                                                    @foreach ($logs as $key => $log)
                                                        <tr>
                                                            <td>{{$log->client_form}}</td>
                                                            <td>{{$log->created_at}}</td>
                                                            <td>{{$log->ip}}</td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr class="fixed-bottom-buttons">
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

</div>

@include('admin.design.js')
