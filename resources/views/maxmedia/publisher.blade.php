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
                <li class="active"><a href="{{ url('/publishers') }}">Publishers</a></li>
                <li><a href="{{ url('/advertiser') }}">Advertisers</a></li>
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
            <div class="col-md-12" style="padding-top: 40px; padding-bottom: 40px">
                <h1 class="text-center" style="text-transform: uppercase;">Publishers, get what's right for you</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4" style="text-align: justify;">
                <img src="/images/how.gif" class="img-responsive" width="300px">
                <h2>How to Work it</h2>
                <p>Our system detects what is better for you:
                <ol>
                    <li>Campaign Auto Optimization</li>
                    <li>Self-serve platform</li>
                    <li>Geo and device targeting</li>
                    <li>User-friendly interface</li>
                </ol>
                </p>
            </div>
            <div class="col-md-4" style="text-align: justify;">
                <img src="/images/profi.gif" class="img-responsive" width="300px">
                <h2>Get it on time!</h2>
                <p>We really want you to be happy. That's why we have designed this advantages for you:
                <ol>
                    <li>Paypal, Payoneer and Wire payments.</li>
                    <li>Daily payments when you reach $10</li>
                    <li>Geo and device targeting</li>
                </ol>
                </p>
            </div>
            <div class="col-md-4" style="text-align: justify;">
                <img src="/images/worldwide.gif" class="img-responsive" width="300px">
                <h2>Support 24/7</h2>
                <p>You can feel free to contact us anytime any day,  just send a request by our platform. Or better call us on skype whenever you need.
                    <br>For more information just add us on skype as <span style="color:#4285f4" >angelesmaxcorp</span> and we will get back to you instantly.
                    </p>
            </div>
        </div>
    </div>
</div>
<div class="section" align="center">
    <div class="container" >
        <div class="row">
            <div class="col-md-4 " >
            </div>
            <div class="col-md-4 "  align="center">
                <a style="font-size: 34px" href="http://maxcorpmedia.com/contact"  class="btn btn-success">Get started now!</a>
            </div>
            <div class="col-md-4 " >
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