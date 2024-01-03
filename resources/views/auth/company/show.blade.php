@extends('adminlte::page')

@section('title', 'Company Details')

@section('content_header')
    <h1>Company Details</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Company Name: {{ $company->name }}</h3>
                <p>Phone: {{ $company->phone }}</p>

                <a href="{{ route('company.edit', $company->id) }}" class="btn btn-primary">Edit Company</a>
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
