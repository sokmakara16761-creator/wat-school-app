<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        $query = Gallery::orderBy('event_date', 'desc');

        if ($category && $category !== 'ទាំងអស់') {
            $query->where('category', $category);
        }

        $galleries = $query->paginate(12);
        $categories = ['ទាំងអស់', 'វត្តអារាម', 'សាលារៀន', 'ពិធីបុណ្យ'];

        return view('gallery.index', compact('galleries', 'categories', 'category'));
    }
}
