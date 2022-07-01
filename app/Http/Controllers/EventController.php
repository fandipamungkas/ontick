<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::get();
        return view('index', compact('events'));
    }

    public function create()
    {
        return  view('create');
    }

    public function store()
    {
        Event::create([
            'title' => request()->title,
            'description' => request()->description,
            'datetime' => request()->datetime,
            'quota' => request()->quota,
            'price' => request()->price,
            'location' => request()->location,
        ]);

        return redirect('/');
    }

    public function delete(Event $event)
    {
        $event->delete();
        return redirect()->back();
    }

    public function show(Event $event)
    {
        return view("show", compact('event'));
    }

    public function edit(Event $event)
    {
        return view('edit', compact('event'));
    }

    public function update(Event $event)
    {
        $event->update([
            'title' => request()->title,
            'description' => request()->description,
            'datetime' => request()->datetime,
            'quota' => request()->quota,
            'price' => request()->price,
            'location' => request()->location,
        ]);

        return redirect('/');
    }

    public function buy(Event $event)
    {
        Ticket::create([
            'event_id' => $event->id,
            'quantity' => request()->quantity,
        ]);

        $event->update([
            'quota' => $event->quota-request()->quantity,
        ]);

        return redirect('/');
    }
    public function payment(Event $event)
    {
        return $cart = Cart::get();
        return view ("payment");
    }

    public function addcart(Event $event)
    {
        Cart::create([
            'event_id' => $event->id,
            'quantity' => request()->quantity,
            'price' => $event->price * request()->quantity,
        ]);

        return redirect()->route('payment');
    }
}
