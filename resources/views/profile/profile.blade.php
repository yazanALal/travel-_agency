
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

<div class="container">
<div class="row justify-content-center">
  <div class="col-md-8">
    <!-- Page title -->
    <div class="my-5">
      <h3 class="text-center">My Profile</h3>
      <hr>
    </div>

    <!-- Upload profile -->
    <div class="card mb-5">
      <div class="card-header">
          <!-- Three dots menu -->
          <div class="dropdown float-right">
              <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item text-danger" href="{{route('delete-account')}}">Delete Account</a>
                  <a class="dropdown-item" href="{{ route('change-password') }}">Change Password</a>
                  <a class="dropdown-item" href="{{ route('delete-image') }}">delete image</a>
              </div>
          </div>
      </div>
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
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <div class="text-center">
			
             
              <!-- Image upload -->
              <div class="square position-relative display-3 mb-4">
                <i class="image-icon" style="background-image: url('{{ asset('images/' . Auth::user()->image) }}')"></i>
              </div>
              <!-- Button -->
              <form action="{{ route('upload-image') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                  <input type="file" id="customFile" name="image" hidden>
                  <label class="btn btn-success-soft btn-block" for="customFile">Choose Image</label>
                </div>
                <button type="submit" class="btn btn-primary w-66">Add image</button>
              </form>
            </div>
          </div>
          <!-- Form START -->
          <div class="col-md-8">
           
            <form class="file-upload" method="POST" action="{{route('update-profile')}}">
				@csrf
              <div class="bg-secondary-soft px-4 py-5 rounded">
                <div class="row g-3">
                  <!--  Name -->
                  <div class="col-md-6">
                    <label class="form-label"> Name *</label>
                    <input type="text" class="form-control" name ='name' placeholder="" aria-label=" name" value="{{Auth::user()->name}}">
                  </div>
                  <!-- Phone number -->
                  <div class="col-md-6">
                    <label class="form-label">Phone number *</label>
                    <input type="text" class="form-control" name ='phone' placeholder="" aria-label="Phone number" value="{{Auth::user()->phone}}">
                  </div>
                  <!-- Email -->
                  <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email *</label>
                    <input type="email" name ='email' class="form-control" id="inputEmail4" value="{{Auth::user()->email}}">
                  </div>
                  <!-- Submit button -->
                  <div class="col-md-6">
                    <label class="form-label">&nbsp;</label>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                  </div>
                </div> <!-- Row END -->
              </div>
            </form>
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
.image-icon {
    display: inline-block;
    width: 100px;
    height: 100px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.btn-success-soft {
    background-color: #c3e6cb;
    border-color: #c3e6cb;
    color: #155724;
}

.btn-success-soft:hover {
    background-color: #b1dfc6;
    border-color: #b1dfc6;
    color: #155724;
}
</style>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#error-message').fadeOut('slow');
            }, 2500); 
        });
    </script>
    <script> console.log('Hi!'); </script>
	
@stop
