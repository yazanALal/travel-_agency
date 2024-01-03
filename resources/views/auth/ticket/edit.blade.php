<!-- @section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
@endsection -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

@extends('adminlte::page')

@section('title', 'Edit Ticket')

@section('content_header')
    <h1>Edit Ticket</h1>
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
        @method('POST')

        <div class="form-group">
            <label for="company_id">Company:</label>
            <select name="company_id" class="form-control">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $company->id == $ticket->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="city_id">City:</label>
            <select name="city_id" class="form-control">
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ $city->id == $ticket->city_id ? 'selected' : '' }}>{{ $city->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date_s">Start Date:</label>
            <input type="text" class="form-control" name="date_s" id="date_s" value="{{ $ticket->date_s }}">
        </div>

        <div class="form-group">
            <label for="date_e">End Date:</label>
            <input type="text" class="form-control" name="date_e" id="date_e" value="{{ $ticket->date_e }}">
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Update Ticket</button>
        </div>
    </form>
    <a href="{{ route('ticket.index') }}">Back to Ticket Details</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        flatpickr("#date_s", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        flatpickr("#date_e", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>
@stop
