<?php

namespace App\Http\Controllers;

use App\Models\Event;
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

    public function edit(Event $event)
    {
       return view ('edit', compact('event'));
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
}
