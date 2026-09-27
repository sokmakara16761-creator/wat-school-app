@extends('layouts.app')

@section('title', $dhamma->title . ' - វត្តព្រៃស្ដី')

@section('content')

<!-- Header Breadcrumb -->
<div class="bg-amber-50/60 border-b border-amber-200/60 py-4">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-xs text-gray-500 flex items-center gap-2">
        <a href="{{ route('home') }}" class="hover:text-amber-700">ទំព័រដើម</a>
        <i class="fa-solid fa-chevron-right text-[10px]"></i>
        <a href="{{ route('dhamma.index') }}" class="hover:text-amber-700">ព្រះធម៌</a>
        <i class="fa-solid fa-chevron-right text-[10px]"></i>
        <span class="text-amber-900 font-semibold truncate">{{ $dhamma->title }}</span>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <div class="space-y-4">
        <span class="inline-block bg-amber-100 text-red-900 font-bold text-xs px-3 py-1 rounded-md">
            {{ $dhamma->category }}
        </span>
        <h1 class="font-moul text-xl sm:text-2xl lg:text-3xl text-red-950 leading-relaxed">
            {{ $dhamma->title }}
        </h1>
        <div class="flex flex-wrap items-center gap-4 text-xs text-gray-500 border-b border-gray-200 pb-4">
            <span class="text-amber-800 font-semibold"><i class="fa-solid fa-user-tie mr-1 text-amber-600"></i> សម្ដែងដោយ៖ {{ $dhamma->preacher }}</span>
            <span>•</span>
            <span><i class="fa-regular fa-clock mr-1 text-amber-600"></i> {{ $dhamma->read_time }} នាទីអាន</span>
            <span>•</span>
            <span><i class="fa-regular fa-eye mr-1 text-amber-600"></i> {{ $dhamma->views }} ចូលមើល</span>
        </div>
    </div>

    @if($dhamma->audio_url)
        <div class="bg-gradient-to-r from-red-950 to-amber-950 text-amber-100 p-6 rounded-2xl shadow-lg border border-amber-500/30 space-y-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-amber-500 text-red-950 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-volume-high"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-sm text-amber-300">សំឡេងទេសនាធម៌</h4>
                        <p class="text-xs text-amber-200/70">ស្ដាប់សំឡេងធម្មទេសនាផ្ទាល់</p>
                    </div>
                </div>
                @if($dhamma->duration)
                    <span class="text-xs bg-black/40 px-2.5 py-1 rounded-full text-amber-300 font-mono">{{ $dhamma->duration }}</span>
                @endif
            </div>
            <audio controls class="w-full accent-amber-500 pt-2">
                <source src="{{ $dhamma->audio_url }}" type="audio/mpeg">
            </audio>
        </div>
    @endif

    <!-- Content Body -->
    <div class="prose prose-amber max-w-none text-gray-800 text-sm sm:text-base leading-relaxed space-y-4 bg-white p-6 sm:p-8 rounded-2xl shadow-sm border border-gray-100">
        {!! $dhamma->content !!}
    </div>

    <!-- Share & Footer -->
    <div class="pt-6 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs">
        <a href="{{ route('dhamma.index') }}" class="text-amber-800 font-bold hover:underline flex items-center gap-1">
            <i class="fa-solid fa-arrow-left"></i> ត្រឡប់ទៅកាន់បណ្ណាល័យធម៌
        </a>
        <div class="flex items-center gap-2">
            <span class="text-gray-500">ចែករំលែកធម្មទាន៖</span>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center hover:opacity-90">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($dhamma->title) }}" target="_blank" class="w-8 h-8 rounded-full bg-blue-400 text-white flex items-center justify-center hover:opacity-90">
                <i class="fa-brands fa-telegram"></i>
            </a>
        </div>
    </div>

    <!-- Related Dhammas -->
    @if($relatedDhammas->count() > 0)
        <div class="pt-10 border-t border-gray-200 space-y-6">
            <h3 class="font-moul text-lg text-red-950">អត្ថបទធម៌ទាក់ទង</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedDhammas as $rDhamma)
                    <div class="bg-white rounded-xl p-5 border border-gray-200 shadow-sm hover:shadow-md transition">
                        <span class="text-[10px] bg-amber-100 text-amber-900 font-bold px-2 py-0.5 rounded">{{ $rDhamma->category }}</span>
                        <h4 class="font-bold text-xs text-gray-900 line-clamp-2 mt-2 mb-1 hover:text-red-900">
                            <a href="{{ route('dhamma.show', $rDhamma->slug) }}">{{ $rDhamma->title }}</a>
                        </h4>
                        <div class="text-[11px] text-gray-500">{{ $rDhamma->preacher }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</div>

@endsection
