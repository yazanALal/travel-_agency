@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>City's</h1>
@stop

@section('content')
    <a href="{{ route('admins.cities.create') }}">
        <button type="button" class="btn btn-secondary">add</button>
    </a><br><br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Country</th>
                <th scope="col">show</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cities as $city)
                <tr>
                    <th scope="row">{{ $city->id }}</th>
                    </td>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->country }}</td>
                    <td><a href="{{ route('cities.show', [$city->id]) }}">
                            <button type="submit" class="btn btn-outline-secondary">show</button></a>
                    </td>
                    <td><a href="{{ route('admins.cities.edit', $city->id) }}">
                            <button type="submit" class="btn btn-outline-danger">Edit</button></a>
                    </td>
                    <td><a href="{{ route('admins.cities.delete', $city->id) }}">
                            {{-- <i class="bi bi-airplane-fill">U+F7CC</i> --}}
                            <button type="submit" class="btn btn-outline-dark">Delete</button></a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $cities->links() }}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
