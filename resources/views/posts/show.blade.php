@extends('layouts.app')

@section('title', $post->title . ' - វត្តព្រៃស្ដី')

@section('content')

<!-- Header Breadcrumb -->
<div class="bg-amber-50/60 border-b border-amber-200/60 py-4">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-xs text-gray-500 flex items-center gap-2">
        <a href="{{ route('home') }}" class="hover:text-amber-700">ទំព័រដើម</a>
        <i class="fa-solid fa-chevron-right text-[10px]"></i>
        <a href="{{ route('posts.index') }}" class="hover:text-amber-700">ព័ត៌មាន</a>
        <i class="fa-solid fa-chevron-right text-[10px]"></i>
        <span class="text-amber-900 font-semibold truncate">{{ $post->title }}</span>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <div class="space-y-4">
        <span class="inline-block bg-amber-100 text-red-900 font-bold text-xs px-3 py-1 rounded-md">
            {{ $post->category }}
        </span>
        <h1 class="font-moul text-xl sm:text-2xl lg:text-3xl text-red-950 leading-relaxed">
            {{ $post->title }}
        </h1>
        <div class="flex flex-wrap items-center gap-4 text-xs text-gray-500 border-b border-gray-200 pb-4">
            <span><i class="fa-regular fa-clock mr-1 text-amber-600"></i> {{ $post->published_at ? $post->published_at->format('d F Y') : '' }}</span>
            <span>•</span>
            <span><i class="fa-regular fa-user mr-1 text-amber-600"></i> {{ $post->author }}</span>
            <span>•</span>
            <span><i class="fa-regular fa-eye mr-1 text-amber-600"></i> {{ $post->views }} ចូលមើល</span>
        </div>
    </div>

    @if($post->thumbnail)
        <div class="rounded-2xl overflow-hidden shadow-lg border border-amber-200">
            <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" class="w-full max-h-96 object-cover">
        </div>
    @endif

    <!-- Content Body -->
    <div class="prose prose-amber max-w-none text-gray-800 text-sm sm:text-base leading-relaxed space-y-4">
        {!! $post->content !!}
    </div>

    <!-- Share & Footer -->
    <div class="pt-6 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs">
        <a href="{{ route('posts.index') }}" class="text-amber-800 font-bold hover:underline flex items-center gap-1">
            <i class="fa-solid fa-arrow-left"></i> ត្រឡប់ទៅកាន់ព័ត៌មានទាំងអស់
        </a>
        <div class="flex items-center gap-2">
            <span class="text-gray-500">ចែករំលែក៖</span>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center hover:opacity-90">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}" target="_blank" class="w-8 h-8 rounded-full bg-blue-400 text-white flex items-center justify-center hover:opacity-90">
                <i class="fa-brands fa-telegram"></i>
            </a>
        </div>
    </div>

    <!-- Related Posts -->
    @if($relatedPosts->count() > 0)
        <div class="pt-10 border-t border-gray-200 space-y-6">
            <h3 class="font-moul text-lg text-red-950">អត្ថបទព័ត៌មានទាក់ទង</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedPosts as $rPost)
                    <div class="bg-white rounded-xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition">
                        <img src="{{ $rPost->thumbnail }}" alt="{{ $rPost->title }}" class="w-full h-32 object-cover">
                        <div class="p-4">
                            <h4 class="font-bold text-xs text-gray-900 line-clamp-2 mb-1 hover:text-red-900">
                                <a href="{{ route('posts.show', $rPost->slug) }}">{{ $rPost->title }}</a>
                            </h4>
                            <div class="text-[10px] text-gray-500">{{ $rPost->published_at ? $rPost->published_at->format('d/m/Y') : '' }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</div>

@endsection
