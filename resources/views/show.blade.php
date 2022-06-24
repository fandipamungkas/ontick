@extends('template.master')
@section('content')
    <h2 class="mb-3">Detail Event</h2>
    <p>Nama event: {{ $event->title }}</p>
    <p>Deskripsi: {{ $event->description }}</p>
    <p>Date Time: {{ $event->datetime }}</p>
    <p>Kuota: {{ $event->quota }}</p>
    <p>Harga: {{ $event->price }}</p>
    <p>Lokasi: {{ $event->location }}</p>

    <form action="{{route('buy',$event->id)}}" method="post">
        @csrf

        <input type="number" name="quantity" id="quantity" class="form-control mb-2" placeholder="Jumlah">
        <button type="submit" class="btn btn-primary">Buy ticket!</button>
    </form>
@endsection
