@extends('admin.tempalte-2')
@section('content')

<link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/chosen.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/prism.css') }}">
@include('admin.partials.nav')
@include('admin.partials.errors')
@include('admin.partials.message')
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li ><a href="{{ url('client/home') }}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                <li class="active"><a href="{{ url('client/report') }}"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
                <li><a href="{{ route('client.payment.index') }}"><i class="icon-money"></i><span>Payments</span> </a></li>
                <li><a href="{{ url('client/placement') }}"><i class="icon-bar-chart"></i><span>Placement</span> </a> </li>
                <li><a href="{{ url('client/account') }}"><i class="icon-user"></i><span>Account</span> </a> </li>
                <li><a href=""> </a></li>
            </ul>
        </div>
    </div>
</div>
<div class="main">
    <div class="main-inner">
        <div class="container">
        	
        	<div class="row" style="margin-left: 10%;">
        		<div class="span3">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-span3">
                                        <i class="fa fa-globe fa-5x"></i>
                                    </div>
                                    <div class="col-xs-span10 text-right">
                                        <div class="huge"></div>                                        
                                        <div>Impressions </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <br> 
                                <p class="pull-left" style="font-size: 15px;"><strong>Total Impressions</strong></p>
                                <p class="pull-right" style="font-size: 15px;"><strong id="total_impresiones">{{ number_format($total_impresiones,2,',','.') }} </strong></p>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-span3">
                                        <i class="fa fa-paper-plane fa-5x" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-xs-span10 text-right">
                                        <div class="huge">Clickss</div>                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <br> 
                                <p class="pull-left" style="font-size: 15px;"><strong>Total click</strong></p>
                                <p class="pull-right" style="font-size: 15px;"><strong id="total_cick"> {{ number_format($total_clicks,2,',','.') }}</strong></p>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-span3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-span10 text-right">
                                        <div class="huge">Total Revenue</div>                                        
                                
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <br> 
                                <p class="pull-left" style="font-size: 15px;"><strong>Total Revenue</strong></p>
                                <p class="pull-right" style="font-size: 15px;"><strong id="total_revenue">${{ number_format($total_revenue,2,',','.') }}</strong></p>
                                <br>
                            </div>
                        </div>
                    </div>
        	</div>


            <div class="row">
                <div class="span12">
                    <div class="widget widget-nopad">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" id="yesterday" class="btn btn-default btn-large">Yesterday</button>
                            <button type="button" id="8" class="btn btn-default btn-large">Last 8 days</button>
                            <button type="button"  id="current" class="btn btn-default btn-large ">Current Month</button>
                            <button type="button"  id="last" class="btn btn-default  btn-large">Last Month</button>
                            <button type="button" id="custom" class="btn btn-default btn-large" data-toggle="modal" data-target="#Mymodal">Custom</button>
                        </div>
                        <br>
                        <div class="btn-group-vertical">
                            <div class="form-group">
                               <select data-placeholder="Select..." class="chose-select combobox" style="width:250px;" tabindex="0" id="combobox">
                                    @if(empty($webs))
                                    @else
                                    <option value="all" selected>All sites</option>
                                    @foreach($webs as $web)
                                    <option value="{{ $web->id}}">{{ $web->nombre}}</option>
                                    @endforeach
                                    @endif
                               </select>
                                <select data-placeholder="Select..." class="chose-select" style="width:250px;" tabindex="0" id="combobox-ad">
                                    @if(empty($ads))
                                    @else
                                    <option value="all" selected>Everything</option>
                                    @foreach($ads as $ad)
                                    <option value="{{ $ad->id }}">{{ $ad->nombre }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <br>
                        <div id="container" style="min-width: 400px; height: 400px; max-width: 1000px; margin: 0 auto;position:relative;"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-list"></i>
                            <h3>Top Placements</h3>
                        </div>
                        <div class="widget-content" >
                            <table id="example" class="display" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Impressions</th>
                                    <th>Clicks</th>
                                    <th>CTR</th>
                                    <th>eCPM</th>
                                    <th>Revenue</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tables as $table)
                                <tr>
                                    <td>{{ date('Y-m-d',strtotime($table->fecha)) }}</td>
                                    <td>{{ $table->impresiones_dia }}</td>
                                    <td>{{ $table->click }}</td>
                                    <td>{{ $table->ctr }}</td>
                                    <td>{{ $table->ecpm }}</td>
                                    <td>{{ $table->r }}</td>
                                    

                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="Mymodal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <br>
                    <form class="form-inline" role="form" id="form">
                        <div class="form-group">
                            <label>Date:</label>
                            <input type="text" id="datepicker" name="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>To Date:</label>
                            <input type="text" name="todate" class="form-control" id="datepicker1">
                        </div>
                        <br>
                        <br>
                        <input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-success">Generar Reporte</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
@include('admin.partials.footer')
@include('maxmedia.partials.notify')
@stop
@section('script')
<script>
    $(function ()
        {
            $('#container').highcharts({
                title: {
                    text: 'Maxmedia Report',
                    x: -20 //center
                },
                subtitle: {
                    text: 'LAST 8 DAYS',
                    x: -20
                },
                xAxis:
                {
                    categories:
                        [
                                @foreach($reports as $report)
            " {!! date('M-d',strtotime($report->fecha)) !!}"
                ,@endforeach
            ]
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
    series:
        [{
            name: 'Impressions',
            data: [
    @foreach($reports as $report)
    {!! $report->impresiones_dia !!}
    ,@endforeach]
    },{
        name: 'Ecpm',
            data: [
                                @foreach($reports as $report)
        {!! $report->ecpm!!}
    ,@endforeach]
    },{
        name: 'Revenue',
            data: [
                                @foreach($reports as $report)
        {!! $report->r!!}
    ,@endforeach]
    }]
    });
    });
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
<script type="text/javascript" src="{{ asset('js/client/client-report13.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/admin/chosen.jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/admin/prism.js')}}"></script>
<script type="text/javascript">
$(".chose-select").chosen({enable_search_threshold:10});
</script>
@stop

