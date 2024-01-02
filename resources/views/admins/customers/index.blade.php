@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Customer's</h1>
@stop

@section('content')
    <a href="{{ route('admins.customers.create') }}">
        <button type="button" class="btn btn-secondary">add</button>
    </a><br><br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Phone</th>
                <th scope="col">show</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <th scope="row">{{ $customer->id }}</th>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->gender }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td><a href="{{ route('admins.customers.show', [$customer->id]) }}">
                            <button type="submit" class="btn btn-outline-secondary">show</button></a>
                    </td>
                    <td><a href="{{ route('admins.customers.edit', [$customer->id]) }}">
                            <button type="submit" class="btn btn-outline-danger">Edit</button></a>
                    </td>
                    <td><a href="{{ route('admins.customers.delete', $customer->id) }}">
                            {{-- <i class="bi bi-airplane-fill">U+F7CC</i> --}}
                            <button type="submit" class="btn btn-outline-dark">Delete</button></a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $customers->links() }}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
