@extends('layouts.app')

@section('title', 'វិចិត្រសាលរូបភាព - វត្តព្រៃស្ដី')

@section('content')

<!-- Header Banner -->
<div class="bg-gradient-to-r from-red-950 via-red-900 to-amber-950 text-white py-12 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-400/30 text-xs px-3 py-1 rounded-full font-semibold">
            កម្រងអាល់ប៊ុមរូបភាព (Photo Albums)
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            វិចិត្រសាល និងអាល់ប៊ុមរូបភាព
        </h1>
        <p class="text-amber-100/80 text-sm max-w-2xl mx-auto">
            កម្រងរូបភាពអនុស្សាវរីយ៍ ពិធីបុណ្យទាន សកម្មភាពសិក្សា និងសមិទ្ធផលនានាក្នុងវត្តអារាម
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-8" x-data="{ selectedImg: null, selectedCaption: '' }">
    
    <!-- Category Filter Bar -->
    <div class="flex flex-wrap items-center justify-center gap-2">
        @foreach($categories as $cat)
            @php
                $isActive = ($category == $cat) || (!$category && $cat == 'ទាំងអស់');
            @endphp
            <a href="{{ $cat == 'ទាំងអស់' ? route('gallery.index') : route('gallery.index', ['category' => $cat]) }}" class="px-4 py-2 rounded-xl text-xs font-semibold transition {{ $isActive ? 'bg-amber-600 text-white shadow-md' : 'bg-white text-gray-700 hover:bg-amber-50 border border-gray-200' }}">
                {{ $cat }}
            </a>
        @endforeach
    </div>

    <!-- Album Grid (Compact 4-Column Layout) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        @forelse($galleries as $photo)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-amber-100 hover:border-amber-300 transition-all duration-300 flex flex-col group">
                <!-- Album Cover Image with Overlay -->
                <div class="relative h-48 sm:h-52 overflow-hidden bg-gray-900 cursor-pointer"
                     @click="selectedImg = '{{ $photo->image_url }}'; selectedCaption = '{{ addslashes($photo->caption ?? $photo->title) }}'">
                    <img src="{{ $photo->image_url }}?v={{ time() }}" 
                         alt="{{ $photo->title }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/10 to-transparent"></div>
                    
                    <!-- Category Badge -->
                    <span class="absolute top-2.5 left-2.5 bg-red-900/90 backdrop-blur-sm text-amber-300 text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow border border-amber-400/20">
                        {{ $photo->category }}
                    </span>

                    @if($photo->facebook_url)
                        <span class="absolute top-2.5 right-2.5 bg-[#1877F2] text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow inline-flex items-center gap-1">
                            <i class="fa-brands fa-facebook"></i> Facebook
                        </span>
                    @endif

                    <!-- Zoom icon hover -->
                    <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center pointer-events-none">
                        <span class="bg-white/95 text-red-950 text-[11px] font-bold px-2.5 py-1 rounded-full shadow-lg flex items-center gap-1">
                            <i class="fa-solid fa-expand text-amber-600"></i> ពង្រីក
                        </span>
                    </div>

                    <!-- Date info -->
                    @if($photo->event_date)
                        <span class="absolute bottom-2 left-2.5 text-white/90 text-[10px] font-medium drop-shadow">
                            <i class="fa-regular fa-calendar text-amber-300 mr-0.5"></i> {{ $photo->event_date->format('d/m/Y') }}
                        </span>
                    @endif
                </div>

                <!-- Album Description & Actions -->
                <div class="p-4 flex flex-col justify-between flex-grow space-y-3 bg-white">
                    <div>
                        <h3 class="font-bold text-xs sm:text-sm text-gray-900 group-hover:text-red-900 transition line-clamp-2 leading-snug">
                            {{ $photo->title }}
                        </h3>
                        @if($photo->caption)
                            <p class="text-[11px] text-gray-500 line-clamp-2 mt-1 leading-relaxed">
                                {{ $photo->caption }}
                            </p>
                        @endif
                    </div>

                    <div class="pt-2 border-t border-gray-100 flex items-center gap-2">
                        <button type="button"
                                @click="selectedImg = '{{ $photo->image_url }}'; selectedCaption = '{{ addslashes($photo->caption ?? $photo->title) }}'"
                                class="bg-amber-50 hover:bg-amber-100 text-red-950 font-bold text-[11px] py-1.5 px-2.5 rounded-lg transition flex items-center gap-1 border border-amber-200">
                            <i class="fa-solid fa-expand text-amber-700"></i> ពង្រីក
                        </button>

                        @if($photo->facebook_url)
                            <a href="{{ $photo->facebook_url }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="flex-1 bg-[#1877F2] hover:bg-[#0c63d4] text-white font-bold text-[11px] py-1.5 px-2.5 rounded-lg shadow-sm transition flex items-center justify-center gap-1 text-center">
                                <i class="fa-brands fa-facebook text-xs"></i> មើលលើ FB
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16 text-gray-500">
                មិនទាន់មានអាល់ប៊ុមរូបភាពក្នុងផ្នែកនេះនៅឡើយទេ។
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="pt-6">
        {{ $galleries->links() }}
    </div>

    <!-- Lightbox Modal -->
    <div x-show="selectedImg" x-transition.opacity class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md flex items-center justify-center p-4" style="display: none;">
        <div @click.away="selectedImg = null" class="max-w-4xl w-full text-center space-y-4">
            <div class="flex justify-end">
                <button @click="selectedImg = null" class="text-white hover:text-amber-400 text-2xl">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <img :src="selectedImg" class="max-h-[75vh] mx-auto rounded-xl shadow-2xl object-contain">
            <p x-text="selectedCaption" class="text-amber-200 text-sm font-medium"></p>
        </div>
    </div>

</div>

@endsection
