@extends('layouts.app')

@section('title', $event->title . ' - វត្តព្រៃស្ដី')

@section('content')

<!-- Header Breadcrumb -->
<div class="bg-amber-50/60 border-b border-amber-200/60 py-4">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-xs text-gray-500 flex items-center gap-2">
        <a href="{{ route('home') }}" class="hover:text-amber-700">ទំព័រដើម</a>
        <i class="fa-solid fa-chevron-right text-[10px]"></i>
        <a href="{{ route('events.index') }}" class="hover:text-amber-700">កម្មវិធីបុណ្យទាន</a>
        <i class="fa-solid fa-chevron-right text-[10px]"></i>
        <span class="text-amber-900 font-semibold truncate">{{ $event->title }}</span>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <div class="space-y-4">
        @if($event->lunar_date)
            <span class="inline-block bg-red-900 text-amber-300 font-bold text-xs px-3 py-1 rounded-md shadow">
                <i class="fa-solid fa-moon mr-1"></i> {{ $event->lunar_date }}
            </span>
        @endif
        <h1 class="font-moul text-xl sm:text-2xl lg:text-3xl text-red-950 leading-relaxed">
            {{ $event->title }}
        </h1>
        <div class="flex flex-wrap items-center gap-4 text-xs text-gray-600 bg-amber-50 p-4 rounded-xl border border-amber-200">
            <div><i class="fa-regular fa-calendar-check text-amber-600 mr-1.5"></i> កាលបរិច្ឆេទ៖ <strong>{{ \Carbon\Carbon::parse($event->start_date)->format('d M, Y') }}</strong></div>
            <div><i class="fa-solid fa-location-dot text-amber-600 mr-1.5"></i> ទីកន្លែង៖ <strong>{{ $event->location }}</strong></div>
        </div>
    </div>

    @if($event->image)
        <div class="rounded-2xl overflow-hidden shadow-xl border-2 border-amber-300 max-w-2xl mx-auto bg-stone-50 p-2 sm:p-4 text-center">
            <div class="text-xs text-amber-800 font-semibold mb-2 flex items-center justify-center gap-1">
                <i class="fa-solid fa-file-lines"></i> សេចក្ដីជូនដំណឹង / កម្មវិធីបុណ្យ
            </div>
            <img src="{{ $event->image }}" alt="{{ $event->title }}" class="w-full h-auto object-contain rounded-xl mx-auto shadow-md">
            <div class="mt-3 flex justify-center">
                <a href="{{ $event->image }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs bg-amber-600 hover:bg-amber-700 text-white font-bold px-4 py-2 rounded-lg shadow transition">
                    <i class="fa-solid fa-up-right-and-down-left-from-center"></i> បើកមើលរូបភាពច្បាស់ពេញអេក្រង់ (Full Size)
                </a>
            </div>
        </div>
    @endif

    <!-- Event Detailed Content -->
    <div class="prose prose-amber max-w-none text-gray-800 text-sm sm:text-base leading-relaxed space-y-4 bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-gray-100">
        <h3 class="font-bold text-gray-900 text-base">កម្មវិធីលម្អិត</h3>
        {!! $event->content ?? $event->description !!}
    </div>

    <!-- Share & Footer -->
    <div class="pt-6 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs">
        <a href="{{ route('events.index') }}" class="text-amber-800 font-bold hover:underline flex items-center gap-1">
            <i class="fa-solid fa-arrow-left"></i> ត្រឡប់ទៅកាន់កម្មវិធីបុណ្យទាំងអស់
        </a>
        <div class="flex items-center gap-2">
            <span class="text-gray-500">ចែករំលែកដំណឹងបុណ្យ៖</span>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center hover:opacity-90">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($event->title) }}" target="_blank" class="w-8 h-8 rounded-full bg-blue-400 text-white flex items-center justify-center hover:opacity-90">
                <i class="fa-brands fa-telegram"></i>
            </a>
        </div>
    </div>

</div>

@endsection
