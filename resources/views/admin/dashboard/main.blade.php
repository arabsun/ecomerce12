<head>
    @include('admin.design.css')
</head>
<body>
<div class="loader"></div>
<div class="container-fluid p-t-15">
    <div class="row h-100 row-same-height">
        <div class="col-md-12 col-lg-12 B h-100">
            <div class="card border-primary">
                <div class="card-header">
                    <div class="card-title">Annually Compelted Orders</div>
                </div>
                <div class="card-body">
                    <canvas id="chart-vbar-2" width="594" height="250"
                            style="display: block; box-sizing: border-box; width: 297px; height: 185px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('public/admin/asset/js/jquery.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/popper.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/bootstrap-multitabs/multitabs.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/jquery.cookie.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/index.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/main.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/Chart.min.js')}}"></script>
<script>

    $(window).on('load', () => {
        $('.loader').fadeOut(2000)
    })

    $(window).on('load', 'iframe', function () {
        $('.loader_image').hide();
    })


    $(document).on('click', '.multitabs', function () {
        $('.loader_image').show();


    });
</script>

<script type="text/javascript">

    $(document).ready(function (e) {


        new Chart($("#chart-vbar-2"), {
            type: 'bar',
            data: {
                labels: ["01", "02", "03", "04", "05", "06", "07"],
                datasets: [{
                    label: "Ser1",
                    backgroundColor: "rgb(216,187,153)",
                    borderColor: "rgba(0,0,0,0)",
                    hoverBackgroundColor: "rgba(216,187,153,0.77)",
                    hoverBorderColor: "rgba(0,0,0,0)",
                    data: [10, 59, 80, 58, 20, 55, 40]
                },
                    {
                        label: "Ser2",
                        backgroundColor: "rgb(0,32,112)",
                        borderColor: "rgba(0,0,0,0)",
                        hoverBackgroundColor: "rgba(51,99,202,0.5)",
                        hoverBorderColor: "rgba(0,0,0,0)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var myLineChart = new Chart($dashChartLinesCnt, {
            type: 'line',
            data: $dashChartLinesData,
        });
    });
</script>


</body>

