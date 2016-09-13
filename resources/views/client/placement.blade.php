    @extends('admin.tempalte-2')
    @section('content')
    <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    @include('admin.partials.nav')
    @include('client.partials.modal')
    @include('client.partials.modal-placement')
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li class=""><a href="{{ url('client/home') }}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li><a href="{{ url('client/report') }}"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
                    <li ><a href="{{ route('client.payment.index') }}"><i class="icon-money"></i><span>Payments</span> </a></li>
                    <li class="active"><a href="{{ url('client/placement') }}"><i class="icon-bar-chart"></i><span>Placements</span> </a> </li>
                    <li><a href="{{ url('client/account') }}"><i class="icon-user"></i><span>Account</span> </a> </li>
                    <li><a href=""> </a></li>
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
                <div class="row">
                    <div class="span12">
                        <div class="widget">
                            <div class="widget-content">
                                <a
                                    href="#"
                                    class="btn btn-primary"
                                    data-toggle="modal"
                                    data-target="#myModal2"
                                    >
                                    <i class="icon-plus"></i> Add placement
                                </a>
                                <br>
                                <table id="example" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Placement</th>
                                            <th>Site</th>
                                            <th>Description</th>
                                            <th>AD</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($ads as $ad)
                                            <tr>
                                                <td>@if($ad->tipo == 'pequeño')<i class="icon-eye-open"></i>@endif  @if($ad->tipo == 'mediano')<i class="icon-play-sign"></i>@endif @if($ad->tipo == 'popup')<i class="icon-external-link-sign"></i>@endif </td>
                                                <td>{{ $ad->nombre_ad_web }}</td>
                                                <td>{{ $ad->web }}</td>
                                                <td>{{ $ad->descripcion }}</td>
                                                <td>{{ $ad->nombre_ad }}</td>
                                                <td>    
                                                    <a
                                                        href="#"
                                                        class="btn btn-primary btn-detalle-pedido"
                                                        data-path=""
                                                        data-toggle="modal"
                                                        data-target="#myModal"
                                                        data-id="{{$ad->id_ad}}"
                                                        data-token="{{ csrf_token() }}"
                                                        >
                                                        <i class="icon-code"></i>
                                                    </a>
                                                    <a href="{{ $ad->web }}" target="_blank" class="btn btn-default"><i class="icon-eye-open"></i></a>
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
@include('admin.partials.errors')
@include('admin.partials.message')
<br>
<br>
<br>
<br>
<br>
<br>
@include('admin.partials.footer')
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