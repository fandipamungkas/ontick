<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Category;
use App\Models\Event;

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
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store(EventRequest $request)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            $title = \Str::slug($request->title);
            $imageUrl = $image->storeAs("images/events", "{$title}.{$image->extension()}");
        } else {
            $imageUrl = null;
        }

        Event::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'datetime' => $request->datetime,
            'quota' => $request->quota,
            'price' => $request->price,
            'location' => $request->location,
            'image' => $imageUrl,
        ]);

        return redirect('/');
    }

    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('edit', compact('event', 'categories'));
    }

    public function update(EventRequest $request, Event $event)
    {
        if ($request->file('image')) {
            \Storage::delete($event->image);

            $image = $request->file('image');
            $title = \Str::slug($event->title);
            $imageUrl = $image->storeAs("images/events", "{$title}.{$image->extension()}");
        } else {
            $imageUrl = $event->image;
        }
        $event->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'datetime' => $request->datetime,
            'quota' => $request->quota,
            'price' => $request->price,
            'location' => $request->location,
            'image' => $imageUrl,
        ]);

        return redirect('/');
    }

    public function delete(Event $event)
    {
        $event->delete();
        return redirect()->back();
    }
}
