@include('admin.design.css')
<body>

<div class="container-fluid p-t-15">

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#addModal"
                       class="btn btn-primary add"><i class="fas fa-plus"></i> @lang('Add New Staff')</a>
                </div>
                <form action="" class="card-header justify-content-end">
                    <div class="row flex-grow-1 flex-sm-grow-0">
                        <div class="col-sm-6 my-2">
                            <select class="form-control" id="" onChange="window.location.href=this.value">
                                <option value="{{url('admin/manage/staff'.'?status=all')}}" {{request('status') == 'all'?'selected':''}}>@lang('All')</option>
                                <option value="{{url('admin/manage/staff'.'?status=active')}}" {{request('status') == 'active'?'selected':''}}>@lang('Active')</option>
                                <option value="{{url('admin/manage/staff'.'?status=banned')}}" {{request('status') == 'banned'?'selected':''}}>@lang('Banned')</option>
                            </select>
                        </div>
                        <div class="col-sm-6 my-2">
                            <div class="input-group has_append ">
                                <input type="text" class="form-control" placeholder="@lang('email')" name="search"
                                       value="{{$search ?? ''}}"/>
                                <div class="input-group-append">
                                    <button class="input-group-text bg-primary border-0"><i
                                                class="fas fa-search text-white"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

                <div class="card-body text-center">
                    <div class="table-responsive">
                        <table class="table table-striped">

                            <tr>
                                <th>@lang('Sl')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Role')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>

                            @forelse ($staffs as $key => $user)

                                <tr>
                                    <td data-label="@lang('Sl')">{{$key + $staffs->firstItem()}}</td>

                                    <td data-label="@lang('Name')">
                                        {{$user->name}}
                                    </td>

                                    <td data-label="@lang('Email')">{{$user->email}}</td>
                                    <td data-label="@lang('Role')">
                                        <span class="badge badge-dark">{{strtoupper($user->role)}}</span>
                                    </td>
                                    <td data-label="@lang('Status')">
                                        @if($user->status == 1)
                                            <span class="badge badge-success">@lang('active')</span>
                                        @elseif($user->status == 2)
                                            <span class="badge badge-danger">@lang('banned')</span>
                                        @endif
                                    </td>

                                    <td data-label="@lang('Action')">
                                        <a class="btn btn-primary details" data-staff="{{$user}}"
                                           href="javascript:void(0)"
                                           data-route="{{route('admin.staff.update',$user->id)}}">@lang('Details')</a>
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
                @if ($staffs->hasPages())
                    {{ $staffs->links() }}
                @endif
            </div>
        </div>
    </div>

    <!-- Modal -->

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{route('admin.staff.add')}}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('Add New Staff')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>@lang('Name')</label>
                            <input class="form-control" type="text" name="name" required value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('Email')</label>
                            <input class="form-control" type="email" name="email" required value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('Password')</label>
                            <input class="form-control" type="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>@lang('Confirm Password')</label>
                            <input class="form-control" type="password" name="password_confirmation" required>
                        </div>
                        <div class="append"></div>
                        <div class="form-group">
                            <label>@lang('Select Role')</label>
                            <select name="role" class="form-control">
                                <option value="">Select</option>
                                @foreach ($roles as $item)
                                    <option value="{{$item}}">{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@include('admin.design.js')
