@extends('template.master')
@section('content')
    <h1 class="mt-4">My Tickets</h1>
    <table class="table">
        <thead>
            <tr>
                <td>Nama Event</td>
                <td>Deskripsi</td>
                <td>Waktu</td>
                <td>Lokasi</td>
                <td>Jumlah tiket</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->event->title }}</td>
                    <td>{{ $ticket->event->description }}</td>
                    <td>{{ $ticket->event->datetime }}</td>
                    <td>{{ $ticket->event->location }}</td>
                    <td>{{ $ticket->quantity }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
