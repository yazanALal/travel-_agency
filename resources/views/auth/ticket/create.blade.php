<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@extends('adminlte::page')

@section('title', 'Create Ticket')

@section('content_header')
    <h1>Create Ticket</h1>
@stop
@section('content')
    <div class="container">
        <h1>Create Ticket</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ticket.store') }}" method="post">
            @csrf

            <div class="form-group mb-3">
                <label for="company_id">Company:</label>
                <select name="company_id" class="form-control">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="city_id">City:</label>
                <select name="city_id" class="form-control">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="date_s">Start Date:</label>
                <input type="date" class="form-control" name="date_s" value="{{ old('date_s') }}">
            </div>

            <div class="form-group mb-3">
                <label for="date_e">End Date:</label>
                <input type="date" class="form-control" name="date_e" value="{{ old('date_e') }}">
            </div>

            <button type="submit" class="btn btn-primary">Create Ticket</button>
        </form>

        <a href="{{ route('ticket.index') }}" class="btn btn-secondary">Back to Tickets</a>
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
