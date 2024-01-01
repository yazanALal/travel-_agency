@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>City's</h1> --}}
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <label for="">Name : </label>
                <div>{{ $city->name }}</div><br>
                <label for="">country : </label>
                <div>{{ $city->country }}</div><br>
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
