<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Event;
use App\Models\Dhamma;
use App\Models\Admission;
use App\Models\ContactMessage;
use App\Models\Teacher;
use App\Models\SchoolClass;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $stats = [
            'posts' => Post::count(),
            'events' => Event::count(),
            'dhammas' => Dhamma::count(),
            'admissions' => Admission::count(),
            'pending_admissions' => Admission::where('status', 'pending')->count(),
            'messages' => ContactMessage::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
            'teachers' => Teacher::count(),
        ];

        $recentAdmissions = Admission::orderBy('created_at', 'desc')->take(5)->get();
        $recentMessages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();
        $recentPosts = Post::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentAdmissions', 'recentMessages', 'recentPosts'));
    }

    // Admissions
    public function admissions()
    {
        $admissions = Admission::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.admissions', compact('admissions'));
    }

    public function updateAdmissionStatus(Request $request, $id)
    {
        $admission = Admission::findOrFail($id);
        $admission->status = $request->input('status', 'approved');
        $admission->notes = $request->input('notes', $admission->notes);
        $admission->save();

        return back()->with('success', 'ស្ថានភាពពាក្យស្នើសុំត្រូវបានកែប្រែជោគជ័យ!');
    }

    // Posts
    public function posts()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function createPost()
    {
        return view('admin.posts.create');
    }

    public function storePost(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'thumbnail' => 'nullable|string',
            'author' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . rand(100, 999);
        $validated['author'] = $validated['author'] ?? 'គណៈកម្មការវត្ត';
        $validated['is_featured'] = $request->has('is_featured');
        $validated['published_at'] = now();

        Post::create($validated);

        return redirect()->route('admin.posts')->with('success', 'អត្ថបទព័ត៌មានត្រូវបានបង្កើតដោយជោគជ័យ!');
    }

    public function deletePost($id)
    {
        Post::destroy($id);
        return back()->with('success', 'អត្ថបទត្រូវបានលុបដោយជោគជ័យ!');
    }

    // Events
    public function events()
    {
        $events = Event::orderBy('start_date', 'desc')->paginate(15);
        return view('admin.events.index', compact('events'));
    }

    public function createEvent()
    {
        return view('admin.events.create');
    }

    public function storeEvent(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'lunar_date' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . rand(100, 999);
        $validated['is_upcoming'] = true;

        Event::create($validated);

        return redirect()->route('admin.events')->with('success', 'កម្មវិធីបុណ្យត្រូវបានបង្កើតដោយជោគជ័យ!');
    }

    public function deleteEvent($id)
    {
        Event::destroy($id);
        return back()->with('success', 'កម្មវិធីបុណ្យត្រូវបានលុបដោយជោគជ័យ!');
    }

    // Messages
    public function messages()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.messages', compact('messages'));
    }

    public function markMessageRead($id)
    {
        $msg = ContactMessage::findOrFail($id);
        $msg->is_read = true;
        $msg->save();

        return back()->with('success', 'បានសម្គាល់ថាអានរួច!');
    }
}
