@extends('template.master')
@section('content')

<a class="btn btn-success" href="create">Buat Event Baru</a>
<h1 class="mt-4">Daftar Event</h1>
<table class="table">
    <thead>
        <tr>
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
            <td>{{$event->title}}</td>
            <td>{{$event->description}}</td>
            <td>{{$event->datetime}}</td>
            <td>{{$event->quota}}</td>
            <td>{{$event->price}}</td>
            <td>{{$event->location}}</td>
            <td class="d-flex" >
                <a class="btn btn-warning me-2" href="edit/{{ $event->id }}">edit</a>
                <form action="delete/{{$event->id}}" method="POST"
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
