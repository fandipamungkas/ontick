@extends('template.master')
@section('content')

<h2>Buat Event Baru</h2>
<form action="store" method="POST">
    @csrf
    <input type="text" class="form-control mb-3" name="title" id="title" placeholder="Masukkan Judul Event">
    <input type="text" class="form-control mb-3" name="description" id="description" placeholder="Masukkan Deskripsi">
    <input type="datetime-local" class="form-control mb-3" name="datetime" id="datetime" placeholder="Date Time">
    <input type="number" class="form-control mb-3" name="quota" id="quota" placeholder="Masukkan kuota">
    <input type="number" class="form-control mb-3" name="price" id="price" placeholder="Masukkan harga">
    <input type="text" class="form-control mb-3" name="location" id="location" placeholder="Masukkan Lokasi">

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

