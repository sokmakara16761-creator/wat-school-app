<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Event;
use App\Models\Dhamma;
use App\Models\SchoolClass;
use App\Models\Teacher;
use App\Models\Achievement;
use App\Models\Gallery;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPosts = Post::orderBy('published_at', 'desc')->take(3)->get();
        $upcomingEvents = Event::where('is_upcoming', true)->orderBy('start_date', 'asc')->take(3)->get();
        $latestDhammas = Dhamma::orderBy('published_at', 'desc')->take(3)->get();
        $latestVideos = Video::orderBy('published_at', 'desc')->take(3)->get();
        $classes = SchoolClass::all();
        $teachers = Teacher::orderBy('sort_order', 'asc')->take(4)->get();
        $achievements = Achievement::orderBy('rank', 'asc')->take(3)->get();
        $galleries = Gallery::take(6)->get();

        $stats = [
            'monks' => 48,
            'students' => 115,
            'classes' => 3,
            'teachers' => 8,
            'years' => 52,
        ];

        return view('home', compact(
            'featuredPosts',
            'upcomingEvents',
            'latestDhammas',
            'latestVideos',
            'classes',
            'teachers',
            'achievements',
            'galleries',
            'stats'
        ));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return redirect()->route('home');
        }

        $posts = Post::where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->get();

        $dhammas = Dhamma::where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->orWhere('preacher', 'like', "%{$query}%")
            ->get();

        $events = Event::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();

        return view('search', compact('query', 'posts', 'dhammas', 'events'));
    }
}
