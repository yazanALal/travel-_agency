@extends('adminlte::page')

@section('title', 'Update Company')

@section('content_header')
    <h1>Update Company</h1>
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

    <form action="{{ route('company.update', $company->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Company Name:</label>
            <input type="text" class="form-control" name="name" value="{{ $company->name }}">
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone" value="{{ $company->phone }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Company</button>
    </form>
    <a href="{{ route('company.show', $company->id) }}">Back to Company Details</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
