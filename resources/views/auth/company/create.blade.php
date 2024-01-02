@extends('adminlte::page')

@section('title', 'Create Company')

@section('content')
    <div class="container">
        <h1>Create Company</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('company.store') }}" method="post">
            @csrf

            <div class="form-group mb-3">
                <label for="name">Company Name:</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group mb-3">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
            </div>

            <button type="submit" class="btn btn-primary">Create Company</button>
        </form>

        <a href="{{ route('company.index') }}" class="btn btn-secondary">Back to Companies</a>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script>
        console.log('HI!');
    </script>
@endsection
