@extends('template.master')
@section('content')
    <p>Event title : {{ $cart->event->title }}</p>
    <p>Description : {{ $cart->event->description }}</p>
    <p>Date : {{ $cart->event->datetime }}</p>
    <p>Location : {{ $cart->event->location }}</p>

    <p>Total Price :</p>
    <p>{{ $cart->price }}</p>

    <form action="{{ route('buy', $cart->id) }}" method="POST">
        @csrf
        <label for="" class="form-label">Payment method :</label>
        <input type="text" name="payment_method" id="payment_method" class="form-control mb-3">

        <button type="submit" class="btn btn-primary">Buy</button>
    </form>
@endsection
