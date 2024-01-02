@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Company's</h1> --}}
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('admins.hotels.update', $hotels->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @if ($errors->any())
                        <div class="alert alert-primary d-flex align-items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16"
                                role="img" aria-label="Warning:">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            <div>
                                <ul>
                                    @foreach ($errors->all() as $erorr)
                                        <li> {{ $erorr }} </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="exampleFormControlInput1">name</label>
                        <input type="text" name="name" value="{{ old('name', $hotels->name) }}"
                            @class(['form-control', 'is-invalid' => $errors->has('name')]) id="exampleFormControlInput1" placeholder="">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">phone</label>
                        <input type="numper" name="phone" value="{{ old('phone', $hotels->phone) }}"
                            @class(['form-control', 'is-invalid' => $errors->has('phone')]) id="exampleFormControlInput1" placeholder="">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">City</label>
                        <select @class(['form-control', 'is-invalid' => $errors->has('city_id')]) name="city_id" id="exampleFormControlSelect1">
                            @foreach ($cities as $city)
                                <option value="{{ old('city_id') ?? $city->id }}" @selected(old('city_id', $hotels->city_id) == $city->id)>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <label for="exampleFormControlSelect1">Image </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="images[]" multiple class="custom-file-input" id="inputGroupFile01">
                            <label @class(['custom-file-label', 'is-invalid' => $errors->has('images')]) for="inputGroupFile01">Choose file</label>
                            @error('images[]')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- @dd($hotels->hotel_images) --}}
                    @foreach ($hotels->hotel_images as $hotel)
                        <img src=" {{ asset('storage/' . $hotel->buf) }} " alt="" height="70" width="70">
                    @endforeach
                    <div><br>
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
