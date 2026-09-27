@extends('layouts.app')

@section('title', 'តារាងកិត្តិយសសមណសិស្ស - ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី')

@section('content')

<!-- Header Banner -->
<div class="bg-gradient-to-r from-red-950 via-amber-900 to-amber-950 text-white py-12 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-400/30 text-xs px-3 py-1 rounded-full font-semibold">
            ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            តារាងកិត្តិយសសមណសិស្សឆ្នើម
        </h1>
        <p class="text-amber-100/80 text-sm max-w-2xl mx-auto">
            បង្ហាញពីសមណសិស្សដែលមានការខិតខំប្រឹងប្រែងរៀនសូត្រទទួលបានជ័យលាភី និងនិទ្ទេសល្អប្រសើរ
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($achievements as $ach)
            <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-amber-200 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="relative h-56 overflow-hidden bg-amber-50">
                        <img src="{{ $ach->photo }}" alt="{{ $ach->student_name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-3 right-3 bg-amber-500 text-red-950 text-xs font-bold px-3 py-1 rounded-full shadow">
                            <i class="fa-solid fa-medal text-red-900 mr-1"></i> {{ $ach->badge ?? 'ជ័យលាភី' }}
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center gap-2 text-xs text-amber-800 font-semibold mb-2">
                            <span><i class="fa-solid fa-calendar mr-1"></i> ឆ្នាំសិក្សា {{ $ach->academic_year }}</span>
                            <span>•</span>
                            <span>{{ $ach->grade_level }}</span>
                        </div>
                        <h3 class="font-bold text-gray-900 text-base mb-1">{{ $ach->student_name }}</h3>
                        @if($ach->dharma_name)
                            <div class="text-xs text-gray-500 mb-3">ឆាយា៖ {{ $ach->dharma_name }}</div>
                        @endif
                        <div class="bg-amber-50/70 p-3 rounded-xl border border-amber-100 text-xs font-semibold text-red-900 mb-3">
                            {{ $ach->title }}
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ $ach->description }}
                        </p>
                    </div>
                </div>

                <div class="p-6 pt-0 border-t border-gray-100 mt-4">
                    <div class="text-xs text-gray-400 text-center">
                        <i class="fa-solid fa-certificate text-amber-500 mr-1"></i> ទទួលស្គាល់ដោយគណៈគ្រប់គ្រងសាលា
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
