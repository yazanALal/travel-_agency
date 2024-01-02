
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
  
<form action="{{route('booking-create')}}" method="POST">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger" id="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Create Booking</h5>
            </div>

            

            <div class="form-group">
                <label for="customer">Customer Name:</label>
                <select id="customer" name="customer_id" class="form-control">
                    <option disabled selected>Select customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="ticket">Ticket:</label>
                <select id="ticket" name="ticket_id" class="form-control">
                    <option disabled selected>Select Ticket</option>
                    @foreach ($cities as $city)
                        <option disabled> tickets for {{ $city->name }}</option>
                        @foreach ($tickets as $ticket)
                            @if ($ticket->city_id == $city->id)
                                <option value="{{ $ticket->id }}" style="font-weight: bold;">Go date {{ $ticket->date_s }},Back date {{ $ticket->date_e }},Company {{ $ticket->company->name }}</option>
                            @endif
                        @endforeach
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="select-city">Hotel:</label>
                <select id="select-city" name="hotel_id" class="form-control">
                    <option disabled selected>Select Hotel</option>
                    @foreach ($cities as $city)
                        <option disabled> hotels in {{ $city->name }}</option>
                        @foreach ($hotels as $hotel)
                            @if ($hotel->city_id == $city->id)
                                <option value="{{ $hotel->id }}" style="font-weight: bold;">{{ $hotel->name }}</option>
                            @endif
                        @endforeach
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     </div>
    </div>
    </div>

</form>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
<style> 
 .card {
        width: 600px; /* Adjust the width as per your requirement */
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-top: 50px; /* Add more space by adjusting the margin value */
    }

    .card .card-title {
        font-size: 18px;
        color: black;
        font-weight: bold;
        margin-bottom: 15px;
    }

    

    .card .styled-field {
        background-color: #fff;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ced4da;
    }


</style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#error-message').fadeOut('slow');
            }, 2500); 
        });
    </script>
@stop

