
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />


<div class="mt-1">
       
	@if (session('success'))
        <div class="alert alert-success" role="alert" id="error-message">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" id="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="mt-1"> <!-- Add margin-top -->
    <div class="row">
        @foreach ($bookings as $item)
            <div class="col-md-4 mb-4">
                <a href="{{route("show-booking",$item->id)}}" class="card h-100 rounded card-link">
                    <div class="card-body">
                        <h3 class="card-title">{{ $item->customer->name }}</h5>
                            
                        <p class="card-text">Traviling To : {{ $item->ticket->city->name }}</p>
                        <p class="card-text">Booked on: {{ $item->date }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
     <!-- Add the button to navigate to the add card (booking) route -->
        <div class="float-right mb-3">
            <a href="{{route('booking-create')}}" class="btn btn-primary btn-floating">
                <i class="fas fa-plus"></i>
            </a>
        </div>
     
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>

    .card {
        transition: transform 0.2s;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
    }
     .card-link {
        color: inherit;
        text-decoration: none;
    }
    .card-title {
        font-size: 1.4rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 0.9rem;
    }
    .btn-floating {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 75px;
            height: 75px;
            border-radius: 75px;
            text-align: center;
            font-size: 24px;
            line-height: 60px;
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
