@extends('adminlte::page')

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
    <h1>Companies</h1>

    <a href="{{ route('company.create') }}" class="btn btn-success">Create New Company</a>
    <form action="{{ route('company.index') }}" method="get" class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." name="query" value="{{ request('query') }}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($company as $co)
            <tr>
                <td>{{ $co->id }}</td>
                <td>{{ $co->name }}</td>
                <td>{{ $co->phone }}</td>
                <td>
                    <a href="{{ route('company.show', $co->id) }}" class="btn btn-info">Details</a>
                    <a href="{{ route('company.edit', $co->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('company.delete', $co->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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