@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <br>
                <center>
                    <b>Rates Hotel : {{ $hotel->name }}</b><br><br>
                </center>
                @if ($rates->isEmpty())
                    <p>No rates available for this hotel.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Customer</th>
                                <th scope="col">hotel</th>
                                <th scope="col">star</th>
                                <th scope="col">comment</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rates as $rate)
                                <tr>
                                    <td>{{ $rate->customer->name }}</td>
                                    <td>{{ $rate->hotel->name }}</td>
                                    {{-- <td>{{ $rate->star }}</td> --}}
                                    <td>
                                        <div class="rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $rate->star)
                                                    <i class="fas fa-star text-warning"></i>
                                                @else
                                                    <i class="far fa-star text-muted"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </td>
                                    <td> {{ $rate->comment }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
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
