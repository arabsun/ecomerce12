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
