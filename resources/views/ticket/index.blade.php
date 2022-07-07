@extends('layouts.app')
@section('content')
    <div class="page-header events-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">My Ticket</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
    </header>

    <div class="events-list-page mt-5">
        <div class="container">
            @forelse ($tickets as $ticket)
                <div class="upcoming-events mb-3">
                    <div class="upcoming-events-header">
                        <h4>{{ $ticket->event->title }}</h4>
                    </div>
                    <div class="upcoming-events-list">
                        <!-- list item -->
                        <div class="upcoming-event-wrap flex flex-wrap justify-content-between align-items-center">
                            <figure class="events-thumbnail">
                                <a href="#"><img src={{ $ticket->event->takeImage() }} alt=""></a>
                            </figure>

                            <div class="entry-meta">
                                <div class="event-date">
                                    {{ $ticket->event->datetime }}
                                </div>
                            </div>

                            <header class="entry-header">
                                <h3 class="entry-title"><a href="#">{{ $ticket->event->location }}</a></h3>

                                <div class="event-date-time">{{ $ticket->event->description }}</div>

                                <div class="event-speaker">Total ticket: {{ $ticket->quantity }}</div>
                            </header>

                            <footer class="entry-footer">
                                <a href="{{ route('show', $ticket->event->id) }}">See Detail</a>
                            </footer>
                        </div>
                    </div>
                </div>

            @empty
                <h2 class="event-item-title mb-5">No tickets found</h2>
            @endforelse
        </div>
    </div>
@endsection
