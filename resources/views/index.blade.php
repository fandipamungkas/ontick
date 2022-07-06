@extends('layouts.app')
@section('content')
    <a class="btn btn-success mb-3" href="{{route('ticket.index')}}">My Tickets</a>

    <h1 class="mt-4">Daftar Event</h1>
    <table class="table">
        <thead>
            <tr>
                <td>Image</td>
                <td>Nama Event</td>
                <td>Deskripsi</td>
                <td>Waktu</td>
                <td>Kuota</td>
                <td>Harga</td>
                <td>Lokasi</td>
                <td>action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->image }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->datetime }}</td>
                    <td>{{ $event->quota }}</td>
                    <td>{{ $event->price }}</td>
                    <td>{{ $event->location }}</td>
                    <td class="d-flex">
                        <a href="{{route("show",$event->id)}}" class="btn btn-primary me-2" >Detail</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
