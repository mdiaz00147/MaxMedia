@extends('admin.tempalte-2')

<style>
    .combobox{
        position: relative;
        display: inline-block;
    }
    .custom-combobox-toggle {
        position: absolute;
        top: 0;
        bottom: 0;
        margin-left: -1px;
        padding: 0;
    }
    .custom-combobox-input {
        margin: 0;
        padding: 0px 0px;
    }
</style>

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
                <li ><a href="{{ url('admin/home') }}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                <li class="active"><a href="{{ url('admin/report') }}"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
                <li><a href="{{ route('admin.payment.index') }}"><i class="icon-money"></i><span>Payments</span> </a></li>
                <li><a href="{{ url('admin/placement') }}"><i class="icon-bar-chart"></i><span>Placement</span> </a> </li>
                 <li ><a href="{{ route('admin.referrer.index') }}"><i class="icon-user-md"></i><span>Referrers</span> </a> </li>
            </ul>
        </div>

    </div>
</div>
<br>

<!--Aqui va l atable-->
<div class="container ">
    <div class="main-inner">
        <div class="container">
            <div class="">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <i class="icon-list"></i>
                            <h3>Request</h3>
                        </div>
                        <div class="widget-content" >
                            <table id="tbl_request" class="table table-responsive table-hover table-bordered table-striped" cellspacing="0" width="100%" style="font-size: 13px;">                                
                                <thead>
                                <tr>
                                    <th>Cancel</th>
                                    <th style="text-align: center !important; width: 200px;">Date</th>
                                    <th style="text-align: center !important;">Quantity</th>
                                    <th style="text-align: center !important;">Description</th>
                                    <th style="text-align: center !important;"class="compact">User</th>
                                    <th style="text-align: center !important;">Paid</th>
                                    <th style="text-align: center !important;">Paypal Email</th>
                                    <th style="text-align: center !importna;">Deliver</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($solicitudes as $solicitud)
                                <tr>
                                    <td class="compact">
                                        <br>
                                        {!! Form::open(['route' => ['admin.payment.destroy', $solicitud->id]]) !!}
                                        <input type="hidden" name="_method" value="DELETE" style="float: center;">
                                        <button onClick="return confirm('Delete register?')" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true">Delete</span>
                                        </button>
                                        {!! Form::close() !!}
                                    </td>
                                    <td style="text-align: center; max-width: auto !important;">{{ date('Y-m-d',strtotime($solicitud->created_at)) }}</td>
                                    <td>
                                     @if($solicitud->pagada == 0)
                                        <input
                                            style="min-height: 50px; max-width: 80px"
                                            type="number"
                                            min="1"
                                            step="10"
                                            max="{{ $solicitud->cantidad}}"
                                            value="{{ $solicitud->cantidad}}"
                                            id="product_{{ $solicitud->id }}"
                                            style="text-align: center;"
                                            >
                                        <a
                                            href="#"
                                            class="btn btn-warning btn-update-item"
                                            data-href="{{ route('update-quantity', $solicitud->id) }}"
                                            data-id = "{{ $solicitud->id }}"
                                            >
                                            <i class="icon icon-refresh"></i> </td>
                                    @else
                                    <input
                                        style="min-height: 25px; max-width: 85px; text-align: center; color: #000000;"
                                        type="number"
                                        min="1"
                                        step="10"
                                        max="{{ $solicitud->cantidad}}"
                                        value="{{ $solicitud->cantidad}}"
                                        readonly
                                    >
                                    @endif
                                    <td class="compact">{{ $solicitud->descripcion}}</td>
                                    <td class="compact">{{ $solicitud->email }}</td>
                                    <td class="compact">@if($solicitud->pagada == 1) SI @else NO @endif </td>
                                    <td style="max-width: auto !important;">{{ $solicitud->paypal_email }}</td>
                                    <td class="compact">
                                        @if($solicitud->pagada == 0)
                                        {!! Form::open(['route' => ['paid']]) !!}
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="cantidad" value="{{ $solicitud->cantidad }}"/>
                                        <input type="hidden" name="id" value="{{ $solicitud->id }}"/>
                                        <input type="hidden" name="id_user" value="{{ $solicitud->id_user }}"/>
                                        <button id="payment" onClick="return confirm('Pai register?')" class="btn btn-primary">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true">Completed</span>
                                        </button>
                                        {!! Form::close() !!}
                                        @endif
                                    </td>
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
<!-- fin de la tabla-->

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
@include('admin.partials.footer')

<script src="{{ asset('js/sweetalert.min.js') }}"></script>
@include('maxmedia.partials.notify')
@stop
@section('script')
<script>
    $(document).ready(function() {
        $(".btn-update-item").on('click', function(e){
            e.preventDefault();

            var id = $(this).data('id');
            var href = $(this).data('href');
            var quantity = $("#product_" + id).val();
            window.location.href = href + "/" + quantity;
        });
    });
</script>
<script type="text/javascript" src="{{ asset('js/admin/admin-report.js') }}"></script>
<script type="text/javascript">
$(document).ready(function($) {
    $('#tbl_request').DataTable({
        ordering: true,
        searching: true,
    });
});
</script>
@stop
