@extends('admin.tempalte-2')
    @section('content')
    <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/admin/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/chosen.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/buttons.dataTables.min.css')}}">
    @include('admin.partials.nav')
    @include('admin.partials.errors')
    @include('admin.partials.message')
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li ><a href="{{ url('admin/home') }}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li class="active"><a href="{{ url('admin/report') }}"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
                    <li><a href="{{ route('admin.payment.index') }}"><i class="icon-money"></i><span>Payments</span> </a></li>
                    <li><a href="{{ url('admin/placement') }}"><i class="icon-bar-chart"></i><span>Placement</span> </a> </li>
                    <li ><a href="{{ route('admin.referrer.index') }}"><i class="icon-user-md"></i><span>Referrers</span> </a> </li>
                    <li class=""> </li>
                </ul>
            </div>
        </div>
    </div>

 <div class="main">
        <div class="main-inner">
            <div class="container">
                
                
                <div class="row">
                    <div class="span12">
                        <div class="widget widget-nopad">
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" id="yesterday" class="btn btn-default btn-large">Yesterday</button>
                                <button type="button" id="8" class="btn btn-default btn-large">Last 8 days</button>
                                <button type="button"  id="current" class="btn btn-default btn-large ">Current Month</button>
                                <button type="button"  id="last" class="btn btn-default  btn-large">Last Month</button>
                                <button type="button" id="custom" class="btn btn-default btn-large" data-toggle="modal" data-target="#myModal">Custom</button>
                            </div>
                            <br>
                            <div class="btn-group-vertical">
                                <div class="form-group">
                                    
                                        <select data-placeholder="Select..." class="chose-select combobox" style="width:250px;" tabindex="0" id="combobox">
                                            <option  valor = ""> </option> 
                                            <option value="all" selected>Everything</option>    
                                            @foreach($webs as $web)
                                            <option value="{{ $web->id }}">{{ $web->nombre }}</option>
                                            @endforeach
                                        </select>
                                   
                                    <div>
                                        <select data-placeholder="Select..." class="chose-select" style="width:250px;" tabindex="0" id="combobox-ad">
                                            <option  valor = ""> </option> 
                                            <option value="all" selected>Everything</option>
                                            @foreach($ads as $ad)
                                            <option value="{{ $ad->id}}">{{ $ad->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                                <table id="top_placements" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
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
                                            <td>{{ $table->fecha }}</td>
                                            <td>{{ $table->impresiones_dia }}</td>
                                            <td>{{ $table->click }}</td>
                                            <td>{{ $table->ctr }}</td>
                                            <td>{{ $table->ecpm }}</td>
                                            <td>{{ $table->r }}</td>
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
        <!--Modal de report-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Information for report</h4>
      </div>
      <div class="modal-body">
        <br>
         <form class="form-inline" role="form" id="form">
                        
                                <input type="text" id="datepicker" name="date" class="form-control" placeholder="Date" style="margin-left: 7.5%">
                                
                  
                            
                             <input type="text" name="todate" class="form-control" id="datepicker1" placeholder="To Date">                           
        </div>
        <div class="modal-footer">
        <input type="hidden" name="_token" id="token2" value="{{ csrf_token() }}">
        <button type="submit"  id="submit" class="btn btn-success" onClick="$('#myModal').modal('hide');">generate report</button>
        </form>
      </div>
    </div>
  </div>
</div>
        <!-- Fin del modal de report-->
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
    <script type="text/javascript" src="{{ asset('js/maxmedia/agregar/adminreport69.js') }}"></script>  
    <script type="text/javascript" src="{{ asset('js/admin/chosen.jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/prism.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/pdfmake.min.js')}}"></script>
    <script type="text/javascript"`src="{{ asset('js/admin/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/buttons.print.min.js')}}"></script>
    <script type="text/javascript">
        $(".chose-select").chosen({enable_search_threshold: 10});
    </script>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#top_placements').DataTable({
                ordering: true,
                dom: 'Bftrip',
                buttons:[
                'excelHtml5',
                
                {
                    extend: 'print',
                    customize: function(win){
                        $(win.document.body)
                        .css('font-size', '10pt')

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
