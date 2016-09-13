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
                    <li ><a href="{{ route('placement') }}"><i class="icon-bar-chart"></i><span>Placements</span> </a> </li>
                    <li class="active"><a href="{{ route('admin.referrer.index') }}"><i class="icon-user-md"></i><span>Referrers</span> </a> </li>
                    <li class=""> </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main-inner">
            <div class="container">
                <br>
                <br>
                <br>
                <div class="row">
                    <div class="span12">
                        <div class="widget">
                            <div class="widget-header">
                                <i class="icon-plus"></i>
                                <h3>Referrers</h3>
                            </div>
                            <div class="widget-content">
                                <a href="{{ route('admin.referrer.create') }}" class="btn btn-success">
                                    <span class="icon-plus"></span>
                                    Add referrer
                                </a>
                                <br>
                                <br>
                                <table id="gest_usr_admin" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center !important;">Edit</th>
                                        <th style="text-align: center !important;">Remove</th>
                                        <th style="text-align: center !important;">Statistics</th>
                                        <th style="text-align: center !important;">Name</th>
                                        <th style="text-align: center !important;">Email</th>
                                        <th style="text-align: center !important;">Paypal</th>
                                        <th style="text-align: center !important;">Url  Referrer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($referrers as $r)
                                        <tr>
                                            <td>
                                                <center>
                                                <a href="{{ route('admin.referrer.edit', $r) }}" class="btn btn-primary">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                                </a>
                                                </center>
                                            </td>
                                            <td>
                                                <br>
                                                {!! Form::open(['route' => ['admin.user.destroy', $r]]) !!}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <center>
                                                <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true">Destroy</span>
                                                </button>
                                                </center>
                                                {!! Form::close() !!}
                                            </td>
                                            <td>
                                                <center>
                                                <a href="{{  route('admin.referrer.show',$r->id) }}" class="btn btn-primary"><span class="icon-bar-chart"></span></a>
                                                </center>
                                            </td>
                                            <td style="text-align: center;">{{ $r->nombre }}-{{ $r->apellido }}</td>
                                            <td style="text-align: center;">{{ $r->email }}</td>
                                            <td style="text-align: center;">{{ $r->paypal_email }}</td>
                                            <td style="text-align: center;"><a href="{{ url('invited_by/').'/'.$r->code_referrer }}">{{ url('invited_by/').'/'.$r->code_referrer }}</a></td>
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
    <br>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <br>
    <br>
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
