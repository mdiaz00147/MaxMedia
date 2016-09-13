@extends('admin.tempalte-2')
@section('content')
    <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    @include('admin.partials.nav')
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
    @include('admin.partials.errors')
    <br>
    <br>
    <br>
    <br>
    <div class="main" style="border-bottom: 0px !important;">
        <div class="main-inner">
            <div class="container">
                <div class="row" >
                    <div class="span4">
                        <a href="{{ route('referrer.refers.create') }}" class="btn btn-primary btn-xl" style="width: 90%;">New Referrer</a>
                    </div>
                    <div class="span4">
                        <a href="{{ url('referrer/web') }}" class="btn btn-primary btn-xl" style="width: 90%;">Show Webs</a>
                    </div>
                    <div class="span4">
                        <a href="{{ url('referrer/ad') }}" class="btn btn-primary btn-xl" style="width: 90%;">Show Ads</a>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="span12">
                        <div class="widget">
                            <div class="widget-content">
                                <br>
                                <table id="example" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <?php $i = 1;?>
                                        <th>#</th>
                                            <th>Edit</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>Country</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($referrers as $r)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td><center><a href="{{ route('referrer.refers.edit',$r->id)  }}" class="btn btn-warning"><span class="icon-pencil"></span></a></center></td>
                                            <td>{{ $r->nombre }}{{ $r->apellido }}</td>
                                            <td>{{ $r->email }}</td>
                                            <td>{{ $r->pais }}</td>
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
    @include('admin.partials.errors')
    @include('admin.partials.message')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    @include('admin.partials.footer')
            <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    @include('maxmedia.partials.notify')
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#example').DataTable({
                "scrollY":"400px",
                "scrollCollapse":true,
                "paging":true
            });

        });
    </script>
    <script>
        $(document).ready(function(){
            $(".btn-detalle-pedido").on('click', function(e){
                e.preventDefault();
                var id_pedido = $(this).data('id');
                var url = BASEURL + "client/placement-code"
                var token = $(this).data('token');
                var modal_title = $(".modal-title");
                var modal_body = $(".modal-body");
                var insert = $(".modal-body textarea")
                var loading = '<p><i class="icon-remove-circle icon-spin"></i></p>';
                var data = {'_token' : token, 'id_ad' : id_pedido};
                modal_title.html('Script');
                modal_body.html(loading);
                $.post(
                        url,
                        data,
                        function(data){
                            modal_body.text(data.script);
                        },
                        'json'
                );

            });
        });
    </script>
@stop