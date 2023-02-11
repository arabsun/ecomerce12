<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>Admin</title>
    <link rel="icon" href="favicon.ico" type="image/ico">
    <meta name="keywords" content="Admin">
    <meta name="description" content="Admin">
    <meta name="author" content="yinqi">
    @yield('meta')
    @yield('style')
    <link href="{{asset('public/admin/asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/asset/css/materialdesignicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/admin/asset/css/style.min.css')}}" rel="stylesheet">
</head>
<body>

    @yield('content')


    <script type="text/javascript" src="{{asset('public/admin/asset/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/asset/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/asset/js/main.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/admin/asset/js/Chart.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            var $dashChartBarsCnt  = jQuery( '.js-chartjs-bars' )[0].getContext( '2d' ),
                $dashChartLinesCnt = jQuery( '.js-chartjs-lines' )[0].getContext( '2d' );

            var $dashChartBarsData = {
                labels: ['周一', '周二', '周三', '周四', '周五', '周六', '周日'],
                datasets: [
                    {
                        label: '注册用户',
                        borderWidth: 1,
                        borderColor: 'rgba(0,0,0,0)',
                        backgroundColor: 'rgba(51,202,185,0.5)',
                        hoverBackgroundColor: "rgba(51,202,185,0.7)",
                        hoverBorderColor: "rgba(0,0,0,0)",
                        data: [2500, 1500, 1200, 3200, 4800, 3500, 1500]
                    }
                ]
            };
            var $dashChartLinesData = {
                labels: ['2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014'],
                datasets: [
                    {
                        label: '交易资金',
                        data: [20, 25, 40, 30, 45, 40, 55, 40, 48, 40, 42, 50],
                        borderColor: '#358ed7',
                        backgroundColor: 'rgba(53, 142, 215, 0.175)',
                        borderWidth: 1,
                        fill: false,
                        lineTension: 0.5
                    }
                ]
            };

            new Chart($dashChartBarsCnt, {
                type: 'bar',
                data: $dashChartBarsData
            });

            var myLineChart = new Chart($dashChartLinesCnt, {
                type: 'line',
                data: $dashChartLinesData,
            });
        });
    </script>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block alert-message-admin">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif


    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block alert-message-admin">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif


    @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block alert-message-admin">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif


    @if ($message = Session::get('info'))
        <div class="alert alert-info alert-block alert-message-admin">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif


    @if ($errors->any())
        <div class="alert alert-danger alert-message-admin">
            <button type="button" class="close" data-dismiss="alert">×</button>
            Please check the form below for errors
        </div>
    @endif
    <style>
        .alert-message-admin{
            position: fixed;
            bottom: 3%;
            right: 1%;
        }
    </style>
    @yield('script')
</body>
</html>
