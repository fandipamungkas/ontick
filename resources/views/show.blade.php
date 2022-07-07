@extends('layouts.app')
@section('content')
    <div class="single-event-page">
        <div class="page-header events-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <header class="entry-header">
                            <h1 class="entry-title">{{ $event->title }}</h1>
                        </header>
                    </div>
                </div>
            </div>
        </div>
        </header>

        <div class="container">
            @if (session()->has('error'))
                <div class="alert alert-danger mt-3" role="alert">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="tabs">
                        <ul class="tabs-nav flex">
                            <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_details">
                                Details</li>
                            <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_venue">
                                Description</li>
                        </ul>

                        <div class="tabs-container">
                            <div id="tab_details" class="tab-content">
                                <div class="flex flex-wrap justify-content-between">
                                    <div class="single-event-details">
                                        <div class="single-event-details-row mb-5">
                                            <label>Date</label>
                                            <p>{{ $event->datetime }}</p>
                                        </div>

                                        <div class="single-event-details-row mb-5">
                                            <label>Location</label>
                                            <p>{{ $event->location }}</p>
                                        </div>

                                        <div class="single-event-details-row mb-5">
                                            <label>Price:</label>
                                            <p>Rp{{ $event->price }}</p>
                                        </div>

                                        <div class="single-event-details-row mb-5">
                                            <label>Quota</label>
                                            <p>{{ $event->quota }}</p>
                                        </div>
                                    </div>

                                    <div class="single-event-map">
                                        <img src={{ $event->takeImage() }} alt="">
                                    </div>
                                </div>
                            </div>

                            <div id="tab_venue" class="tab-content">
                                <p>{{ $event->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="event-tickets">
                        <div class="ticket-row flex flex-wrap justify-content-between align-items-center">
                            <div class="ticket-type flex justify-content-between align-items-center">
                                <h3 class="entry-title"><span>Ticket</span> entry</h3>

                                <div class="ticket-price">Rp{{ $event->price }}</div>
                            </div>

                            <form action="{{ route('addcart', $event->id) }}" method="post"
                                class="flex align-items-center">
                                @csrf

                                <div class="number-of-ticket flex justify-content-between align-items-center">
                                    <span class="decrease-ticket">-</span>
                                    <input type="number" class="ticket-count" name="quantity" value="1" />
                                    <span class="increase-ticket">+</span>
                                </div>

                                <input type="submit" class="btn gradient-bg" value="Buy Ticket">
                            </form>
                        </div>
                        @error('quantity')
                            <div class="text-danger text-right">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
