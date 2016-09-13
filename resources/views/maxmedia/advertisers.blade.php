@extends('maxmedia.template')

@section('content')
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"><img class="img-responsive" src="images/logo_copia.png" width="150" alt="logof - copia"/>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li ><a href="{{ url('/publishers') }}">Publishers</a></li>
                <li class="active" ><a href="{{ url('/advertiser') }}">Advertisers</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/contact') }}">Register</a></li>
            </ul>
            @include('maxmedia.partials.form-login')
        </div>
    </div>
</nav

@include('maxmedia.partials.errors')
<br>
<div class="clearfix"></div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Advertisers</h1>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div id="#mycarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#mycarousel" data-slide-to="1"></li>
                        <li data-target="#mycarousel" data-slide-to="2"></li>
                        <li data-target="#mycarousel" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img class="img-responsive" src="images/advertisers1.gif"> 
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="images/advertisers2.gif">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="images/advertisers3.gif">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h1>A title</h1>
                <h3>A subtitle</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis
                    dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies
                    nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                    Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In
                    enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum
                    felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus
                    elementum semper nisi.</p>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="media-list">
                    <li class="media">
                        <a class="pull-left" href="#"><img class="media-object" src="images/ad1.png" height="64" width="64"></a>
                        <div class="media-body">
                            <h4 class="media-heading">Media heading</h4>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at,
                                tempus viverra turpis.</p>
                        </div>
                    </li>
                    <li class="media">
                        <a class="pull-left" href="#"><img class="media-object" src="images/ad2.png" height="64" width="64"></a>
                        <div class="media-body">
                            <h4 class="media-heading">Media heading</h4>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at,
                                tempus viverra turpis.</p>
                        </div>
                    </li>
                    <li class="media">
                        <a class="pull-left" href="#"><img class="media-object" src="images/ad3.png" height="64" width="64"></a>
                        <div class="media-body">
                            <h4 class="media-heading">Media heading</h4>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at,
                                tempus viverra turpis.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>

@include('maxmedia.partials.footer')
@include('maxmedia.partials.notify')
@include('maxmedia.partials.message')


@stop