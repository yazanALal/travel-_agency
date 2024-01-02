@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Company's</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action="{{ route('admins.rates.update', $rates->id) }}">
                    @csrf

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">customers</label>
                        <select class="form-control" name="customer_id" id="exampleFormControlSelect1">
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}" @selected($rates->customer_id == $customer->id)>{{ $customer->name }}
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">hotels</label>
                        <select class="form-control" name="hotel_id" id="exampleFormControlSelect1">
                            @foreach ($hotels as $hotel)
                                <option value="{{ $hotel->id }}" @selected($rates->hotel_id == $hotel->id)>{{ $hotel->name }}
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">star</label>
                        @php
                            $wordMap = [1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four', 5 => 'Five'];
                        @endphp

                        <select name="star" class="form-control" id="exampleFormControlSelect1">
                            @foreach ($wordMap as $value => $word)
                                <option value="{{ $value }}" {{ $rates->star == $value ? 'selected' : '' }}>
                                    {{ $word }}
                                </option>
                            @endforeach
                        </select>

                        {{-- @php
                            $wordMap = [1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four', 5 => 'Five'];
                        @endphp
                        <select name="star" class="form-control" id="exampleFormControlSelect1" val>
                            @foreach ($wordMap as $value => $word)
                                <option value="{{ $value }}" @selected($rates->star == $hotel->id)>{{ $hotel->name }}
                                    {{ $word }}
                                </option>
                            @endforeach
                        </select> --}}

                        {{-- <option value="{{ $value }}" {{ $rates->star == $value ? 'selected' : '' }}> --}}
                        {{-- <select name="star" class="form-control" id="exampleFormControlSelect1">
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ $i == $rates->star ? 'selected' : '' }}>
                                    {{ $i }}</option>
                            @endfor
                        </select> --}}

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Comment </label>

                        <textarea class="form-control" id="" rows="1" name="comment">{{ $rates->comment }}</textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">update</button>
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
