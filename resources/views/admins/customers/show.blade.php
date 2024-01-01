@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Customer's</h1> --}}
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <label for="">Name : </label>
                <div>{{ $customer->name }}</div><br>
                <label for="">Email : </label>
                <div>{{ $customer->email }}</div><br>
                <label for="">Gender : </label>
                <div>{{ $customer->gender }}</div><br>
                <label for="">Phone : </label>
                <div>{{ $customer->phone }}</div>
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
