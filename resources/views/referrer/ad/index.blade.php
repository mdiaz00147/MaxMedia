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
                    <li ><a href="{{ url('referrer/home') }}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li ><a href="{{ url('referrer/report') }}"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
                    <li><a href="{{ url('referrer/placements') }}"><i class="icon-money"></i><span>All Placements</span> </a></li>
                    <li class="active"><a href="{{ url('referrer/referrers') }}"><i class="icon-user-md"></i><span>All referrers</span> </a> </li>
                    <li><a href="{{ route('refererr.report.referrer') }}"><i class="icon-bar-chart"></i><span>Statics</span> </a> </li>
                    <li><a href="{{ url('referrer/account') }}"><i class="icon-user"></i><span>Account</span> </a> </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <br>
                <div class="row">
                    <div class="span12">
                        <div class="widget">
                            <div class="widget-header">
                                <i class="icon-money"></i>
                                <h3>Placements</h3>
                            </div>
                            <div class="widget-content">
                                <a href="{{ route('referrer.ad.create') }}" class="btn btn-success btn-lg" style="width: 150px;">
                                    <span class="icon-plus"></span>
                                    Add Placement
                                </a>
                                <br><br>
                                <table id="gest_admin" class="display" cellspacing="0" style="width: auto;">
                                    <thead>
                                    <tr>
                                        <th>Edit</th>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Placement Name</th>
                                        <th>AD name</th>
                                        <th>Site</th>
                                        <th>Script</th>
                                        <th>User mail</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($ads as $ad)
                                        <tr>
                                            <td>
                                                <a href="{{ route('referrer.ad.edit', $ad->id_ad) }}" class="btn btn-primary">
                                                    <span class="icon-edit" aria-hidden="true"></span>
                                                </a>
                                            </td>
                                            <td>{{ $ad->id_ad }}</td>
                                            <td>{{ $ad->n_nombre }} {{ $ad->n_apellido }}</td>
                                            <td class="compact">{{ $ad->n }}</td>
                                            <td>{{ $ad->n_ad }}</td>
                                            <td class="compact"><input style="max-width:150px;" type="text" readonly value="{{ $ad->url }}"/></td>
                                            <td><input type="text" readonly value="{{ $ad->s }}"/></td>
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

    </script>
@stop
