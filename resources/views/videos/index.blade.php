@extends('layouts.app')

@section('title', 'វីដេអូធម្មទេសនា និងសកម្មភាពវត្ត - វត្តព្រៃស្ដី')

@section('content')

<!-- Header Banner -->
<div class="bg-gradient-to-r from-red-950 via-red-900 to-amber-950 text-white py-12 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-400/30 text-xs px-3.5 py-1 rounded-full font-semibold">
            <i class="fa-solid fa-video mr-1"></i> សោតទស្សន៍ព្រះពុទ្ធសាសនា
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            វីដេអូធម្មទេសនា និងសកម្មភាពវត្ត (Videos)
        </h1>
        <p class="text-amber-100/80 text-xs sm:text-sm max-w-2xl mx-auto">
            ទស្សនាវីដេអូធម្មទេសនា ពិធីបុណ្យជាតិ-សាសនា និងសកម្មភាពអប់រំពុទ្ធិកសិក្សា
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">

    <!-- Search & Category Filters -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 bg-white p-4 rounded-2xl shadow-sm border border-amber-100">
        
        <!-- Category Tabs -->
        <div class="flex flex-wrap items-center gap-2 w-full md:w-auto">
            @foreach($categories as $key => $label)
                <a href="{{ route('videos.index', ['category' => $key, 'search' => $search]) }}" 
                   class="px-3.5 py-2 rounded-xl text-xs font-semibold transition {{ ($category == $key || (!$category && $key == 'all')) ? 'bg-gradient-to-r from-red-900 to-amber-800 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-amber-50 hover:text-red-900' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <!-- Search Input -->
        <form action="{{ route('videos.index') }}" method="GET" class="w-full md:w-72">
            @if($category)
                <input type="hidden" name="category" value="{{ $category }}">
            @endif
            <div class="relative">
                <input type="text" name="search" value="{{ $search }}" placeholder="ស្វែងរកវីដេអូ ឬធម្មទេសនា..." class="w-full bg-gray-50 border border-gray-200 rounded-xl pl-3.5 pr-10 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-amber-500 focus:bg-white">
                <button type="submit" class="absolute right-3 top-2.5 text-gray-400 hover:text-amber-700">
                    <i class="fa-solid fa-magnifying-glass text-xs"></i>
                </button>
            </div>
        </form>

    </div>

    <!-- Video Grid -->
    @if($videos->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($videos as $v)
                <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-amber-100 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Thumbnail Container with Play Overlay -->
                        <div class="relative aspect-video bg-gray-900 overflow-hidden">
                            <img src="{{ $v->thumbnail_url }}" alt="{{ $v->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            
                            <!-- Duration Badge -->
                            <div class="absolute bottom-2 right-2 bg-black/80 text-white text-[10px] font-mono px-2 py-0.5 rounded backdrop-blur-sm">
                                <i class="fa-regular fa-clock mr-1"></i>{{ $v->duration }}
                            </div>

                            <!-- Category Badge -->
                            <div class="absolute top-2 left-2 flex items-center gap-1.5">
                                <span class="bg-red-900/90 text-amber-300 text-[10px] font-semibold px-2.5 py-0.5 rounded-full shadow">
                                    {{ $v->category }}
                                </span>
                                @if($v->is_portrait)
                                    <span class="bg-gradient-to-r from-pink-600 to-rose-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow flex items-center gap-1">
                                        <i class="fa-solid fa-mobile-screen"></i> Reel
                                    </span>
                                @endif
                            </div>

                            <!-- Center Play Icon Overlay -->
                            <a href="{{ route('videos.show', $v->slug) }}" class="absolute inset-0 bg-black/30 group-hover:bg-black/10 flex items-center justify-center transition">
                                <div class="w-12 h-12 rounded-full bg-amber-500 text-red-950 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-play text-base ml-1"></i>
                                </div>
                            </a>
                        </div>

                        <!-- Card Body -->
                        <div class="p-5 space-y-2">
                            <a href="{{ route('videos.show', $v->slug) }}" class="block font-bold text-gray-900 text-sm group-hover:text-amber-800 transition line-clamp-2 leading-snug">
                                {{ $v->title }}
                            </a>

                            <div class="text-[11px] text-amber-800 font-semibold flex items-center gap-1.5">
                                <i class="fa-solid fa-microphone-lines text-amber-600"></i>
                                <span class="truncate">{{ $v->preacher }}</span>
                            </div>

                            <p class="text-xs text-gray-600 line-clamp-2 leading-relaxed">
                                {{ $v->description }}
                            </p>
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="px-5 py-3.5 bg-gray-50/70 border-t border-gray-100 flex items-center justify-between text-[11px] text-gray-500">
                        <span><i class="fa-regular fa-eye mr-1"></i> {{ number_format($v->views) }} ដង</span>
                        <a href="{{ route('videos.show', $v->slug) }}" class="text-red-900 font-semibold hover:text-amber-700 flex items-center gap-1">
                            ទស្សនា <i class="fa-solid fa-arrow-right text-[9px]"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pt-6">
            {{ $videos->links() }}
        </div>
    @else
        <div class="text-center py-16 bg-white rounded-3xl border border-amber-100 p-8 space-y-3">
            <i class="fa-solid fa-video-slash text-4xl text-gray-300"></i>
            <h3 class="font-moul text-base text-gray-700">រកមិនឃើញវីដេអូដែលស្វែងរកទេ</h3>
            <p class="text-xs text-gray-500">សូមសាកល្បងស្វែងរកដោយប្រើពាក្យគន្លឹះផ្សេងទៀត</p>
            <a href="{{ route('videos.index') }}" class="inline-block bg-amber-100 text-red-900 text-xs font-semibold px-4 py-2 rounded-xl mt-2">
                មើលវីដេអូទាំងអស់
            </a>
        </div>
    @endif

</div>

@endsection
