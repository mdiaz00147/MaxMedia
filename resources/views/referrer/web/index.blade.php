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
                            <a href="{{ route('referrer.web.create') }}" class="btn btn-warning">
                            <span class="icon-plus"></span>
                            Add Web
                            </a> 
                            <br>
                            <br>
                            <table  id="gest_webs_admin" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Edit</th>
                                    <th>Name</th>
                                    <th>Url</th>
                                    <th>Category</th>
                                    <th>User</th>
                                </tr> 
                                </thead>
                                <tbody>
                                     @foreach($webs as $web)
                                    <tr>
                                        <td>
                                            <a href="{{ route('referrer.web.edit', $web->id) }}" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true">Edit</span>
                                            </a>
                                        </td>
                                        <td>{{ $web->nombre }}</td>
                                        <td>{{ $web->url }}</td>
                                        <td>{{ $web->c_nombre }}</td>
                                        <td>{{ $web->n_user }}-{{ $web->a_user }}</td>
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

<script type="text/javascript">
    $(document).ready(function($){
        $('#gest_webs_admin').DataTable({
            ordering: false,
            searching: true
            
        });
    })
</script>
@stop
