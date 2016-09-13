@extends('admin.tempalte-2')
@section('content')

<link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
@include('admin.partials.nav')
@include('admin.partials.errors')
@include('admin.partials.message')
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li><a href="{{ url('referrer/home') }}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                <li ><a href="{{ url('referrer/report') }}"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
                <li><a href="{{ url('referrer/placements') }}"><i class="icon-money"></i><span>All Placements</span> </a></li>
                <li  class="active"><a href="{{ url('referrer/referrers') }}"><i class="icon-user-md"></i><span>All referrers</span> </a> </li>
                <li><a href="{{ route('refererr.report.referrer') }}"><i class="icon-bar-chart"></i><span>Statics</span> </a> </li>
                <li><a href="{{ url('referrer/account') }}"><i class="icon-user"></i><span>Account</span> </a> </li>
            </ul>
        </div>
    </div>
</div>
<div class="container text-center">

    <div class="page-header">
        <h1>
            <i class="fa fa-user"></i> WEBS <small>[ Agregar web ]</small>
        </h1>
    </div>

    <div class="container">

    </div>
    <div class="page">
        <center>

            {!! Form::open(['route'=>'referrer.web.store']) !!}

            <div class="form-group">
                <label for="name">Name:</label>

                {!!
                Form::text(
                'nombre',
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
                <label for="last_name">Url:</label>

                {!!
                Form::text(
                'url',
                null,
                array(
                'class'=>'form-control',

                'required' => 'required'
                )
                )
                !!}
            </div>

            <div class="form-group">
                <label class="control-label" for="category_id">Categories</label>
                {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <label class="control-label" for="category_id">Users</label>
                {!! Form::select('user_id', $users, null, ['class' => 'form-control ','id' => 'comboboxa']) !!}
            </div>

            <div class="form-group">
                <label for="address">Description:</label>

                {!!
                Form::textarea(
                'descripcion',
                null,
                array(
                'class'=>'form-control'
                )
                )
                !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Save', array('class'=>'btn btn-primary')) !!}
                <a href="{{ url('referrer/referrers') }}" class="btn btn-warning">Cancel</a>
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
