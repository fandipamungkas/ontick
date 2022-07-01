@extends('template.master')
@section('content')
<p>Event title: {{ $cart->event->title }}</p>
<p>Description: {{ $cart->event->description }}</p>
<p>Datetime: {{ $cart->event->datetime }}</p>
<p>Location: {{ $cart->event->location }}</p>

<p>Total price:</p>
<p>{{ $cart->price }}</p>

<form action="{{ route('buy', $cart->id) }}" method="post">
    @csrf
    <label for="" class="form-label">Payment method</label>
    <input class="form-control mb-3" type="text" name="payment_method" id="payment_method">

    <button class="btn btn-primary" type="submit">Buy!</button>
</form>
@endsection
