@extends('admin.tempalte-2')
@section('content')

    <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    @include('admin.partials.nav')

    @include('admin.partials.message')
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li class=""><a href="{{ url('admin/home') }}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li><a href="{{ url('admin/report') }}"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
                    <li ><a href="{{ route('admin.payment.index') }}"><i class="icon-money"></i><span>Payments</span> </a></li>
                    <li class="active"><a href="{{ route('placement') }}"><i class="icon-bar-chart"></i><span>Placements</span> </a> </li>
                   <li ><a href="{{ route('admin.referrer.index') }}"><i class="icon-user-md"></i><span>Referrers</span> </a> </li>
                </ul>
            </div>
        </div>
    </div>
    @include('admin.partials.errors')
    <div class="container text-center">

        <div class="page-header">
            <h1>
                <i class="fa fa-user"></i> Change <small>[ Revenue ]</small>
            </h1>
        </div>

        <div class="container">

        </div>
        <div class="page">
            <center>

                {!! Form::model($report, array('route' => array('admin.ad.update.revenue', $report->id))) !!}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="name">Impresiones:</label>

                    {!!
                    Form::text(
                    'impresiones',
                    null,
                    array(
                    'class'=>'form-control',

                    'autofocus' => 'autofocus',
                    'required' => 'required'
                    )
                    )
                    !!}
                </div>

                <div class="form-group">
                    <label for="user">Clicks:</label>

                    {!!
                    Form::text(
                    'click',
                    null,
                    array(
                    'class'=>'form-control',

                    'required' => 'required'
                    )
                    )
                    !!}
                </div>

                <div class="form-group">
                    <label for="address">CTR:</label>

                    {!!
                    Form::text(
                    'ctr',
                    null,
                    array(
                    'class'=>'form-control',
                    'required' => 'required'
                    )
                    )
                    !!}
                </div>


                <div class="form-group">
                    <label for="address">eCPM:</label>

                    {!!
                    Form::text(
                    'ecpm',
                    null,
                    array(
                    'class'=>'form-control'
                    )
                    )
                    !!}
                </div>

                <div class="form-group">
                    <label for="address">Revenue:</label>

                    {!!
                    Form::text(
                    'revenue',
                    null,
                    array(
                    'class'=>'form-control'
                    )
                    )
                    !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Save', array('class'=>'btn btn-primary')) !!}
                    <a href="{{ url('admin/placement') }}" class="btn btn-warning">Cancel</a>
                </div>

                {!! Form::close() !!}
            </center>

        </div>

    </div>
    @include('admin.partials.footer')
    @include('maxmedia.partials.notify')
@stop
@section('script')
    <script type="text/javascript" src="{{ asset('js/admin/admin-report.js') }}"></script>
@stop
