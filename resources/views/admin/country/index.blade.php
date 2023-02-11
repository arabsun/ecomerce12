@include('admin.design.css')
<body>
<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body text-center">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>@lang('Sl')</th>
                                <th>@lang('Flag')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Country Code')</th>
                                <th>@lang('Dial Code')</th>
                                <th>@lang('Status')</th>
                                <th class="text-right">@lang('Action')</th>
                            </tr>
                            @forelse ($countries as $key => $country)
                                <tr>
                                    <td data-label="@lang('Sl')">{{ $key + $countries->firstItem() }}</td>

                                    <td data-label="@lang('Name')">
                                        <img src="{{$country->flag}}" width="50px" height="45px">
                                    </td>
                                    <td data-label="@lang('Name')">
                                        {{ $country->name }}
                                    </td>
                                    <td data-label="@lang('Country Code')">
                                        {{ $country->code }}
                                    </td>
                                    <td data-label="@lang('Dial Code')">
                                        {{ $country->dial_code }}
                                    </td>

                                    <td data-label="@lang('Status')">
                                        @if($country->status == 1)
                                            <span class="badge badge-success">@lang('Active')</span>
                                        @else
                                            <span class="badge badge-warning">@lang('Deactive')</span>
                                        @endif
                                    </td>

                                    <td class="text-right" data-label="@lang('Action')">

                                        @if ($country->status == 1)
                                            <button class="btn btn-danger reject m-1 btn-sm c_status"
                                                    data-url="{{route('admin.country.update.status',$country->id)}}"
                                                    data-status="{{$country->status}}">@lang('Deactive')</button>
                                        @else
                                            <button type="button" class="btn btn-success reject m-1 btn-sm c_status"
                                                    data-url="{{route('admin.country.update.status',$country->id)}}"
                                                    data-status="{{$country->status}}">@lang('Active')</button>
                                        @endif


                                    </td>
                                </tr>
                            @empty

                                <tr>
                                    <td class="text-center" colspan="100%">@lang('No Data Found')</td>
                                </tr>

                            @endforelse
                        </table>
                    </div>
                </div>
                @if ($countries->hasPages())
                    <div class="card-footer">
                        {{ $countries->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h5 class="msg mt-3"></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn-primary">@lang('Confirm')</button>
                </div>
            </div>
        </form>
    </div>
</div>

@include('admin.design.js')
