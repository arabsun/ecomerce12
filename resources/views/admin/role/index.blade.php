@include('admin.design.css')
<body>

<div class="container-fluid p-t-15">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header"><a href="{{route('admin.role.create')}}" class="btn btn-primary"><i
                                class="fas fa-plus"></i> @lang('Add New Role')</a></div>
                <div class="card-body text-center">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>@lang('Sl')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Action')</th>
                            </tr>
                            @forelse ($roles as $key => $role)
                                @if ($role->name != 'admin')
                                    <tr>
                                        <td data-label="@lang('Sl')">{{$key}}</td>
                                        <td data-label="@lang('Name')">
                                            {{$role->name}}
                                        </td>
                                        <td data-label="@lang('Action')">
                                            <a class="btn btn-primary"
                                               href="{{route('admin.role.edit',$role->id)}}">@lang('Permissions')</a>
                                        </td>
                                    </tr>

                                @endif
                            @empty

                                <tr>
                                    <td class="text-center" colspan="100%">@lang('No Data Found')</td>
                                </tr>

                            @endforelse
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@include('admin.design.js')
