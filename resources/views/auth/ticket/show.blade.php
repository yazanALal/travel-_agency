@extends('adminlte::page')

@section('title', 'Ticket Details')

@section('content_header')
    <h1>Ticket Details</h1>
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
                <p>Company Name: {{ $ticket->company->name }}</p>
                <p>City Name: {{ $ticket->city->name }}</p>
                <p>Start Date: {{ $ticket->date_s }}</p>
                <p>End Date: {{ $ticket->date_e }}</p>

                <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-primary">Edit Ticket</a>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
