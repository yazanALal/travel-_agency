@extends('adminlte::page')

@section('title', 'Update Ticket')

@section('content_header')
    <h1>Update Ticket</h1>
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

    <form action="{{ route('ticket.update', $ticket->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="company_id">Company ID:</label>
            <input type="text" class="form-control" name="company_id" value="{{ $ticket->company_id }}">
        </div>

        <div class="form-group">
            <label for="city_id">City ID:</label>
            <input type="text" class="form-control" name="city_id" value="{{ $ticket->city_id }}">
        </div>

        <div class="form-group">
            <label for="date_s">Start Date:</label>
            <input type="text" class="form-control" name="date_s" value="{{ $ticket->date_s }}">
        </div>

        <div class="form-group">
            <label for="date_e">End Date:</label>
            <input type="text" class="form-control" name="date_e" value="{{ $ticket->date_e }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Ticket</button>
    </form>
    <a href="{{ route('ticket.show', $ticket->id) }}">Back to Ticket Details</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
