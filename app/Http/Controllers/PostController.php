<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        $query = Post::orderBy('published_at', 'desc');

        if ($category) {
            $query->where('category', $category);
        }

        $posts = $query->paginate(9);
        $categories = ['ទាំងអស់', 'វត្តអារាម', 'សាលារៀន', 'ធម្មទាន', 'សេចក្ដីជូនដំណឹង'];

        return view('posts.index', compact('posts', 'categories', 'category'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->increment('views');

        $relatedPosts = Post::where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }
}
