@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs page-tabs pt-2 pl-3 pr-3">
                    @include('admin.tab-link.role')
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table class="table ">
                                            <thead>
                                            <tr>
                                                <th>{{__('Serial')}}</th>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Subject')}}</th>
                                                <th>{{__('Date')}}</th>
                                                <th>{{__('Options')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if ($datas->count() > 0)
                                                @foreach ($datas as $key => $data)
                                                    <tr>
                                                        <td scope="row">{{$key+1}}</td>
                                                        <td>
                                                            {{$data->user->username}}
                                                        </td>
                                                        <td>
                                                            {{$data->subject}}
                                                        </td>
                                                        <td>{{$data->created_at->diffForHumans()}}</td>

                                                        <td>
                                                            <a href="{{route('admin.message.show',$data->id)}}"
                                                               class="btn btn-primary btn-sm link-page"> <i
                                                                    class="fas fa-eye"></i> @lang('Details')</a>
                                                            <a href="" class="btn btn-danger btn-sm link-page delete">
                                                                <i class="fas fa-trash-alt"></i> @lang('Delete')</a>
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
