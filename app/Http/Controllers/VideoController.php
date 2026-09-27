<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        $search = $request->query('search');

        $query = Video::query()->latest('published_at');

        if ($category && $category !== 'all') {
            if ($category === 'ពិធីបុណ្យ' || $category === 'ពិធីបុណ្យ & សកម្មភាពវត្ត' || str_contains($category, 'ពិធីបុណ្យ') || str_contains($category, 'សកម្មភាព')) {
                $query->where(function ($q) {
                    $q->where('category', 'like', '%ពិធីបុណ្យ%')
                      ->orWhere('category', 'like', '%សកម្មភាព%')
                      ->orWhere('category', 'like', '%Live%');
                });
            } else {
                $query->where('category', 'like', "%{$category}%");
            }
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('preacher', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $featuredVideo = Video::where('is_featured', true)->latest()->first();

        $videos = $query->paginate(9)->withQueryString();

        $categories = [
            'all' => 'ទាំងអស់',
            'ធម្មទេសនា' => 'ធម្មទេសនា',
            'សាលារៀន' => 'វីដេអូសាលារៀន',
            'ពិធីបុណ្យ' => 'ពិធីបុណ្យ & សកម្មភាពវត្ត',
        ];

        return view('videos.index', compact('videos', 'featuredVideo', 'categories', 'category', 'search'));
    }

    public function show($slug)
    {
        $video = Video::where('slug', $slug)->firstOrFail();
        $video->increment('views');

        $relatedVideos = Video::where('id', '!=', $video->id)
            ->where('category', $video->category)
            ->latest()
            ->take(4)
            ->get();

        if ($relatedVideos->isEmpty()) {
            $relatedVideos = Video::where('id', '!=', $video->id)->latest()->take(4)->get();
        }

        return view('videos.show', compact('video', 'relatedVideos'));
    }
}
