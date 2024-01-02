
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Travel Booking Card</h5>
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item " href="{{route('edit-booking',$booking->id)}}">Edit</a>
                                <a class="dropdown-item text-danger" href="{{route('delete-booking',$booking->id)}}">Delete</a>
                            </div>
                        </div>
                    </div>
                @if (session('success'))
					<div class="alert alert-success" role="alert" id="error-message">
						{{ session('success') }}
					</div>
				@endif
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nameInput">Name</label>
                                <div class="styled-field">{{$booking->customer->name}}</div>
                            </div>
                            <div class="col-md-6">
                                <label for="emailInput">Email</label>
                                <div class="styled-field">{{$booking->customer->email}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="phoneInput">Phone</label>
                                <div class="styled-field">{{$booking->customer->phone}}</div>
                            </div>
                            <div class="col-md-6">
                                <label for="city">Traveling To</label>
                                <div class="styled-field">{{$booking->ticket->city->name}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="hotel">Hotel</label>
                                <div class="styled-field">{{$booking->hotel->name}}</div>
                            </div>
                            <div class="col-md-6">
                                <label for="company">Airline Company</label>
                                <div class="styled-field">{{$booking->ticket->company->name}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="date_s">From date</label>
                                <div class="styled-field">{{$booking->ticket->date_s}}</div>
                            </div>
                            <div class="col-md-6">
                                <label for="date_e">To date</label>
                                <div class="styled-field">{{$booking->ticket->date_e}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">


   <style> 
 .custom-card {
        width: 600px; /* Adjust the width as per your requirement */
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-top: 50px; /* Add more space by adjusting the margin value */
    }

    .custom-card .card-title {
        font-size: 18px;
        color: black;
        font-weight: bold;
        margin-bottom: 15px;
    }

    

    .custom-card .styled-field {
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
