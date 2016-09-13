@extends('admin.tempalte-2')
@section('content')
<link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
@include('admin.partials.nav')
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li class=""><a href="{{ url('client/home') }}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                <li><a href="{{ url('client/report') }}"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
                <li class="active"><a href="{{ route('client.payment.index') }}"><i class="icon-money"></i><span>Payments</span> </a></li>
                <li><a href="{{ url('client/placement') }}"><i class="icon-bar-chart"></i><span>Placements</span> </a> </li>
                <li><a href="{{ url('client/account') }}"><i class="icon-user"></i><span>Account</span> </a> </li>
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

                @foreach($revenue as $r)
                    @foreach($solicitudes as $re)                
                        @foreach($payments as $payment) 
                            @include('client.partials.modal-monay')
                            @if( (($r->reve - $re->c ) - $payment->b >= 10))
                            <div class="widget widget-nopad">
                            <div class="widget-header"> <i class="icon-list-alt"></i>
                            <h3> Request payment </h3>
                            </div>
                               
                            
                            <div class="widget-content">
                            <div class="widget big-stats-container">
                                <div class="widget-content">
                                    <div id="big_stats">
                                        <div class="stat"><button type="button" class="btn btn-success btn-block btn-lg" style="width: 80%;" data-target="#Mymodal" data-toggle="modal">Withdraw</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>

                            @else

                            <div class="widget widget-nopad">
                            <div class="widget-header"> <i class="icon-list-alt"></i>
                            <h3> Request payment</h3>
                            </div>
                               
                    
                            <div class="widget-content">
                            <div class="widget big-stats-container">
                                <div class="widget-content">
                                    <div id="big_stats">
                                    <center>
                                        <button type="button" class="btn btn-warning" style="width: 230px;">You dont have enough money</button>
                                    </center>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                            @endif
                        @endforeach
                    @endforeach
                @endforeach

                    <div class="widget widget-nopad">
                        <div class="widget-header"> <i class="icon-list-alt"></i>
                            <h3> Pending payments</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <div class="widget big-stats-container">
                                <div class="widget-content">
                                    <div id="big_stats">
                                        <div class="stat"> <i class="icon-money"></i> <span class="value">@foreach($solicitudes as $r) @if($r->c <= 0 ) 0 @else{{ $r->c }}@endif @endforeach</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-nopad">
                        <div class="widget-header"> <i class="icon-list-alt"></i>
                            <h3> Total paid</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <div class="widget big-stats-container">
                                <div class="widget-content">
                                    <div id="big_stats">
                                        <div class="stat"> <i class="icon-money"></i> <span class="value">@foreach($revenue_total as $r) @if($r->r <= 0 ) 0 @else{{ $r->r }}@endif @endforeach</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <div class="widget-header"> <i class="icon-thumbs-up"></i>
                            <h3> Tip</h3>
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
                                    <th></th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Paypal</th>
                                    <th>Transaction ID</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payments_table as $payment)
                                <tr @if($payment->paid == 1) class="info" @endif>
                                <td></td>
                                <td align="center">{!! date('M-d',strtotime($payment->created_at)) !!}"</td>
                                <td align="center">${{ $payment->paid }} USD</td>
                                <td align="center">{{ $payment->email }}</td>
                                <td align="center">{{ $payment->paypal_id_transaction }}</td>
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
</div>
@include('admin.partials.errors')
@include('admin.partials.message')
@include('admin.partials.footer')
@include('maxmedia.partials.notify')
@stop
@section('script')
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function($) {
        $('#t_payments').DataTable({
            language: {
                "lengthMenu":"Payments_MENU_",
                "zeroRecords":"There are not Payments",
                "info": "List Payments _PAGE_ of _PAGE_",
                "infoEmpty": "There are not Payments",
                "infoFiltered": "(filtered from _MAX_ total records",
                "search": "Search",
                "paginate":{
                    "first":"First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                }

            }

        });
    });
</script>
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
@stop
