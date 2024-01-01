@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Company's</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('admins.customers.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Gender</label>
                        <input type="Gender" name="gender" class="form-control" id="exampleFormControlInput1"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">phone</label>
                        <input type="numper" name="phone" class="form-control" id="exampleFormControlInput1"
                            placeholder="">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">add</button>
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
