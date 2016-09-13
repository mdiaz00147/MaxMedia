@extends('admin.tempalte-2')
@section('content')

<link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
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
            </ul>
        </div>
    </div>
</div>

<div class="">
    <div class="main-inner" style="">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3>Users</h3>
                        </div>
                        <div class="widget-content">
                            <a href="{{ route('admin.category.create') }}" class="btn btn-success btn-lg" style="width: 150px;">
                                <span class="icon-plus"></span>
                                Add Category
                            </a>
                            <br>
                            <br>
                            <table id="gest_usr_add" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" >
                                <thead>
                                <tr>
                                    <th style="text-align: center !important; color: #0000;">Edit</th>
                                    <th style="text-align: center !important;">Remove</th>
                                    <th style="text-align: center !important;">Name</th>
                                    <th style="text-align: center !important;">Creation</th>
                                </tr>
                                </thead><tbody>
                                @foreach($categorias as $category)
                                <tr>
                                    <td>
                                        <center>
                                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span> 
                                        </a>
                                    </center>
                                    </td>
                                    <td>
                                    <center>
                                        <br>
                                    {!! Form::open(['route' => ['admin.category.destroy', $category->id]]) !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true">Destroy</span>
                                    </button>
                                    </center>
                                    {!! Form::close() !!}
                                    </td>
                                    <td style="text-align: center !important;">{{ $category->nombre }}</td>
                                    <td style="text-align: center !important;">{{ $category->created_at }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

    </div>
    <!-- /container -->
</div>
<br>
<br>
<br>
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<br>
<br>
<br>
<br>
@include('admin.partials.footer')
@stop
@section('script')
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
@include('maxmedia.partials.notify')
<script type="text/javascript" src="{{ asset('js/admin/admin-report.js') }}"></script>
<script type="text/javascript">
$(document).ready(function($) {
    $('#gest_usr_add').DataTable({
        ordering: false,
        searching: true
    });
});
</script>
@stop
