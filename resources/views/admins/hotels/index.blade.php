@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="row justify-content-between">
        <a href="{{ route('admins.hotels.create') }}">
            <button type="button" class="btn btn-secondary">add</button>
        </a><br><br>


        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

    </div>



@stop

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">phone</th>
                <th scope="col">City</th>
                <th scope="col">show</th>
                <th scope="col">review</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
         
            @forelse ($hotels as $hotel)
                <tr>
                    <th scope="row">{{ $hotel->id }}</th>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->phone }}</td>
                    <td>{{ $hotel->city->name }}</td>
                    <td><a href="{{ route('hotels.show', [$hotel->id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#0B4213A7"
                                class="bi bi-book-half" viewBox="0 0 16 16">
                                <path
                                    d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                            </svg>
                    </td>
                    <td><a href="{{ route('hotels.review', [$hotel->id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black"
                                class="bi bi-star-half" viewBox="0 0 16 16">
                                <path
                                    d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z" />
                            </svg>
                    </td>

                    <td><a href="{{ route('admins.hotels.edit', [$hotel->id, $hotel->city_id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#AB804FA7"
                                class="bi bi-pen" viewBox="0 0 16 16">
                                <path
                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                            </svg>

                    </td>
                    {{-- <td><a href="{{ route('admins.hotels.delete', $hotel->id) }}">
                            <button type="submit" class="btn btn-outline-dark">Delete</button></a>
                        </a>
                    </td> --}}
                    <td>
                        <a href="{{ route('admins.hotels.delete', $hotel->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="gray"
                                class="bi bi-trash3" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                            </svg>
                        </a>
                    </td>



                </tr>
            @empty
                <tr colspan = "2">
                    <center>NO Hottels</center>
                </tr><br>
            @endforelse()

        </tbody>
    </table>
    {{ $hotels->links() }}
    {{-- {{ $hotels->appends(['search' => request()->query('search')]) }} --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
