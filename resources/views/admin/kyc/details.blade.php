@include('admin.design.css')
<body>
<div class="container-fluid p-t-15">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="row">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="special-box">
                                        <div class="heading-area">
                                            <h4 class="title">
                                                {{__('KYC Information')}}
                                            </h4>
                                        </div>
                                        <div class="table-responsive-sm">
                                            <table class="table">
                                                <tbody>
                                                @if ($kycInformations != NULL)
                                                    @foreach ($kycInformations as $key=>$value)
                                                        @if ($value[1] == 'file')
                                                            <tr>
                                                                <th width="45%">{{$key}}</th>
                                                                <td width="10%">:</td>
                                                                <td width="45%"><a
                                                                            href="{{asset('assets/images/'.$value[0])}}"
                                                                            download><img
                                                                                src="{{asset('assets/images/'.$value[0])}}"
                                                                                class="img-thumbnail"></a></td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <th width="45%">{{$key}}</th>
                                                                <td width="10%">:</td>
                                                                <td width="45%">{{ $value[0] }}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <p class="text-center mt-5">@lang('KYC NOT SUBMITTTED')</p>
                                                @endif


                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="footer-area">
                                            @if ($kycInformations != NULL)
                                                @if ($user->is_kyc == 1)
                                                    <a href="{{ route('admin.user.kyc',['id' => $user->id, 'status' => 2]) }}"
                                                       class="btn btn-primary status_verify"><i
                                                                class="far fa-check-circle"></i> {{__('Approve')}}</a>
                                                    <a href="{{ route('admin.user.kyc',['id' => $user->id, 'status' => 0]) }}"
                                                       class="btn btn-danger status_verify ml-3"><i
                                                                class="fas fa-minus-circle"></i> {{__('Reject')}}</a>
                                                @endif
                                            @endif
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
