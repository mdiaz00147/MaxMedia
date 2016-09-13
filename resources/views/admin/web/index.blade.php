@extends('admin.tempalte-2')
@section('content')

<link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('/css/adim/jquery-ui.css')}}">
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
<div class="">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div clas="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-plus"></i>
                            <h3>Webs</h3>
                        </div>
                        <div class="widget-content">
                            <a href="{{ route('admin.web.create') }}" class="btn btn-warning">
                            <span class="icon-plus"></span>
                            Add Web
                            </a> 
                            <br>
                            <br>
                            <table  id="gest_webs_admin" class="table table-responsive table-striped table-bodered table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th style="text-align: center !important;">Edit</th>
                                    <th style="text-align: center !important;">Remove</th>
                                    <th style="text-align: center !important;">Name</th>
                                    <th style="text-align: center !important;">Url</th>
                                    <th style="text-align: center !important;">Category</th>
                                    <th style="text-align: center !important;">User</th>
                                </tr> 
                                </thead>
                                <tbody>
                                     @foreach($webs as $web)
                                    <tr>
                                        
                                        <td>
                                            <center>
                                            <a href="{{ route('admin.web.edit', $web->id) }}" class="btn btn-primary" style="">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                            </a>
                                            </center>
                                        </td>
                                        
                                        <td>
                                            {!! Form::open(['route' => ['admin.web.destroy', $web->id]]) !!}
                                            <br>
                                            <center>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Destroy</span>
                                            </button>
                                            </center>
                                            {!! Form::close() !!}
                                        </td>
                                        <td style="text-align: center !important;">{{ $web->nombre }}</td>
                                        <td style="text-align: center !important;">{{ $web->url }}</td>
                                        <td style="text-align: center !important;">{{ $web->c_nombre }}</td>
                                        <td style="text-align: center !important;">{{ $web->n_user }}-{{ $web->a_user }}</td>
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
<br>
<br>
<br>
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<br/>
@include('admin.partials.footer')

@stop
@section('script')
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
@include('maxmedia.partials.notify')
<script type="text/javascript" src="{{ asset('js/admin/admin-report.js') }}"></script>
<script type="text/javascript"`src="{{asset('js/admin/chosen.jquery.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function($){
        $('#gest_webs_admin').DataTable({
            ordering: true,
            searching: true
            
        });
    })
</script>
<script type="text/javascript">
    $('.chosen-select').chosen();
</script>
@stop
