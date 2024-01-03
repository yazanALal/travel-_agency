<!-- resources/views/edit.blade.php -->

@extends('adminlte::page')

@section('title', 'Edit Company')

@section('content_header')
<h1>Edit Company</h1>
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
    @method('POST')

    <div class="form-group">
        <label for="name">Company Name:</label>
        <input type="text" class="form-control" name="name" value="{{ $company->name }}">
    </div>

    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" name="phone" value="{{ $company->phone }}">
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Update Company</button>
        <a href=" route('company.update', $company->id) "></a>
    </div>
</form>
<a href="{{ route('company.index') }}">Back to Company Details</a>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop