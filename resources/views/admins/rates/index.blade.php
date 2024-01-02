@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <center><b> - Rates - </b></center>
@stop

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Customer</th>
                <th scope="col">hotel</th>
                <th scope="col">star</th>
                <th scope="col">comment</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rates as $rate)
                <tr>
                    <th scope="row">{{ $rate->id }}</th>
                    <td>{{ $rate->customer->name }}</td>
                    <td>{{ $rate->hotel->name }}</td>
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
                    <td>
                        <textarea class="form-control" id="" rows="1">{{ $rate->comment }}</textarea>
                    </td>
                    <td><a href="{{ route('admins.rates.edit', [$rate->id, $rate->hotel_id, $rate->customer_id]) }}">
                            <button type="submit" class="btn btn-primary">Edit</button></a>
                    </td>
                    <td><a href="{{ route('admins.rates.delete', $rate->id) }}">
                            <button type="submit" class="btn btn-outline-danger">Delete</button></a>
                    </td>
                </tr>
            @empty
                <tr colspan = "2">
                    <center>
                        <p>NO Rates</p>
                    </center>
                </tr>
            @endforelse()

        </tbody>
    </table>
    <a href="{{ route('admins.rates.create') }}">
        <button type="button" class="btn btn-outline-success">add</button>
    </a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
