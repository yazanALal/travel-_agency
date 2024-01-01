@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Company's</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('admins.customers.update', $customers->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">name</label>
                        <input type="text" name="name" value="{{ $customers->name }}" class="form-control"
                            id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" name="email" value="{{ $customers->email }}" class="form-control"
                            id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Gender</label>
                        <input type="gender" name="gender" value="{{ $customers->gender }}" class="form-control"
                            id="exampleFormControlInput1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">phone</label>
                        <input type="numper" name="phone" value="{{ $customers->phone }}" class="form-control"
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
