<?php

namespace App\Http\Controllers;

use App\Models\Dhamma;
use Illuminate\Http\Request;

class DhammaController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        $query = Dhamma::orderBy('published_at', 'desc');

        if ($category) {
            $query->where('category', $category);
        }

        $dhammas = $query->paginate(9);
        $categories = ['ទាំងអស់', 'ធម៌អប់រំចិត្ត', 'គតិលោក និងសីលធម៌', 'ការចម្រើនភាវនា (សមាធិ)', 'វិន័យសង្ឃ'];

        return view('dhamma.index', compact('dhammas', 'categories', 'category'));
    }

    public function show($slug)
    {
        $dhamma = Dhamma::where('slug', $slug)->firstOrFail();
        $dhamma->increment('views');

        $relatedDhammas = Dhamma::where('id', '!=', $dhamma->id)
            ->where('category', $dhamma->category)
            ->take(3)
            ->get();

        return view('dhamma.show', compact('dhamma', 'relatedDhammas'));
    }
}
