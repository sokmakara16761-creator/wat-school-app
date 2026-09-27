<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        ContactMessage::create($validated);

        return redirect()->route('contact')->with('success', 'សូមអរព្រះគុណ និងអរគុណ! សាររបស់លោកអ្នកត្រូវបានផ្ញើជូនគណៈកម្មការវត្តរួចរាល់ហើយ។');
    }
}
