@extends('layouts.app')

@section('title', 'គណៈគ្រប់គ្រង និងសមណគ្រូ - ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី')

@section('content')

<!-- Header Banner -->
<div class="bg-gradient-to-r from-red-950 via-amber-900 to-amber-950 text-white py-12 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-400/30 text-xs px-3 py-1 rounded-full font-semibold">
            ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            គណៈគ្រប់គ្រង និងសមណគ្រូ-លោកគ្រូ
        </h1>
        <p class="text-amber-100/80 text-sm max-w-2xl mx-auto">
            សមាសភាពព្រះថេរានុថេរៈ សមណគ្រូ និងលោកគ្រូអ្នកគ្រូ ដែលបានលះបង់កម្លាំងកាយចិត្តក្នុងការបណ្ដុះបណ្ដាលសមណសិស្ស
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12">

    <!-- Organizational Structure Chart (Interactive HD Display) -->
    <x-org-chart />

    <div>
        <h2 class="font-moul text-xl text-red-950 mb-6 border-b border-gray-200 pb-3">សមាសភាពបុគ្គលិក និងសមណគ្រូ</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
        @foreach($teachers as $t)
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-md border border-amber-100 hover:shadow-xl transition-all duration-300 flex flex-col sm:flex-row gap-6 items-center sm:items-start">
                <div class="w-32 h-32 rounded-2xl overflow-hidden border-4 border-amber-300 shadow-md flex-shrink-0 relative">
                    <img src="{{ $t->photo }}?v={{ time() }}" alt="{{ $t->name }}" class="w-full h-full object-cover">
                </div>
                <div class="space-y-3 text-center sm:text-left flex-grow">
                    <div>
                        <span class="bg-amber-100 text-amber-900 text-[11px] font-bold px-2.5 py-0.5 rounded">
                            {{ $t->role }}
                        </span>
                        <h3 class="font-bold text-gray-900 text-lg mt-1">{{ $t->name }}</h3>
                        @if($t->dharma_name)
                            <div class="text-xs font-semibold text-red-900">ឆាយា៖ {{ $t->dharma_name }}</div>
                        @endif
                    </div>
                    
                    <p class="text-xs text-gray-600 leading-relaxed">
                        {{ $t->bio }}
                    </p>

                    <div class="pt-3 border-t border-gray-100 space-y-1.5 text-xs text-gray-500">
                        @if($t->teaching_subjects)
                            <div><i class="fa-solid fa-book-open text-amber-600 mr-1.5"></i> មុខវិជ្ជាបង្រៀន៖ <strong>{{ $t->teaching_subjects }}</strong></div>
                        @endif
                        @if($t->phone)
                            <div><i class="fa-solid fa-phone text-amber-600 mr-1.5"></i> ទូរស័ព្ទ៖ <strong>{{ $t->phone }}</strong></div>
                        @endif
                        @if($t->email)
                            <div><i class="fa-solid fa-envelope text-amber-600 mr-1.5"></i> អ៊ីមែល៖ <strong>{{ $t->email }}</strong></div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>

@endsection
