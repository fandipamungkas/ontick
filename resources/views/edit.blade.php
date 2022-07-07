@extends('layouts.admin')
@section('content')
    <h2>Edit Event</h2>
    <form action="{{ route('update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="image">
            @error('image')
                <span class="text-danger small">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Judul Event"
                value="{{ $event->title }}">
            @error('title')
                <span class="text-danger small">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description"
                placeholder="Masukkan Deskripsi" value="{{ $event->description }}">
            @error('description')
                <span class="text-danger small">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Date time</label>
            <input type="datetime-local" class="form-control" name="datetime" id="datetime" placeholder="Date Time"
                value="{{ date('Y-m-d\TH:i', strtotime($event->datetime)) }}">
            @error('datetime')
                <span class="text-danger small">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Quota</label>
            <input type="number" class="form-control" name="quota" id="quota" placeholder="Masukkan kuota"
                value="{{ $event->quota }}">
            @error('quota')
                <span class="text-danger small">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" id="price" placeholder="Masukkan harga"
                value="{{ $event->price }}">
            @error('price')
                <span class="text-danger small">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Location</label>
            <input type="text" class="form-control" name="location" id="location" placeholder="Masukkan Lokasi"
                value="{{ $event->location }}">
            @error('location')
                <span class="text-danger small">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
