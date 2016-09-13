@extends('admin.tempalte-2')
@section('content')
<link href="{{ asset('/css/admin/styleII.css') }}" rel="stylesheet">
<link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<style type="text/css" media="screen">
    #page-wrapper {
    padding: 0 15px;
    min-height: 100px;
    background-color: #fff;
}
.huge {
    font-size: 40px;
}
</style>
@include('admin.partials.nav')
@include('admin.partials.sub')
@include('admin.partials.errors')
@include('admin.partials.message')
@include('admin.partials.modal-revenue')
<div class="container">
            <div class="row" style="margin-left: 10%;">
                
                <div class="span3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-span3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-span10 text-right">
                                    <div class="huge">26</div>
                                    <div>New Comments!</div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                                <p class="pull-left" style="font-size: 15px;"><strong>Revenue</strong></p>
                                <p class="pull-right" style="font-size: 15px;"><strong>$123.456</strong></p>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>

                <div class="span3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-span3">
                                    <i class="fa fa-paper-plane fa-5x"></i>
                                </div>
                                <div class="col-xs-span10 text-right">
                                    <div class="huge">26</div>
                                    <div>New Comments!</div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                                <p class="pull-left" style="font-size: 15px;"><strong>Click</strong></p>
                                <p class="pull-right" style="font-size: 15px;"><strong>123.456</strong></p>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
               <div class="span3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-span3">
                                    <i class="fa fa-globe fa-5x"></i>
                                </div>
                                <div class="col-xs-span10 text-right">
                                    <div class="huge">26</div>
                                    <div>New Comments!</div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                                <p class="pull-left" style="font-size: 15px;"><strong>Impressions</strong></p>
                                <p class="pull-right" style="font-size: 15px;"><strong>123.456</strong></p>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
                
          
           
        </div>
        
</div>
<div class="main">
    <br>
    <div class="container" >
        <div class="row">
            <div class="span2">
                <div class="widget widget-table action-table">
                    <div class="widget-header">
                        <h3><i class="fa fa-list"></i> Yesterday</h3>
                    </div>
                    <div class="widget-content">
                        <div class="widget-nopad">
                            <table class="table table-striped table-bordered">
                                <thead>

                                </thead>
                                <tbody>
                                @foreach($mains as $main)
                                <tr>
                                    <td>Impressions</td>
                                    <td><b>{{$main->impresiones_dia}}</b></td>
                                </tr>
                                <tr>
                                    <td>Clikcs</td>
                                    <td>{{$main->c}}</td>

                                </tr>
                                <tr>
                                    <td>CTR(%)</td>
                                    <td>{{$main->ctr}}%</td>
                                </tr>
                                <tr>
                                    <td>eCPM</td>
                                    <td>@foreach($reve as $re) $ {{$re->ecpm_total}} @endforeach</td>
                                </tr>

                                <tr>
                                    <td>Revenue</td>
                                    <td>${{number_format($main->r , 2, '.', '') }}</td>
                                </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="span2">
                    <div class="widget widget-table action-table">
                        <div class="widget-header">
                            <h3><i class=""></i>Last revenue</h3>
                        </div>
                        <div class="widget-content">
                            <div class="widget-nopad">
                                <table class="table table-striped table-bordered">
                                    <thead>


                                    </thead>
                                    <tbody>
                                    @foreach($revenues as $revenue)
                                    <tr>
                                        <td>Date</td>
                                        <td><b>{{date('Y-m-d',strtotime($revenue->created_at))}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Revenue</td>
                                        <td>{{$revenue->revenue_total_diario}}</td>

                                    </tr>
                                    <tr>
                                        <td>Ecpm</td>
                                        <td>{{$revenue->ecpm_total}}</td>
                                    </tr>
                                    <tr>
                                        <td>CPC</td>
                                        <td>{{$revenue->CPC_Total}}</td>
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
            <div class="span6">
                <div class="widget widget-nopad">
                    <div class="widget-header">
                        <h3><i class="icon-bar-chart"></i> Last visit 8 days </h3>
                    </div>
                    <div class="widget-content">
                        <div class="widget big-stats-container">
                            <div id="container" style="min-width: 310px; height: 430px; max-width: 600px; margin: 0 auto;position:relative;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="span4" >
                <div class="widget widget-nopad"  >
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                        <h3>General information</h3>
                    </div>
                    <div class="widget-content" >	
                        <ul class="news-items" >
                            <li>
                                <div class="news-item-date"><span class="news-item-day">6</span> <span class="news-item-mouth">Nov</span></div>
                                <div class="news-item-detail">
                                    <a href="#" class="news-item-title" target="_blank"> lo que se necesite aqui...</a>
                                    <p class="news-item-preview">This is our web design and development news series where we share our favorite design/development related articles, resources, tutorials and awsome freebies.</p>
                                    <div class="news-item-detail">
                                        <button type="button" class="btn btn-defautl" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Revenue</button>
                                    </div>
                                </div>
                            </li>
			   <li>
				 <div class="news-item-date"><span class="news-item-day">6</span> <span class="news-item-mouth">Nov</span></div>
                                <div class="news-item-detail">
                                    <div class="news-item-detail">
                                       <a class="btn btn-primary" href="{{ url('admin/DBupdate')  }}">Actualizar reportes</a>
                                    </div>
                                </div>
			   </li>
                            <li>
                                <div class="news-item-date"><span class="news-item-day">6</span> <span class="news-item-mouth">Nov</span></div>
                                <div class="news-item-detail">
                                    <a  href="{{ url('admin/placement') }}" type="button" class="btn btn-default btn-lg">New Placements</a>

                                </div>
                            </li>
                            <li>
                                <div class="news-item-date"><span class="news-item-day">6</span> <span class="news-item-mouth">Nov</span></div>
                                <div class="news-item-detail">
                                    <a href="#" class="news-item-title" target="_blank"> lo que se necesite aqui...</a>
                                    <p class="news-item-preview">This is our web design and development news series where we share our favorite.</p>
                                </div>
                            </li>
                            <li>
                                <div class="news-item-date"><span class="news-item-day">6</span> <span class="news-item-mouth">Nov</span></div>
                                <div class="news-item-detail">
                                    <a href="#" class="news-item-title" target="_blank"> lo que se necesite aqui...</a>
                                    <p class="news-item-preview">This is our web design and development news series where we share our favorite.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.partials.footer')
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
@include('maxmedia.partials.notify')
@stop
@section('script')
<script type="text/javascript">
    $("#datepickerrevenue").datepicker({
        maxDate:-1,
        onSelect: function(selected) {
            $("#datepicker1").datepicker("option","minDate", selected)
        }
    });
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

                categories:[  @foreach($reports as $report)
           " {!! date('M-d',strtotime($report->fecha)) !!}"
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
@stop
