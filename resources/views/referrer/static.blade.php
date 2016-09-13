@extends('admin.tempalte-2')
@section('content')
    <link href="{{ asset('/css/admin/styleII.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    @include('admin.partials.nav')
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li ><a href="{{ url('referrer/home') }}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li ><a href="{{ url('referrer/report') }}"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
                    <li><a href="{{ url('referrer/placements') }}"><i class="icon-money"></i><span>All Placements</span> </a></li>
                    <li><a href="{{ url('referrer/referrers') }}"><i class="icon-user-md"></i><span>All referrers</span> </a> </li>
                    <li class="active"><a href="{{ route('refererr.report.referrer') }}"><i class="icon-bar-chart"></i><span>Statics</span> </a> </li>
                    <li><a href="{{ url('referrer/account') }}"><i class="icon-user"></i><span>Account</span> </a> </li> </ul>
            </div>
        </div>
    </div>
    @include('admin.partials.errors')
    @include('admin.partials.message')
    @include('admin.partials.modal-revenue')
    <div class="main">
        <div class="container">
            <h2 STYLE="margin-left: 40%;">@if(isset($fecha)){!!$fecha !!}@else Yesterday @endif</h2>
            <br>
            <div class="row" style="margin-left: 10%;">

                <div class="span3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-span3">
                                    <br>
                                    <i class="fa fa-money fa-3x"></i>
                                </div>
                                <div class="col-xs-span10 text-right">
                                    <br>
                                    <div class="huge">${{ number_format($total_payment * 0.05 ,2) }}</div>
                                    <br>
                                    <div>Revenue Manager!</div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <p class="pull-left" style="font-size:15px;"><strong>CTR</strong></p>
                            <p class="pull-right" style="font-size:15px;"><strong>$ {{ number_format($total_ctr,5) }}</strong></p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-span3">
                                    <br>
                                    <i class="fa fa-money fa-3x"></i>
                                </div>
                                <div class="col-xs-span10 text-right">
                                    <br>
                                    <div class="huge">${{ number_format($total_payment ,2) }}</div>
                                    <br>
                                    <div>Revenue Total!</div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <p class="pull-left" style="font-size:15px;"><strong>CTR</strong></p>
                            <p class="pull-right" style="font-size:15px;"><strong>$ {{ number_format($total_ctr,5) }}</strong></p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="span3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-span3">
                                    <br>
                                    <i class="fa fa-paper-plane fa-3x"></i>
                                </div>
                                <div class="col-xs-span10 text-right">
                                    <br>
                                    <div class="huge">{{ number_format($total_clicks,0,'','.') }}</div>
                                    <br>
                                    <div>Clicks!</div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer">
                            <p class="pull-left" style="font-size:15px;"><strong>CTC</strong></p>
                            <p class="pull-right" style="font-size:15px;"><strong>$ {{ number_format($total_cpc,5) }}</strong></p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="span3" style="margin-left: 31.5%">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-span3">
                                    <br>
                                    <i class="fa fa-globe fa-3x"></i>
                                </div>
                                <div class="col-xs-span10 text-right">
                                    <br>
                                    <div class="huge">{{ number_format($total_impressions, 0, '', '.') }}</div>
                                    <br>
                                    <div>Impressions!</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <p class="pull-left" style="font-size:15px;"><strong>eCPM</strong></p>
                            <p class="pull-right" style="font-size:15px;"><strong>$ {{ number_format($total_cpm,5) }}</strong></p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" >
                <div  style="margin-left: 30%" class="btn-group" role="group" aria-label="...">
                    <button type="button" id="yesterday" class="btn btn-default btn-large">Yesterday</button>
                    <button type="button" id="8" class="btn btn-default btn-large">Last 8 days</button>
                    <button type="button"  id="current" class="btn btn-default btn-large ">Current Month</button>
                    <button type="button"  id="last" class="btn btn-default  btn-large">Last Month</button>
                    <button type="button" id="custom" class="btn btn-default btn-large" data-toggle="modal" data-target="#myModal">Custom</button>
                </div>
                <br>
                <br>

                <div class="row">
                    <div class="span4">
                        <div class="widget widget-table action-table">
                            <div class="widget-header">
                                <h3><i class="fa fa-list"></i> All Todays Month</h3>
                            </div>
                            <div class="widget-content">
                                <div class="widget-nopad">
                                    <table class="table table-striped table-bordered">
                                        <thead>


                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Impressions</td>
                                            <td><b>{{ number_format($total_impressions_month, 0, '', '.') }}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Clikcs</td>
                                            <td>{{number_format($total_clicks_month,0,'','.')}}</td>

                                        </tr>
                                        <tr>
                                            <td>CTR(%)</td>
                                            <td> {{ number_format($total_ctr_month,5) }} %</td>
                                        </tr>
                                        <tr>
                                            <td>eCPM</td>
                                            <td>$ {{ number_format($total_cpm_month,5) }}</td>
                                        </tr>

                                        <tr>
                                            <td>Revenue Manager</td>
                                            <td>${{ number_format($total_payment_month  ,2) }}</td>
                                        </tr>

                                        <tr>
                                            <td>Revenue Plublishers</td>
                                            <td>${{ number_format($total_payment_month * 0.05 ,2) }}</td>
                                        </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span4">
                                <div class="widget widget-table action-table">
                                    <div class="widget-header">
                                        <h3><i class=""></i>Your Referrers</h3>
                                    </div>
                                    <div class="widget-content" style="padding: 10px;">
                                        <div class="widget-nopad">
                                            <table id="referrers" class="table table-striped table-bordered">

                                                <thead>
                                                <th>Nombre</th>
                                                <th>web</th>
                                                <th>email</th>
                                                </thead>
                                                <tbody>
                                                @foreach($referrers as $r)
                                                    <tr>
                                                        <td><a class="change"  href="{{ $url.'/'.$r->id }}">{{ $r->nombre }} {{ $r->apellido }}
                                                            </a>
                                                        </td>
                                                        <td><a href="{{ $url.'/'.$r->id }}" class="change "  href="">{{ $r->web }}</a></td>
                                                        <td><a href="{{ $url.'/'.$r->id }}"  class="change"  href="">{{ substr($r->email,0,15) }}</a></td>
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
                    <div class="span8">
                        <div class="widget widget-nopad">
                            <div class="widget-header">
                                <h3><i class="icon-bar-chart"></i> Last visit 8 days </h3>
                            </div>
                            <div class="widget-content">
                                <div class="widget big-stats-container">
                                    <div id="container" style="padding: 35px;min-width: 310px; height: 430px; max-width: 600px; margin: 0 auto;position:relative;">
                                        @if(isset($reports))
                                            <table id="referrersReport" class="table table-striped table-bordered">

                                                <thead>
                                                <th>Date</th>
                                                <th>Revenue Manager</th>
                                                <th>Revenue Publisher</th>
                                                <th>Clicks</th>
                                                <th>eCPM</th>
                                                <th>User</th>
                                                <th>Ad</th>
                                                </thead>
                                                <tbody>
                                                @foreach($reports as $r)
                                                    <tr>
                                                        <td>{{ substr($r->fecha ,0,  10)}}</td>
                                                        <td>{{ number_format($r->revenue * 0.05 ,2) }}</td>
                                                        <td>{{ number_format($r->revenue  ,2) }}</td>
                                                        <td>{{ number_format($r->click,0,'','.') }}</td>
                                                        <td>{{ substr($r->ecpm,0,6) }}</td>
                                                        <td>{{ $r->n_user }} {{ $r->a_user }}</td>
                                                        <td>{{ $r->ad_name }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>

                                            </table>
                                        @else
                                            <h1 style="color: gainsboro; padding-top: 35%; padding-left: 35%">NO DATA</h1>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span12" style="margin-left: 50%">
                <a href="{{ url('admin/referrer') }}" class="btn btn-primary btn-lg">Go Back</a>
            </div>
        </div>
        <br><br>
    </div>
    <!-- Modal Div -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <input type="text" id="date">
                    <input type="text" id="toDate">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="search" type="button" class="btn btn-primary">Search</a>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.footer')
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    @include('maxmedia.partials.notify')
@stop

@section('script')
    <script>
        $(document).on('ready', function () {

            var BASEURL = '{{ url() }}/';
            var url = window.location.href;
            var ayer =   $('#yesterday');
            var eightdays =   $('#8');
            var current =   $('#current');
            var last =   $('#last');
            var custom =   $('#custom');
            @if(isset($fecha))
                @if($fecha == 'Yesterday')
                    ayer.addClass('active');
            eightdays.removeClass('active');
            current.removeClass('active');
            last.removeClass('active');
            custom.removeClass('active');
            @endif
        @endif
           ayer.on('click', function () {
                        window.location.href=  BASEURL + 'referrer/' + 'reportReferrer/' + 'yesterday';
                    });
            @if(isset($fecha))
              @if($fecha == 'Eight Days')
                        eightdays.addClass('active');
            ayer.removeClass('active');
            current.removeClass('active');
            last.removeClass('active');
            custom.removeClass('active');
            @endif
     @endif
   eightdays.on('click', function () {
                        window.location.href=  BASEURL + 'referrer/' + 'reportReferrer/' + 'eight';
                    });

            @if(isset($fecha))
                @if($fecha == 'Current Month')
                   current.addClass('active');
            eightdays.removeClass('active');
            ayer.removeClass('active');
            last.removeClass('active');
            custom.removeClass('active');
            @endif
        @endif
         current.on('click', function () {
                        window.location.href=  BASEURL + 'referrer/' + 'reportReferrer/' + 'current';
                    });
            @if(isset($fecha))
              @if($fecha == 'Last Month')
                    last.addClass('active');
            eightdays.removeClass('active');
            ayer.removeClass('active');
            current.removeClass('active');
            custom.removeClass('active');
            @endif
        @endif
        last.on('click', function () {
                        window.location.href=  BASEURL + 'referrer/' + 'reportReferrer/' + 'last';
                    });
            @if(isset($fecha))

                @if(  strpos($fecha, "To :") > 0)

                    custom.addClass('active');
            eightdays.removeClass('active');
            current.removeClass('active');
            last.removeClass('active');
            ayer.removeClass('active');
            @endif
        @endif
            custom.on('click', function () {
                        custom.addClass('active');
                        eightdays.removeClass('active');
                        current.removeClass('active');
                        last.removeClass('active');
                        ayer.removeClass('active');
                    });
            $('#search').on('click', function () {
                var stringDate = $('#date').val();
                var date = stringDate.replace(/\//g, "-");
                var stringToDate = $('#toDate').val();
                var toDate = stringToDate.replace(/\//g,'-');
                window.location.href=  BASEURL + 'referrer/' + 'reportReferrer/' + 'custom/' + date + '/'+ toDate ;
            });

        });
    </script>
@stop
