<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard - Maxmedia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{ asset('css/admin/bootstrap2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
          rel="stylesheet">
    <link href="{{ asset('css/admin/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styleII.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/pages/dashboard.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <link rel="shortcut icon" href="{{asset('/images/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('/images/favicon.ico')}}" type="image/x-icon">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
@yield('content')


<script src="{{ asset('js/admin/jquery1.9.min.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/admin/highcharts.js') }}"></script>
<script src="{{ asset('js/admin/date.format.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    var BASEURL = '{{ url() }}/';
</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('js/admin/jquery-ui.js') }}" type="text/javascript"></script>
@yield('script')
<script>
    $(document).ready(function() {
        $('#referrers').DataTable({
            "paging":   true,
            "ordering": true,
            "info":     false
        });
        $('#referrersReport').DataTable({
            "paging":   true,
            "ordering": true,
            "info":     false,
            "order": [[ 0, "desc" ]]
        });
        $( "#date" ).datepicker({
            maxDate:-1,
            onSelect: function(selected) {
                $("#toDate").datepicker("option","minDate", selected)
            }
        });
        $( "#toDate" ).datepicker({
            maxDate:-1,
            minDate: $("#date").val()
        });
    } );
</script>

</body>
</html>
