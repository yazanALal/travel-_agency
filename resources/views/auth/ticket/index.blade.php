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
    <h1>Tickets</h1>

    <a href="{{ route('ticket.create') }}" class="btn btn-success">Create New Ticket</a>
    <form action="{{ route('ticket.index') }}" method="get" class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="startDateAddon">Search In Start Date</span>
        </div>
        <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
        <div class="input-group-append">
            <button class="btn btn-success" type="submit">Search</button>
        </div>
        <div class="input-group-prepend">
            <span class="input-group-text" id="endDateAddon">Search In End Date</span>
        </div>
        <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">

        <div class="input-group-append">
            <button class="btn btn-success" type="submit">Search</button>
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
                <th>Company ID</th>
                <th>City ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $tick)
            <tr>
                <td>{{ $tick->id }}</td>
                <td>{{ $tick->company_id }}</td>
                <td>{{ $tick->city_id }}</td>
                <td>{{ $tick->date_s }}</td>
                <td>{{ $tick->date_e }}</td>
                <td>
                    <a href="{{ route('ticket.show', $tick->id) }}" class="btn btn-info">Details</a>
                    <a href="{{ route('ticket.edit', $tick->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('ticket.delete', $tick->id) }}" method="post" style="display:inline;">
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