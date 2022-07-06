@extends('layouts.app')
@section('content')
    {{-- <p>Event title: {{ $cart->event->title }}</p>
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
    </form> --}}

    <div class="contact-page">
        <div class="page-header events-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <header class="entry-header">
                            <h1 class="entry-title">Payment</h1>
                        </header>
                    </div>
                </div>
            </div>
        </div>
        </header>


        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="contact-location-details">
                        <h2 class="entry-title">{{ $cart->event->title }}</h2>

                        <div class="entry-content">
                            <p>{{ $cart->event->description }}</p>
                        </div>

                        <footer class="entry-footer">
                            <ul>
                                <li class="contact-address">{{ $cart->event->location }}</li>
                                <li class="contact-number">{{ $cart->event->datetime }}</li>
                                <li class="contact-email">{{ $cart->price }}</li>
                            </ul>
                        </footer>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-form">
                        <form action="{{ route('buy', $cart->id) }}" method="post">
                            @csrf
                            <div class="col-12 col-md-4">
                                <p class="mb-2">Payment method:</p>
                                <select class="form-control" name="payment_method" id="payment_method">
                                    <option value="BCA">BCA</option>
                                    <option value="BRI">BRI</option>
                                    <option value="BNI">BNI</option>
                                    <option value="Gopay">Gopay</option>
                                    <option value="OVO">OVO</option>
                                </select>
                            </div>
                            <div class="col-12 flex justify-content-center">
                                <button class="btn gradient-bg" type="submit">Buy</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
