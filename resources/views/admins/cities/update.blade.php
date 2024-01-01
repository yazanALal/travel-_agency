@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>City's</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('admins.cities.update', $cities->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">name</label>
                        <input type="text" name="name" value="{{ $cities->name }}" class="form-control"
                            id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Country</label>
                        <input type="numper" name="country" value="{{ $cities->country }}" class="form-control"
                            id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>
                </form>
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
