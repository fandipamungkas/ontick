<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Event;
use Illuminate\Http\Request;

class BuyController extends Controller
{

    public function addcart(Event $event)
    {
        request()->validate([
            'quantity' => 'required|numeric|min:1',
        ]);
        
        if (request()->quantity > $event->quota) {
            return redirect()->back()->with('error', 'Sorry, the ticket you bought is over the limit.');
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
        return view("payment", compact('cart'));
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
