@extends('layouts.admin')
@section('content')
    <h1 class="mt-4">Daftar Event</h1>
    <table class="table">
        <thead>
            <tr>
                <td>Image</td>
                <td>Nama Event</td>
                <td>Kategori</td>
                <td>Deskripsi</td>
                <td>Waktu</td>
                <td>Kuota</td>
                <td>Harga</td>
                <td>Lokasi</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>
                        <img src="{{ $event->takeImage() }}" alt="" style="width:200px">
                    </td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->category->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->datetime }}</td>
                    <td>{{ $event->quota }}</td>
                    <td>{{ $event->price }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <a class="btn btn-warning me-2 mb-2" href="edit/{{ $event->id }}">Edit</a>

                        <form action="delete/{{ $event->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
