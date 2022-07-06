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

        if (auth()->user() && auth()->user()->role == 'admin') {
            return view('admin.index', compact('events'));
        }
        return view('index', compact('events'));
    }

    public function show(Event $event)
    {
        return view("show", compact('event'));
    }

    public function create()
    {
        return  view('create');
    }

    public function store()
    {
        request()->validate([
            "image" => 'required',
            "title" => 'required',
            "description" => 'required',
            "datetime" => 'required',
            "quota" => 'required',
            "price" => 'required',
            "location" => 'required',
        ]);

        if (request()->file('image')) {
            $image = request()->file('image');
            $title = \Str::slug(request()->title);
            $imageUrl = $image->storeAs("images/events", "{$title}.{$image->extension()}");
        } else {
            $imageUrl = null;
        }

        Event::create([
            'title' => request()->title,
            'description' => request()->description,
            'datetime' => request()->datetime,
            'quota' => request()->quota,
            'price' => request()->price,
            'location' => request()->location,
            'image' => $imageUrl,
        ]);

        return redirect('/');
    }

    public function edit(Event $event)
    {
        return view('edit', compact('event'));
    }

    public function update(Event $event)
    {
        request()->validate([
            "title" => 'required',
            "description" => 'required',
            "datetime" => 'required',
            "quota" => 'required',
            "price" => 'required',
            "location" => 'required',
        ]);

        if (request()->file('image')) {
            \Storage::delete($event->image);

            $image = request()->file('image');
            $imageUrl = $image->storeAs("images/events", "{$event->title}.{$image->extension()}");
        } else {
            $imageUrl = $event->image;
        }
        $event->update([
            'title' => request()->title,
            'description' => request()->description,
            'datetime' => request()->datetime,
            'quota' => request()->quota,
            'price' => request()->price,
            'location' => request()->location,
            'image' => $imageUrl,
        ]);

        return redirect('/');
    }

    public function delete(Event $event)
    {
        $event->delete();
        return redirect()->back();
    }

    public function addcart(Event $event)
    {
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
        if (!$cart) {
            return redirect()->route('index');
        }
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

        return redirect()->route('ticket.index');
    }
}