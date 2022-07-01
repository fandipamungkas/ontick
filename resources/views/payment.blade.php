@extends('template.master')
@section('content')
<p> Event title: {{ $cart->event->title }} </p>
<p>Event description: {{ $cart->event->description }}</p>
<p>Event Datetime: {{ $cart->event->datetime }}</p>
<p>Event Location: {{ $cart->event->loaction }}</p>

<p>Total Price: </p>
<p>{{ $cart->price }}</p>

<form action="{{ route('buy', $cart->id) }}" method="POST">
    @csrf
    <label for="" class="form-label">Payment method</label>
    <input class="form-control mb-3" type="text" name="payment_method" id="payment_method">

    <button class="btn btn-primary" type="submit">Buy!</button>
</form>
@endsection
