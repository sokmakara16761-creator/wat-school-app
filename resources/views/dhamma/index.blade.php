@extends('layouts.app')

@section('title', 'ព្រះធម៌ និងអត្ថបទអប់រំ - វត្តព្រៃស្ដី')

@section('content')

<!-- Header Banner -->
<div class="bg-gradient-to-r from-red-950 via-red-900 to-amber-950 text-white py-12 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-400/30 text-xs px-3 py-1 rounded-full font-semibold">
            ធម្មទាន និងការអប់រំចិត្ត
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            បណ្ណាល័យព្រះធម៌ និងសំឡេងទេសនា
        </h1>
        <p class="text-amber-100/80 text-sm max-w-2xl mx-auto">
            ស្ដាប់ និងអានព្រះធម៌ទេសនា គតិអប់រំជីវិត និងវិធីចម្រើនសមាធិភាវនា ដើម្បីចិត្តស្ងប់និងកើតបញ្ញា
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
            <a href="{{ $cat == 'ទាំងអស់' ? route('dhamma.index') : route('dhamma.index', ['category' => $cat]) }}" class="px-4 py-2 rounded-xl text-xs font-semibold transition {{ $isActive ? 'bg-amber-600 text-white shadow-md' : 'bg-white text-gray-700 hover:bg-amber-50 border border-gray-200' }}">
                {{ $cat }}
            </a>
        @endforeach
    </div>

    <!-- Dhamma Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($dhammas as $item)
            <div class="bg-white rounded-2xl p-6 shadow-md border border-amber-100 hover:border-amber-400 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="flex items-center justify-between text-xs text-amber-800 mb-3">
                        <span class="bg-amber-50 border border-amber-200 px-2.5 py-0.5 rounded-full font-medium">
                            {{ $item->category }}
                        </span>
                        <span><i class="fa-regular fa-clock mr-1 text-amber-600"></i> {{ $item->read_time }} នាទីអាន</span>
                    </div>

                    <h3 class="font-bold text-gray-900 group-hover:text-red-900 text-base mb-2 leading-snug">
                        <a href="{{ route('dhamma.show', $item->slug) }}">
                            {{ $item->title }}
                        </a>
                    </h3>

                    <div class="text-xs text-amber-700 font-semibold mb-3">
                        <i class="fa-solid fa-user-tie text-amber-600 mr-1"></i> {{ $item->preacher }}
                    </div>

                    <p class="text-xs text-gray-600 line-clamp-3 leading-relaxed mb-4">
                        {{ $item->excerpt }}
                    </p>
                </div>

                <div class="space-y-3 pt-4 border-t border-gray-100">
                    @if($item->audio_url)
                        <div class="bg-amber-50/70 p-2.5 rounded-xl border border-amber-200/60">
                            <div class="flex items-center justify-between text-[11px] text-amber-900 font-semibold mb-1">
                                <span><i class="fa-solid fa-volume-high text-amber-600 mr-1"></i> សំឡេងទេសនា</span>
                                <span>{{ $item->duration }}</span>
                            </div>
                            <audio controls class="w-full h-8 accent-amber-600">
                                <source src="{{ $item->audio_url }}" type="audio/mpeg">
                            </audio>
                        </div>
                    @endif

                    <div class="flex items-center justify-between pt-2 text-xs">
                        <a href="{{ route('dhamma.show', $item->slug) }}" class="font-bold text-red-900 hover:text-amber-700 flex items-center gap-1 transition">
                            អានអត្ថបទពេញ <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                        <span class="text-gray-400 text-[11px]"><i class="fa-regular fa-eye mr-1"></i> {{ $item->views }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-16 text-gray-500">
                <i class="fa-solid fa-om text-4xl text-gray-300 mb-3 block"></i>
                មិនទាន់មានអត្ថបទធម៌ក្នុងផ្នែកនេះនៅឡើយទេ។
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="pt-6">
        {{ $dhammas->links() }}
    </div>

</div>

@endsection
