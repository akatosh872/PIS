@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="{{ asset('banners/banner1.jpg') }}" width="500px" height="500px">
        <img src="{{ asset('banners/banner2.jpg') }}" width="500px" height="500px">

{{--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
{{--    <div class="carousel-inner">--}}
{{--        <div class="carousel-item active">--}}
{{--            <img src="{{ asset('banners/banner1.jpg') }}" class="d-block" alt="Банер 1">--}}
{{--        </div>--}}
{{--        <div class="carousel-item">--}}
{{--            <img src="{{ asset('banners/banner2.jpg') }}" class="d-block" alt="Банер 2">--}}
{{--            <div class="carousel-caption d-none d-md-block">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
    </div>
@endsection
