@extends('admin.tempalte-2')
@section('content')
    <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
    @include('admin.partials.nav')
    @include('admin.partials.errors')
    @include('admin.partials.message')
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li class="active"><a href="{{ url('referrer/home') }}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li ><a href="{{ url('referrer/report') }}"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
                    <li><a href="{{ url('referrer/placements') }}"><i class="icon-money"></i><span>All Placements</span> </a></li>
                    <li><a href="{{ url('referrer/referrers') }}"><i class="icon-user-md"></i><span>All referrers</span> </a> </li>
                    <li><a href="{{ route('refererr.report.referrer') }}"><i class="icon-bar-chart"></i><span>Statics</span> </a> </li>
                    <li><a href="{{ url('referrer/account') }}"><i class="icon-user"></i><span>Account</span> </a> </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="">
        <div class="container">
            <div class="row">
                <div class="span2">
                    <div class="widget widget-table action-table">
                        <div class="widget-header">
                            <h3><i></i> Yesterday</h3>
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
                                            <td><b>{{ number_format($main->impresiones_dia,0,'','.') }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Clikcs</td>
                                            <td>{{ number_format($main->click,0,'','.') }}</td>

                                        </tr>
                                        <tr>
                                            <td>CTR(%)</td>
                                            <td>{{$main->ctr}}%</td>
                                        </tr>
                                        <tr>
                                            <td>eCPM</td>
                                            <td>${{number_format($main->ecpm , 4, '.', '') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Revenue</td>
                                            <td>${{number_format($main->r , 2, '.', '') }}</td>
                                        </tr>
                                        <tr>
                                            <td>CPC</td>
                                            <td>${{$main->cp}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="widget widget-nopad">
                        <div class="widget-header">
                            <h3><i class="icon-bar-chart"></i> Graph</h3>
                        </div>
                        <div class="widget-content">
                            <div class="widget big-stats-container">
                                <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto;position:relative;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="widget widget-nopad">
                        <div class="widget-header">
                            <i class="icon-list-alt"></i>
                            <h3>General information</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="news-items">
                                <li>
                                    <div class="news-item-date"><span class="news-item-day">6</span> <span class="news-item-mouth">Nov</span></div>
                                    <div class="news-item-detail">
                                        <a href="{{  url('invited_by').'/'.Auth::user()->code_referrer }}" class="news-item-title" target="_blank"> Url referrer</a>
                                        <br>    
                                        <p class="news-item-preview"><input type="text" value="{{  url('invited_by').'/'.Auth::user()->code_referrer }}" class="form-control"></p>
                                        <div class="news-item-detail">

                                        </div>
                                    </div>
                                </li>


                                <li>
                                    <div class="news-item-date"><span class="news-item-day">6</span> <span class="news-item-mouth">Nov</span></div>
                                    <div class="news-item-detail">

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
    <br>
    @include('admin.partials.footer')
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    @include('maxmedia.partials.notify')
@stop
@section('script')
    <script type="text/javascript">
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
