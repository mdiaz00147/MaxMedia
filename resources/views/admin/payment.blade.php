@extends('admin.tempalte-2')
@section('content')
<link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/buttons.dataTables.min.css')}}">
@include('admin.partials.nav')
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li class=""><a href="{{ url('admin/home') }}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                <li><a href="{{ url('admin/report') }}"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
                <li class="active"><a href="{{ route('admin.payment.index') }}"><i class="icon-money"></i><span>Payments</span> </a></li>
                <li><a href="{{ url('admin/placement') }}"><i class="icon-bar-chart"></i><span>Placements</span> </a> </li>
                <li><a href="{{ route('admin.referrer.index') }}"><i class="icon-user-md"></i><span>Referrer</span> </a> </li>
                <li><a href=""> </a></li>
            </ul>
        </div>
    </div>
</div>
@include('admin.partials.errors')
<div class="main">
<div class="main-inner">
    <div class="container">
        <div class="row">
            <div class="span3">
                <div class="widget widget-nopad">
                    <div class="widget-header"> <i class="icon-list-alt"></i>
                        <h3> This month</h3>
                    </div>
                    <!-- /widget-header -->
                    <div class="widget-content">
                        <div class="widget big-stats-container">
                            <div class="widget-content">
                                <div id="big_stats">
                                    <div class="stat"> <i class="icon-money"></i> <span class="value">@foreach($revenue_month as $r){{ $r->r }}@endforeach</span>  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

       

                 <div class="widget widget-nopad">
                    <div class="widget-header"> <i class="icon-list-alt"></i>
                        <h3> Last Month</h3>
                    </div>
                    <!-- /widget-header -->
                    <div class="widget-content">
                        <div class="widget big-stats-container">
                            <div class="widget-content">
                                <div id="big_stats">
                                    <div class="stat"> <i class="icon-money"></i> <span class="value">@foreach($revenue_last_month as $r){{ $r->re }}@endforeach</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="widget widget-nopad">
                    <div class="widget-header"> <i class="icon-list-alt"></i>
                        <h3> Payment history</h3>
                    </div>
                    <!-- /widget-header -->
                    <div class="widget-content">
                        <div class="widget big-stats-container">
                            <div class="widget-content">
                                <div id="big_stats">
                                    <div class="stat"> <i class="icon-money"></i> <span class="value">@foreach($revenue_total as $r){{ $r->r }}@endforeach</span> </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget widget-nopad">
                    <a type="button" class="btn btn-success" href="{{ route('admin.payment.create') }}" style="width: 240px;" > <span class="icon-money"> </span> Request Payment</a>
                </div>

            </div>
            <div class="span5">
                <div class="widget widget-nopad">
                    <div class="widget-header"> <i class="icon-bar-chart"></i>
                        <h3>Payment Trend</h3>
                    </div>
                    <!-- /widget-header -->
                    <div class="widget-content">
                        <div class="widget big-stats-container">
                            <div class="widget-content">
                                <div id="big_stats">
                                    <div id="container" style="min-width: 310px; height: 300 px; max-width: 600px; margin: 0 auto;position:relative;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="widget widget-nopad">
                    <div class="widget-header"> <i class="icon-list-alt"></i>
                        <h3>Tip`s</h3>
                    </div>
                    <!-- /widget-header -->
                    <div class="widget-content">
                        <ul class="news-items">
                            <li>

                                <div class="news-item-date"> <span class="news-item-day">29</span> <span class="news-item-month">Aug</span> </div>
                                <div class="news-item-detail"> <a href="http://www.egrappler.com/thursday-roundup-40/" class="news-item-title" target="_blank">Thursday Roundup # 40</a>
                                    <p class="news-item-preview"> This is our web design and development news series where we share our favorite design/development related articles, resources, tutorials and awesome freebies. </p>
                                </div>

                            </li>
                            <li>

                                <div class="news-item-date"> <span class="news-item-day">15</span> <span class="news-item-month">Jun</span> </div>
                                <div class="news-item-detail"> <a href="http://www.egrappler.com/retina-ready-responsive-app-landing-page-website-template-app-landing/" class="news-item-title" target="_blank">Retina Ready Responsive App Landing Page Website Template – App Landing</a>
                                    <p class="news-item-preview"> App Landing is a retina ready responsive app landing page website template perfect for software and application developers and small business owners looking to promote their iPhone, iPad, Android Apps and software products.</p>
                                </div>

                            </li>

                        </ul>
                    </div>

                </div>

            </div>

        </div>

        <div class="row">
            <div class="span12">
                <div class="widget">
                    <div class=" widget-header">
                        <i class="icon-table"></i>
                        <h3>Top Payments</h3>
                    </div>
                    <div class="widget-content">
                        <table id="t_payments" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Period</th>
                                <th>Paid</th>
                                <th>User</th>
                                <th>Web</th>
                            </tr>
                            </thead>
                            <tbody>
                          @foreach($payments as $payment)
                            <tr @if($payment->paid == 1) class="info" @endif>
                                <td>{!! date('M-d',strtotime($payment->created_at)) !!}"</td>
                                <td>{{ $payment->paid }}</td>
                                <td>{{ $payment->email }}</td>
                                <td>{{ $payment->web }}</td>
                            </tr>
                           @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>

<div  id="Mymodal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Informacion para el pago</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label for="ejemplo_email_1">Email</label>
                        <input type="email" class="form-control" id="ejemplo_email_1"
                               placeholder="Introduce tu email">
                    </div>
                    <div class="form-group">
                        <label for="ejemplo_password_1">Contraseña</label>
                        <input type="password" class="form-control" id="ejemplo_password_1"
                               placeholder="Contraseña">
                    </div>
                    <div class="form-group ">
                        <label for="ejemplo_archivo_1">Adjuntar un archivo</label>
                        <input type="file" id="ejemplo_archivo_1">
                        <p class="help-block"></p>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Activa esta casilla
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Enviar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submint" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>

</div>

</div>

@include('admin.partials.message')
@include('admin.partials.footer')
@include('maxmedia.partials.notify')
@stop
@section('script')
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('/js/admin/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/admin/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/admin/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/admin/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/admin/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/admin/buttons.print.min.js')}}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    $(function () {
            $('#container').highcharts({
                title: {
                    text: 'Maxmedia Report',
                    x: -20 //center
                },
                subtitle: {
                    text: 'LAST 8 DAYS',
                    x: -20
                },
                xAxis: {

                    categories:[  @foreach($payments as $payment)
            " {!! date('M-d',strtotime($payment->created_at)) !!}"
                ,@endforeach]
        },
        yAxis: {
        title: {
            text: ''
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    },
    tooltip: {
        valueSuffix: ''
    },
    legend: {
        layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
    },
    series: [{
        name: 'Balance',
        data: [
    @foreach($payments as $payment)
    {!! $payment->b !!}
    ,@endforeach]
    }]
    });
    });
</script>
<script type="text/javascript">
$(document).ready(function($) {
    $('#t_payments').DataTable({
        ordering: true,
        searching: true,
        dom: 'Bftrip',
        buttons:[
        'excelHtml5',
        'pdfHtml5',
        {
            extend: 'print',
            customize: function(win){
                $(win.document.body)
                .css('font-size','10pt')

                $(win.document.body).find('table')
                .addClass('compact')
                .css('font-size','inherit')
            },
        },
        ]
    });
});
</script>
@stop