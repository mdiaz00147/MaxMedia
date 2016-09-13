@extends('admin.tempalte-2')
@section('content')
<link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
                <li class=""><a href="{{ route('admin.referrer.index') }}"><i class="icon-user-md"></i> <span>Referrer</span></a></li>
                <li class=""> </li>
            </ul>
        </div>
    </div>
</div>

<div class="">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-plus"></i>
                            <h3>Users</h3>
                        </div>
                        <div class="widget-content">
                            <a href="{{ route('admin.user.create') }}" class="btn btn-success">
                        <span class="icon-plus"></span>
                        Add user
                            </a>
                            <br>
                            <br>
                            <table id="gest_usr_admin" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Edit</th>
                                        <th>Remove</th>
                                        <th>Name</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                        <th>Paypal</th>
                                        <th>Direction</th>
                                        <th>Country</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-primary">
                                             <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                            </a>
                                        </td>
                                        <td>
                                            <br>
                                            {!! Form::open(['route' => ['admin.user.destroy', $user]]) !!}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Destroy</span>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                        <td>{{ $user->nombre }}-{{ $user->apellido }}</td>
                                        <td>{{ $user->telefono }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->paypal_email }}</td>
                                        <td>{{ $user->direccion_envio }}</td>
                                        <td>{{ $user->pais }}</td>
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
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.1.1/js/buttons.html5.min.js"></script>
<script type="text/javascript">
$(document).ready(function($) {
    $('#gest_usr_admin').DataTable({
        ordering: false,
        searching: true,
        dom: 'Bftrip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
});
</script>
@stop
