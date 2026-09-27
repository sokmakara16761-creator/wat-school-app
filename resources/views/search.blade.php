@extends('layouts.app')

@section('title', 'លទ្ធផលស្វែងរក: ' . $query . ' - វត្តព្រៃស្ដី')

@section('content')

<div class="bg-gradient-to-r from-red-950 via-red-900 to-amber-950 text-white py-10 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-2">
        <h1 class="font-moul text-xl sm:text-2xl text-amber-300">
            លទ្ធផលស្វែងរកសម្រាប់៖ «{{ $query }}»
        </h1>
        <p class="text-xs text-amber-100/80">
            ស្វែងរកឃើញ {{ $posts->count() + $dhammas->count() + $events->count() }} លទ្ធផល
        </p>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">
    
    <!-- Posts Results -->
    @if($posts->count() > 0)
        <div class="space-y-4">
            <h3 class="font-moul text-base text-red-950 border-b pb-2 flex items-center gap-2">
                <i class="fa-regular fa-newspaper text-amber-600"></i> អត្ថបទព័ត៌មាន ({{ $posts->count() }})
            </h3>
            <div class="space-y-3">
                @foreach($posts as $p)
                    <div class="bg-white p-4 rounded-xl border border-gray-200 hover:border-amber-300 shadow-sm transition">
                        <span class="text-[10px] bg-amber-100 text-amber-900 font-bold px-2 py-0.5 rounded">{{ $p->category }}</span>
                        <h4 class="font-bold text-sm text-gray-900 mt-1 mb-1">
                            <a href="{{ route('posts.show', $p->slug) }}" class="hover:text-red-900">{{ $p->title }}</a>
                        </h4>
                        <p class="text-xs text-gray-600 line-clamp-2">{{ $p->excerpt }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Dhammas Results -->
    @if($dhammas->count() > 0)
        <div class="space-y-4">
            <h3 class="font-moul text-base text-red-950 border-b pb-2 flex items-center gap-2">
                <i class="fa-solid fa-om text-amber-600"></i> ព្រះធម៌ និងគតិអប់រំ ({{ $dhammas->count() }})
            </h3>
            <div class="space-y-3">
                @foreach($dhammas as $d)
                    <div class="bg-white p-4 rounded-xl border border-gray-200 hover:border-amber-300 shadow-sm transition">
                        <span class="text-[10px] bg-amber-100 text-amber-900 font-bold px-2 py-0.5 rounded">{{ $d->category }}</span>
                        <h4 class="font-bold text-sm text-gray-900 mt-1 mb-1">
                            <a href="{{ route('dhamma.show', $d->slug) }}" class="hover:text-red-900">{{ $d->title }}</a>
                        </h4>
                        <p class="text-xs text-gray-600 line-clamp-2">{{ $d->excerpt }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Events Results -->
    @if($events->count() > 0)
        <div class="space-y-4">
            <h3 class="font-moul text-base text-red-950 border-b pb-2 flex items-center gap-2">
                <i class="fa-regular fa-calendar text-amber-600"></i> កម្មវិធីបុណ្យទាន ({{ $events->count() }})
            </h3>
            <div class="space-y-3">
                @foreach($events as $e)
                    <div class="bg-white p-4 rounded-xl border border-gray-200 hover:border-amber-300 shadow-sm transition">
                        <h4 class="font-bold text-sm text-gray-900 mb-1">
                            <a href="{{ route('events.show', $e->slug) }}" class="hover:text-red-900">{{ $e->title }}</a>
                        </h4>
                        <div class="text-xs text-amber-800 mb-1"><i class="fa-solid fa-location-dot mr-1"></i> {{ $e->location }}</div>
                        <p class="text-xs text-gray-600 line-clamp-2">{{ $e->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if($posts->count() == 0 && $dhammas->count() == 0 && $events->count() == 0)
        <div class="text-center py-16 text-gray-500">
            <i class="fa-solid fa-magnifying-glass text-4xl text-gray-300 mb-3 block"></i>
            ពុំមានទិន្នន័យត្រូវគ្នានឹងពាក្យស្វែងរក «{{ $query }}» ឡើយ។
        </div>
    @endif

</div>

@endsection
