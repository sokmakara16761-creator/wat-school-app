<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $upcomingEvents = Event::where('is_upcoming', true)->orderBy('start_date', 'asc')->get();
        $pastEvents = Event::where('is_upcoming', false)->orderBy('start_date', 'desc')->get();

        return view('events.index', compact('upcomingEvents', 'pastEvents'));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        $otherEvents = Event::where('id', '!=', $event->id)->orderBy('start_date', 'asc')->take(3)->get();

        return view('events.show', compact('event', 'otherEvents'));
    }
}
