@extends('layouts.app')

@section('title', 'ព័ត៌មាន និងសេចក្ដីប្រកាស - វត្តព្រៃស្ដី')

@section('content')

<!-- Banner Header -->
<div class="bg-gradient-to-r from-red-950 via-red-900 to-amber-950 text-white py-12 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-400/30 text-xs px-3 py-1 rounded-full font-semibold">
            ដំណឹង និងព្រឹត្តិការណ៍
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            ព័ត៌មានថ្មីៗ និងសេចក្ដីប្រកាស
        </h1>
        <p class="text-amber-100/80 text-sm max-w-2xl mx-auto">
            តាមដានរាល់សកម្មភាព ការកសាងវត្តអារាម និងដំណឹងផ្សេងៗរបស់សាលាពុទ្ធិកបឋមសិក្សា
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-8">
    
    <!-- Category Filter Bar -->
    <div class="flex flex-wrap items-center justify-center gap-2">
        @foreach($categories as $cat)
            @php
                $isActive = ($category == $cat) || (!$category && $cat == 'ទាំងអស់');
            @endphp
            <a href="{{ $cat == 'ទាំងអស់' ? route('posts.index') : route('posts.index', ['category' => $cat]) }}" class="px-4 py-2 rounded-xl text-xs font-semibold transition {{ $isActive ? 'bg-red-900 text-amber-300 shadow-md' : 'bg-white text-gray-700 hover:bg-amber-50 border border-gray-200' }}">
                {{ $cat }}
            </a>
        @endforeach
    </div>

    <!-- Posts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($posts as $post)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 flex flex-col group">
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ $post->thumbnail ?? 'https://images.unsplash.com/photo-1590073242678-70ee3fc28e8e?w=800&auto=format&fit=crop&q=80' }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute top-3 left-3 bg-amber-600 text-white text-[11px] font-bold px-2.5 py-1 rounded shadow">
                        {{ $post->category }}
                    </div>
                </div>

                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <div class="text-[11px] text-gray-500 mb-2 flex items-center gap-2">
                            <span><i class="fa-regular fa-clock mr-1 text-amber-600"></i> {{ $post->published_at ? $post->published_at->format('d/m/Y') : '' }}</span>
                            <span>•</span>
                            <span><i class="fa-regular fa-user mr-1 text-amber-600"></i> {{ $post->author }}</span>
                        </div>
                        <h3 class="font-bold text-gray-900 group-hover:text-red-900 text-base leading-snug mb-2 transition line-clamp-2">
                            <a href="{{ route('posts.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="text-xs text-gray-600 line-clamp-3 leading-relaxed">
                            {{ $post->excerpt }}
                        </p>
                    </div>

                    <div class="pt-4 mt-4 border-t border-gray-100 flex items-center justify-between">
                        <a href="{{ route('posts.show', $post->slug) }}" class="text-xs font-bold text-amber-800 hover:text-red-900 flex items-center gap-1 transition">
                            អានបន្ត <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                        <span class="text-[11px] text-gray-400"><i class="fa-regular fa-eye mr-1"></i> {{ $post->views }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-16 text-gray-500">
                <i class="fa-regular fa-newspaper text-4xl text-gray-300 mb-3 block"></i>
                មិនទាន់មានអត្ថបទក្នុងផ្នែកនេះនៅឡើយទេ។
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="pt-6">
        {{ $posts->links() }}
    </div>

</div>

@endsection
