@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12"><br>
                <div id="carouselExampleControls" class="carousel slide mx-auto text-center" data-ride="carousel"
                    style="max-width: 80%;" data-interval="2000">
                    <div class="carousel-inner">
                        @foreach ($hotels->hotel_images as $key => $hotel)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img class="d-block w-100" src="{{ asset('storage/' . $hotel->buf) }}"
                                    alt="Slide {{ $key + 1 }}" height="300">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <br><br>
                <label for="">Name : </label>
                <div class="shadow-sm p-3 mb-5 bg-body rounded" style="width: 100%;">{{ $hotels->name }}</div>
                <label for="">phone : </label>
                <div class="shadow-sm p-3 mb-5 bg-body rounded" style="width: 100%;">{{ $hotels->phone }}</div>
                <label for="">city : </label>
                <div class="shadow-sm p-3 mb-5 bg-body rounded" style="width: 100%;">{{ $hotels->city->name }}</div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
