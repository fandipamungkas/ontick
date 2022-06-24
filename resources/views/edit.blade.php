@extends('template.master')
@section('content')

<h2>Edit Event</h2>
<form action="{{route('update', $event->id)}}" method="POST">
    @csrf
    @method('put')
    <input type="text" class="form-control mb-3" name="title" id="title" placeholder="Masukkan Judul Event"value="{{ $event->title }}">
    <input type="text" class="form-control mb-3" name="description" id="description" placeholder="Masukkan Deskripsi"value="{{ $event->description }}">
    <input type="datetime-local" class="form-control mb-3" name="datetime" id="datetime" placeholder="Date Time"value="{{date("Y-m-d\TH:i", strtotime($event->datetime))}}">
    <input type="number" class="form-control mb-3" name="quota" id="quota" placeholder="Masukkan kuota"value="{{ $event->quota }}">
    <input type="number" class="form-control mb-3" name="price" id="price" placeholder="Masukkan harga"value="{{ $event->price }}">
    <input type="text" class="form-control mb-3" name="location" id="location" placeholder="Masukkan Lokasi"value="{{ $event->location }}">

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

