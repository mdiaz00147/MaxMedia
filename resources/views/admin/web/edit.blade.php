@extends('admin.tempalte-2')
@section('content')
<link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('/css/admin/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/chosen.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/prism.css')}}">
@include('admin.partials.nav')
@include('admin.partials.errors')
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
                <li class=""> </li>
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

            {!! Form::model($web, array('route' => array('admin.web.update', $web->id))) !!}
            <input type="hidden" name="_method" value="PUT">
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
                {!! Form::select('categoria_id', $categorias, null, ['class' => 'chosen-select', 'id']) !!}
            </div>

            <div class="form-group">
                <label class="control-label" for="category_id">Users</label>
                {!! Form::select('user_id', $users, null, ['class' => 'chosen-select ','id' => 'combobox']) !!}
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
                <a href="{{ route('admin.web.index') }}" class="btn btn-warning">Cancel</a>
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
<script type="text/javascript" src="{{ asset('js/admin/chosen.jquery.js')}}"></script>
<script type="text/javascript">
    $(".chosen-select").chosen();
</script>
@stop