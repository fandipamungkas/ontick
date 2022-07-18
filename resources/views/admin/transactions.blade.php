@extends('layouts.admin')
@section('content')
    <h1 class="mt-4">Daftar Transaksi</h1>
    <table class="table">
        <thead>
            <tr>
                <td>Nama user</td>
                <td>Image</td>
                <td>Nama Event</td>
                <td>Kategori</td>
                <td>Metode Pembayaran</td>
                <td>Jumlah</td>
                <td>Harga</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->user->name }}</td>
                    <td>
                        <img src="{{ $ticket->event->takeImage() }}" alt="" style="width:200px">
                    </td>
                    <td>{{ $ticket->event->title }}</td>
                    <td>{{ $ticket->event->category->name }}</td>
                    <td>{{ $ticket->payment_method }}</td>
                    <td>{{ $ticket->quantity }}</td>
                    <td>{{ $ticket->price }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
