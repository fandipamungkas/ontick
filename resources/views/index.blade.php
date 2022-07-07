@extends('layouts.app')
@section('content')
    <div class="page-header events-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Events<h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
    </header>

    <div class="events-list-page mt-5">
        <div class="container">
            <div class="row events-list">
                @forelse ($events as $event)
                    <div class="col-12 col-lg-6 single-event">
                        <figure class="events-thumbnail">
                            <a href="#"><img src={{ $event->takeImage() }} alt=""></a>
                        </figure>

                        <div class="event-content-wrap">
                            <header class="entry-header flex justify-content-between">
                                <div>
                                    <h2 class="entry-title"><a
                                            href="{{ route('show', $event->id) }}">{{ $event->title }}</a></h2>

                                    <div class="event-location"><a href="#">{{ $event->location }}</a></div>

                                    <div class="event-date">{{ $event->datetime }}</div>
                                </div>

                                <div class="event-cost flex justify-content-center align-items-center">
                                    Rp<span> {{ $event->price }} </span>
                                </div>
                            </header>

                            <footer class="entry-footer">
                                <a href="{{ route('show', $event->id) }}">See Detail</a>
                            </footer>
                        </div>
                    </div>
                @empty
                    <h2 class="event-item-title mb-5">No events found</h2>
                @endforelse

            </div>
        </div>
    </div>
@endsection
