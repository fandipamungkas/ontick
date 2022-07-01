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
    public function addcart(Event $event)
    {
        // jika request quantity lebih dari jumlah quota event
        if (request()->quantity > $event->quota) {
            return redirect()->back();

        }
        auth()->user()->cart()->create([
            'event_id' => $event->id,
            'quantity' => request()->quantity,
            'price' => $event->price * request()->quantity,
        ]);

        return redirect()->route('payment');
    }


    public function payment()
    {
        $cart = Cart::latest()->first();
        return view ("payment", compact('cart'));
    }

    public function buy(Cart $cart)
    {
        auth()->user()->tickets()->create([
            'event_id' => $cart->event_id,
            'quantity' => $cart->quantity,
            'price' => $cart->price,
            'payment_method' => request()->payment_method,
        ]);

        $cart->event->update([
            'quota' => $cart->event->quota - $cart->quantity,
        ]);

        $cart->delete();
        return redirect('/');
    }
}
