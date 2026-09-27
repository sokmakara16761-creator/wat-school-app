@extends('layouts.app')

@section('title', 'កម្មវិធីបុណ្យទាន និងព្រឹត្តិការណ៍ - វត្តព្រៃស្ដី')

@section('content')

<!-- Header Banner -->
<div class="bg-gradient-to-r from-red-950 via-red-900 to-amber-950 text-white py-12 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-400/30 text-xs px-3 py-1 rounded-full font-semibold">
            ប្រតិទិនបុណ្យជាតិ និងសាសនា
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            កម្មវិធីបុណ្យទាន និងព្រឹត្តិការណ៍
        </h1>
        <p class="text-amber-100/80 text-sm max-w-2xl mx-auto">
            កាលវិភាគពិធីបុណ្យប្រពៃណីព្រះពុទ្ធសាសនា និងកម្មវិធីផ្សេងៗរបស់វត្ត និងសាលារៀន
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12">
    
    <!-- Upcoming Events Section -->
    <div class="space-y-6">
        <h2 class="font-moul text-xl text-red-950 flex items-center gap-2 border-b border-gray-200 pb-3">
            <i class="fa-solid fa-calendar-star text-amber-600"></i> កម្មវិធីបុណ្យជិតមកដល់
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($upcomingEvents as $event)
                <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-amber-200 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ $event->image ?? 'https://images.unsplash.com/photo-1548625361-04285e6878b3?w=800&auto=format&fit=crop&q=80' }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute top-3 left-3 bg-red-900 text-amber-300 text-xs font-bold px-3 py-1 rounded-full shadow">
                                {{ $event->lunar_date }}
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="text-xs text-amber-800 font-semibold mb-2 flex items-center gap-2">
                                <i class="fa-regular fa-calendar text-amber-600"></i> {{ \Carbon\Carbon::parse($event->start_date)->format('d M, Y') }}
                                <span>•</span>
                                <i class="fa-solid fa-location-dot text-amber-600"></i> {{ $event->location }}
                            </div>

                            <h3 class="font-bold text-gray-900 group-hover:text-red-900 text-base mb-2 transition">
                                <a href="{{ route('events.show', $event->slug) }}">
                                    {{ $event->title }}
                                </a>
                            </h3>

                            <p class="text-xs text-gray-600 line-clamp-3 leading-relaxed">
                                {{ $event->description }}
                            </p>
                        </div>
                    </div>

                    <div class="p-6 pt-0 border-t border-gray-100 flex items-center justify-between">
                        <a href="{{ route('events.show', $event->slug) }}" class="text-xs font-bold text-red-900 hover:text-amber-700 flex items-center gap-1 transition">
                            មើលកម្មវិធីបុណ្យលម្អិត <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-gray-500">
                    មិនទាន់មានកម្មវិធីបុណ្យជិតមកដល់នៅឡើយទេ។
                </div>
            @endforelse
        </div>
    </div>

</div>

@endsection
