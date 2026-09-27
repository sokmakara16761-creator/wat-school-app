@extends('layouts.app')

@section('title', $video->title . ' - វត្តព្រៃស្ដី')

@section('content')

<!-- Header Breadcrumb -->
<div class="bg-gradient-to-r from-red-950 via-red-900 to-amber-950 text-white py-8 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-2">
        <div class="flex items-center gap-2 text-xs text-amber-200/80">
            <a href="{{ route('home') }}" class="hover:underline">ទំព័រដើម</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <a href="{{ route('videos.index') }}" class="hover:underline">វីដេអូធម្មទេសនា</a>
            <i class="fa-solid fa-chevron-right text-[10px]"></i>
            <span class="text-white truncate max-w-xs">{{ $video->title }}</span>
        </div>
        <h1 class="font-moul text-xl sm:text-2xl text-amber-300 leading-relaxed">
            {{ $video->title }}
        </h1>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10" x-data="{ playerMode: '{{ $video->is_portrait ? 'vertical' : 'landscape' }}' }">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        <!-- Left: Main Video Player & Details -->
        <div class="lg:col-span-8 space-y-6">
            
            <!-- View Mode Switcher -->
            <div class="flex items-center justify-between bg-white p-3 sm:p-4 rounded-2xl shadow-sm border border-amber-100">
                <span class="text-xs font-bold text-gray-700 flex items-center gap-1.5">
                    <i class="fa-solid fa-sliders text-amber-600"></i> ទម្រង់មើលវីដេអូ៖
                </span>
                <div class="flex items-center gap-1 bg-amber-50 p-1 rounded-xl border border-amber-200 text-xs">
                    <button @click="playerMode = 'vertical'" 
                            class="px-3 py-1.5 rounded-lg font-bold transition flex items-center gap-1"
                            :class="playerMode === 'vertical' ? 'bg-gradient-to-r from-red-900 to-amber-800 text-white shadow' : 'text-gray-600 hover:text-red-900'">
                        <i class="fa-solid fa-mobile-screen"></i> បញ្ឈរ (Vertical)
                    </button>
                    <button @click="playerMode = 'landscape'" 
                            class="px-3 py-1.5 rounded-lg font-bold transition flex items-center gap-1"
                            :class="playerMode === 'landscape' ? 'bg-gradient-to-r from-red-900 to-amber-800 text-white shadow' : 'text-gray-600 hover:text-red-900'">
                        <i class="fa-solid fa-desktop"></i> ផ្តេក (Landscape)
                    </button>
                </div>
            </div>

            <!-- Video Player Containers -->
            <div x-show="playerMode === 'vertical'" class="flex flex-col items-center justify-center py-2">
                <div class="relative w-full max-w-[380px] sm:max-w-[400px] rounded-3xl overflow-hidden shadow-2xl bg-black border-4 border-amber-400 ring-4 ring-amber-500/20"
                     style="height: 680px;">
                    <iframe src="{{ $video->embed_url }}" 
                            title="{{ $video->title }}" 
                            frameborder="0" 
                            scrolling="no"
                            allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                            style="width: 100%; height: 100%; border: none;">
                    </iframe>
                </div>
                @if(str_contains($video->youtube_url ?? '', 'facebook.com') || (is_numeric($video->youtube_id ?? '') && strlen($video->youtube_id) > 12))
                    <div class="mt-4">
                        <a href="{{ $video->youtube_url }}" target="_blank" class="inline-flex items-center gap-2 bg-[#1877F2] hover:bg-blue-700 text-white font-bold text-xs px-5 py-2.5 rounded-xl shadow-md transition">
                            <i class="fa-brands fa-facebook text-sm"></i> ទស្សនាផ្ទាល់លើ Facebook App / Web
                        </a>
                    </div>
                @endif
            </div>

            <div x-show="playerMode === 'landscape'" class="relative w-full rounded-3xl overflow-hidden shadow-2xl bg-black aspect-video border-2 border-amber-500/30">
                <iframe src="{{ $video->embed_url }}" 
                        title="{{ $video->title }}" 
                        frameborder="0" 
                        scrolling="no"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                        class="w-full h-full">
                </iframe>
            </div>

            <!-- Video Metadata Card -->
            <div class="bg-white rounded-2xl p-6 shadow-md border border-amber-100 space-y-4">
                
                <div class="flex flex-wrap items-center justify-between gap-3 pb-4 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <span class="bg-red-100 text-red-900 text-xs font-bold px-3 py-1 rounded-full">
                            {{ $video->category }}
                        </span>
                        <span class="text-xs text-gray-500">
                            <i class="fa-regular fa-clock mr-1"></i> {{ $video->duration }}
                        </span>
                    </div>

                    <div class="text-xs text-gray-500 flex items-center gap-4">
                        <span><i class="fa-regular fa-eye mr-1"></i> {{ number_format($video->views) }} views</span>
                        <span><i class="fa-regular fa-calendar mr-1"></i> {{ $video->published_at ? $video->published_at->format('d/m/Y') : date('d/m/Y') }}</span>
                    </div>
                </div>

                <!-- Preacher Details -->
                <div class="flex items-center gap-3 py-1">
                    <div class="w-12 h-12 rounded-full bg-amber-100 border border-amber-300 flex items-center justify-center text-amber-800 text-xl font-bold">
                        <i class="fa-solid fa-microphone-lines"></i>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500">ព្រះថេរ/វាគ្មិនទេសនា</div>
                        <h3 class="font-moul text-sm text-red-950">{{ $video->preacher }}</h3>
                    </div>
                </div>

                <!-- Description -->
                <div class="pt-2 text-xs sm:text-sm leading-relaxed text-gray-700 space-y-2">
                    <h4 class="font-bold text-gray-900 text-sm">សេចក្តីសង្ខេប៖</h4>
                    <p>{{ $video->description }}</p>
                </div>

                <!-- Social Share Buttons -->
                <div class="pt-4 border-t border-gray-100 flex flex-wrap items-center justify-between gap-3">
                    <span class="text-xs font-semibold text-gray-700">ចែករំលែកធម្មទាន៖</span>
                    <div class="flex items-center gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3.5 py-2 rounded-xl flex items-center gap-1.5 transition">
                            <i class="fa-brands fa-facebook-f"></i> Facebook
                        </a>
                        <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}&text={{ urlencode($video->title) }}" target="_blank" class="bg-sky-500 hover:bg-sky-600 text-white text-xs font-semibold px-3.5 py-2 rounded-xl flex items-center gap-1.5 transition">
                            <i class="fa-brands fa-telegram"></i> Telegram
                        </a>
                        <button onclick="navigator.clipboard.writeText(window.location.href); alert('បានចម្លងតំណភ្ជាប់ (Link) ដោយជោគជ័យ!');" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-semibold px-3.5 py-2 rounded-xl flex items-center gap-1.5 transition">
                            <i class="fa-solid fa-link"></i> ចម្លង Link
                        </button>
                    </div>
                </div>

            </div>

        </div>

        <!-- Right: Related Videos Sidebar -->
        <div class="lg:col-span-4 space-y-6">
            <div class="bg-white rounded-2xl p-6 shadow-md border border-amber-100 space-y-4">
                <h3 class="font-moul text-sm text-red-950 flex items-center gap-2 pb-3 border-b border-gray-100">
                    <i class="fa-solid fa-film text-amber-600"></i> វីដេអូផ្សេងៗទៀត
                </h3>

                <div class="space-y-4">
                    @foreach($relatedVideos as $rel)
                        <a href="{{ route('videos.show', $rel->slug) }}" class="flex gap-3 group">
                            <div class="w-28 h-18 rounded-xl overflow-hidden bg-black flex-shrink-0 relative aspect-video">
                                <img src="{{ $rel->thumbnail_url }}" alt="{{ $rel->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                <div class="absolute bottom-1 right-1 bg-black/80 text-white text-[9px] px-1 rounded">
                                    {{ $rel->duration }}
                                </div>
                            </div>
                            <div class="space-y-1">
                                <h4 class="text-xs font-bold text-gray-900 group-hover:text-amber-800 transition line-clamp-2 leading-snug">
                                    {{ $rel->title }}
                                </h4>
                                <p class="text-[10px] text-gray-500 truncate">{{ $rel->preacher }}</p>
                                <span class="text-[10px] text-amber-700 font-semibold">{{ $rel->category }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="pt-2">
                    <a href="{{ route('videos.index') }}" class="block w-full text-center bg-amber-50 hover:bg-amber-100 text-red-900 text-xs font-bold py-2.5 rounded-xl border border-amber-200 transition">
                        មើលវីដេអូទាំងអស់ <i class="fa-solid fa-arrow-right text-[10px] ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Donation Box in Sidebar -->
            <div class="bg-gradient-to-br from-red-950 to-amber-950 text-white rounded-2xl p-6 shadow-xl border border-amber-400/40 text-center space-y-3">
                <i class="fa-solid fa-hand-holding-heart text-3xl text-amber-400"></i>
                <h4 class="font-moul text-sm text-amber-300">ចូលរួមឧបត្ថម្ភធម្មទាន</h4>
                <p class="text-xs text-amber-100/80 leading-relaxed">
                    ចូលរួមជាបច្ច័យទ្រទ្រង់ការផ្សព្វផ្សាយព្រះធម៌ និងការកសាងសមិទ្ធផលក្នុងវត្តអារាម
                </p>
                <a href="{{ route('donation.index') }}" class="inline-block bg-amber-500 hover:bg-amber-400 text-red-950 font-bold text-xs px-5 py-2.5 rounded-xl shadow transition">
                    ចូលរួមកុសលឥឡូវនេះ
                </a>
            </div>

        </div>

    </div>
</div>

@endsection
