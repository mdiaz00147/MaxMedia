@extends('admin.tempalte-2')
@section('content')
<link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/buttons.dataTables.min.css')}}">
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
                <div class="span3">
                    <a href="{{ url('admin/user') }}" class="btn btn-primary btn-xl" style="width: 250px;">Users</a>
                </div>
                <div class="span3">
                    <a href="{{ url('admin/category') }}" class="btn btn-primary btn-xl" style="width: 250px;">Categories</a>
                </div>
                <div class="span3">
                    <a href="{{ url('admin/web') }}" class="btn btn-primary btn-xl" style="width: 250px;">Webs</a>
                </div>
                <div class="span3">
                    <a href="{{ url('admin/ad') }}" class="btn btn-primary btn-xl" style="width: 250px;">Ads</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-money"></i>
                            <h3>Placements</h3>
                        </div>
                        <div class="widget-content">
                            <a href="{{ route('admin.placement.create') }}" class="btn btn-success btn-lg" style="width: 150px;">
                                <span class="icon-plus"></span>
                                Add Placement
                            </a>
                            <br></br>
                            <table id="gest_admin" class="table table-responsive table-border table-border table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th style="text-align: center;">Edit</th>
                                    <th style="text-align: center;">Delete</th>
                                    <th style="text-align: center;">Add Revenue</th>
                                    <th style="text-align: center;">ID</th>
                                    <th style="text-align: center;">User Name</th>
                                    <th style="text-align: center;">Placement Name</th>
                                    <th style="text-align: center; width: 40px;;">Site</th>
                                    <th style="text-align: center;">Script</th>
                                    <th style="text-align: center;">User mail</th>
                                    
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($ads as $ad)
                                <tr>
                                    <!--Primer Boton-->
                                    <td>
                                        <a href="{{ route('admin.placement.edit', $ad->id_ad) }}" class="btn btn-primary" style="float: center;">
                                            <span class="icon-edit" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                    <!--Segundo Boton-->
                                    <td>
                                        <br>
                                        {!! Form::open(['route' => ['admin.placement.destroy', $ad->id_ad]]) !!}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                                            <span class="icon-eraser" aria-hidden="true"></span>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                    <!--Terce Boton-->
                                    <td>
                                        <a type="button" class="btn btn-warning " onclick="$('#moreId').val($(this).data('id'));" data-toggle="modal" data-target="#changeRevenue" data-id="{{ $ad->id_ad }}">
                                           <span class="icon-plus-sign"></span>
                                        </a>
                                    </td>

                                    <td>{{ $ad->id_ad }}</td>
                                    <td>{{ $ad->n_nombre }} {{ $ad->n_apellido }}</td>
                                    <td class="compact" style="font-size: 12px;">{{ $ad->n }}</td>
                                    <td class="compact" style="text-align: center;">{{ $ad->url }}</td>
                                    <td><input type="text" readonly value="{{ $ad->s }}" style="max-width: 80px;"/></td>
                                    <td>{{ $ad->email }}</td>
                                    
                                </tr>
                                @include('admin.partials.modal-changePlacement')
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

@include('admin.partials.footer')

@stop
@section('script')
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
@include('maxmedia.partials.notify')
<script type="text/javascript" src="{{ asset('js/admin/admin-report.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/admin/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/admin/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/admin/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/admin/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/admin/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/admin/buttons.print.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function($){
        $('#gest_admin').DataTable({
            
            ordering: true,
            searching: true,
            dom: 'Bftrip',
            buttons:[
            'excelHtml5',
            'pdfHtml5',
            {
                extend: 'print',
                customize: function(win){
                    $(win.document.body)
                    .css('font-size', '10pt')

                    $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit')

                },
            },
            ]


        });
    });
    $("#datepicker3").datepicker({
        maxDate:-1,
    });

</script>
@stop
