@extends('maxmedia.template')
@section('content')
@include('maxmedia.partials.errors')
@include('maxmedia.partials.nav')


@include('maxmedia.partials.carrousel')
@include('maxmedia.partials.max')

@include('maxmedia.partials.footer')
@include('maxmedia.partials.message')
@stop
@section('script')
@include('maxmedia.partials.notify')
@stop