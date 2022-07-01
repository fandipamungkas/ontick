@extends('template.master')
@section('content')
<p>Event title: {{ $cart->event->title }}</p>
<p>Description: {{ $cart->event->title }}</p>
<p>Datetime: {{ $cart->event->title }}</p>
<p>Location: {{ $cart->event->title }}</p>

<p>Total Price:</p>
<p>{{ $cart->price }}</p>

<form action="{{route('buy', $cart->id)}} " method="post">
    @csrf
    <label for="" class="form-label">Payment Method</label>
    <input class="form-control mb-3" type="text" name="payment_method" id="payment_method">

    <button class="btn btn-primary" type="submit">Buy!!!</button>
</form>
@endsection
