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
            <a class="navbar-brand" href="{{ url('/') }}"> <img class="img-responsive" src="images/logo_copia.png" width="150" alt="logof - copia"/>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li ><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/publishers') }}">Publishers</a></li>
                <li><a href="{{ url('/advertiser') }}">Advertisers</a></li>
                <li class="active"><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/contact') }}">Register</a></li>
            </ul>
            @include('maxmedia.partials.form-login')
        </div>
    </div>
</nav

@include('maxmedia.partials.errors')

<br>
<br>
<br>
<div class="clearfix"></div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Who we are?</h1>
            </div>
        </div>
    </div>
</div>
<div class="section" align="center">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p class="text-center" style=" text-align: justify;">
                    Max Corp Media, is an online advertising company founded in the year 2015 with the goal of help all the web master to increase their revenue. As well as the advertisers to get bigger sales on their products thanks to our Contextual and GEO Targeret ads.
                    <br>
                </p>
                <p class="text-center" style=" text-align: justify;">
                    Our bussines model is based into the fixed CPM's and not in the revenue share. We know our clients needs and thats why we switch every day acording to your needs.
                    <br>
                </p>
                <p class="text-center" style=" text-align: justify;">
                    The team is conformed of a group of programmers, graphic designers and merchandisers, all of them working every day to find out the best way to increase the publisher revenue and our advertising team.
                </p>
                <p class="text-center" style=" text-align: justify;">
                    We are part of Psikemedia LLC. A private start up company established in Fort Lauderdale, Florida.
                </p>
            </div>
            <div class="col-md-4">
                <p class="text-center" >
                    <img src="/images/fotso-maxcorp-2.gif">
                </p>
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