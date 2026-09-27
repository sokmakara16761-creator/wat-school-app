@extends('layouts.app')

@section('title', 'ទំព័រដើម - វត្តព្រៃស្ដី និង ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី')

@section('content')

<!-- Hero Banner Section -->
<section class="relative bg-gradient-to-br from-red-950 via-red-900 to-amber-950 text-white overflow-hidden py-16 lg:py-24 border-b-4 border-amber-500">
    <!-- Traditional Khmer background ornament overlay -->
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f59e0b_1px,transparent_1px)] [background-size:20px_20px]"></div>
    <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 bg-amber-500/20 text-amber-300 border border-amber-400/30 px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-semibold shadow-sm">
                    <img src="{{ asset('images/logo.png') }}" class="w-5 h-5 object-contain inline-block" alt="Logo"> ទីសក្ការបូជា និងថ្នាលបណ្ដុះបណ្ដាលពុទ្ធិកសិក្សា
                </div>

                <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300 leading-relaxed tracking-wide drop-shadow-md">
                    វត្តព្រៃស្ដី <br>
                    <span class="text-white text-xl sm:text-2xl font-normal font-sans block mt-2">
                        និង ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី
                    </span>
                </h1>

                <p class="text-amber-100/90 text-sm sm:text-base leading-relaxed max-w-2xl font-light">
                    ថែរក្សាទំនៀមទម្លាប់ប្រពៃណីព្រះពុទ្ធសាសនា ផ្សព្វផ្សាយព្រះធម៌អប់រំចិត្ត និងផ្ដល់ការអប់រំពុទ្ធិកសិក្សា ភាសាបាលី និងចំណេះដឹងទូទៅដល់កុលបុត្រសមណសិស្ស ដើម្បីជាទំពាំងស្នងឫស្សីក្នុងសង្គមជាតិ។
                </p>

                <div class="flex flex-col sm:flex-row flex-wrap justify-center lg:justify-start gap-3 pt-2">
                    <a href="{{ route('school.admissions') }}" class="w-full sm:w-auto justify-center bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-red-950 font-bold px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 flex items-center gap-2 text-sm">
                        <i class="fa-solid fa-user-graduate"></i> ចុះឈ្មោះចូលរៀនថ្មី
                    </a>
                    <a href="{{ route('pagoda.about') }}" class="w-full sm:w-auto justify-center bg-white/10 hover:bg-white/20 text-amber-200 border border-amber-300/30 font-semibold px-6 py-3 rounded-xl backdrop-blur-sm transition text-sm flex items-center gap-2">
                        <i class="fa-solid fa-place-of-worship text-amber-400"></i> ប្រវត្តិវត្តអារាម
                    </a>
                    <a href="{{ route('donation.index') }}" class="w-full sm:w-auto justify-center bg-red-800/80 hover:bg-red-700 text-amber-200 border border-red-600 font-semibold px-5 py-3 rounded-xl transition text-sm flex items-center gap-2">
                        <i class="fa-solid fa-hand-holding-heart text-amber-400"></i> ចូលរួមបុណ្យកុសល
                    </a>
                </div>

                <!-- Stats summary badge -->
                <div class="pt-6 border-t border-amber-500/20 grid grid-cols-2 sm:grid-cols-4 gap-4 text-center lg:text-left">
                    <div>
                        <div class="font-moul text-xl text-amber-400">៥០+ ឆ្នាំ</div>
                        <div class="text-xs text-amber-200/70">នៃការកកើតវត្ត</div>
                    </div>
                    <div>
                        <div class="font-moul text-xl text-amber-400">១១៥+ អង្គ</div>
                        <div class="text-xs text-amber-200/70">សមណសិស្សកំពុងរៀន</div>
                    </div>
                    <div>
                        <div class="font-moul text-xl text-amber-400">៣ កម្រិត</div>
                        <div class="text-xs text-amber-200/70">ថ្នាក់ត្រី ថ្នាក់ទោ ថ្នាក់ឯ</div>
                    </div>
                    <div>
                        <div class="font-moul text-xl text-amber-400">១០០%</div>
                        <div class="text-xs text-amber-200/70">រៀន និងស្នាក់នៅឥតគិតថ្លៃ</div>
                    </div>
                </div>

            </div>

            <div class="lg:col-span-5 relative" x-data="{
                activeSlide: 0,
                slides: [
                    {
                        image: '{{ asset('images/school_building_construction.jpg') }}',
                        tag: 'វត្តអារាម & ព្រះវិហារ',
                        title: 'វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)',
                        desc: 'វឌ្ឍនភាពនៃការកសាងព្រះវិហារថ្មី និងទីអារាមសក្ការៈ'
                    },
                    {
                        image: '{{ asset('images/school_students_monks.jpg') }}',
                        tag: 'សមណសិស្ស & សាលារៀន',
                        title: 'ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី',
                        desc: 'សមណសិស្ស និងកុលបុត្រទាំង ៣ កម្រិតថ្នាក់ (ថ្នាក់ត្រី ថ្នាក់ទោ ថ្នាក់ឯ)'
                    }
                ],
                init() {
                    setInterval(() => {
                        this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                    }, 5000);
                }
            }">
                <!-- Main Display Frame with Gold Ornate Border -->
                <div class="relative mx-auto max-w-md rounded-3xl overflow-hidden shadow-2xl border-4 border-amber-400/80 group bg-black aspect-[4/3] sm:aspect-[4/3.2]">
                    <template x-for="(slide, idx) in slides" :key="idx">
                        <div x-show="activeSlide === idx" 
                             x-transition:enter="transition ease-out duration-700" 
                             x-transition:enter-start="opacity-0 scale-95" 
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-300"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="absolute inset-0">
                            <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-red-950/95 via-red-950/30 to-transparent flex flex-col justify-end p-5 sm:p-6">
                                <span class="inline-block bg-amber-500 text-red-950 text-[11px] font-bold px-3 py-0.5 rounded-full w-max mb-1.5 shadow" x-text="slide.tag"></span>
                                <h3 class="font-moul text-base sm:text-lg text-amber-300 drop-shadow" x-text="slide.title"></h3>
                                <p class="text-xs text-amber-100/90 drop-shadow" x-text="slide.desc"></p>
                            </div>
                        </div>
                    </template>

                    <!-- Slider Controls / Dots -->
                    <div class="absolute top-3 right-3 flex items-center gap-1.5 z-20 bg-black/50 backdrop-blur-md px-2.5 py-1 rounded-full border border-white/20">
                        <template x-for="(slide, idx) in slides" :key="idx">
                            <button @click="activeSlide = idx" 
                                    class="h-2 rounded-full transition-all duration-300"
                                    :class="activeSlide === idx ? 'w-6 bg-amber-400' : 'w-2 bg-white/60 hover:bg-white'">
                            </button>
                        </template>
                    </div>
                </div>

                <!-- Mini Thumbnail Switcher below -->
                <div class="flex items-center justify-center gap-3 mt-3 max-w-md mx-auto">
                    <button @click="activeSlide = 0" 
                            class="flex items-center gap-2 p-1.5 rounded-xl border-2 transition backdrop-blur-sm bg-black/30"
                            :class="activeSlide === 0 ? 'border-amber-400 bg-amber-500/20 shadow-lg' : 'border-white/20 opacity-70 hover:opacity-100'">
                        <img src="{{ asset('images/school_building_construction.jpg') }}" class="w-10 h-8 rounded-lg object-cover">
                        <span class="text-[11px] text-white font-medium pr-2">ព្រះវិហារវត្ត</span>
                    </button>

                    <button @click="activeSlide = 1" 
                            class="flex items-center gap-2 p-1.5 rounded-xl border-2 transition backdrop-blur-sm bg-black/30"
                            :class="activeSlide === 1 ? 'border-amber-400 bg-amber-500/20 shadow-lg' : 'border-white/20 opacity-70 hover:opacity-100'">
                        <img src="{{ asset('images/school_students_monks.jpg') }}" class="w-10 h-8 rounded-lg object-cover">
                        <span class="text-[11px] text-white font-medium pr-2">សមណសិស្ស</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Buddhist Lunar & Sil Day Interactive Alert Card -->
<section class="-mt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
    <div class="bg-white rounded-3xl shadow-xl border-2 border-amber-400/40 p-5 sm:p-7 backdrop-blur-md">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
            
            <!-- Left: Current Lunar Date & Status -->
            <div class="lg:col-span-7 flex flex-col sm:flex-row items-center sm:items-start gap-4 text-center sm:text-left">
                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-gradient-to-br from-amber-500 to-amber-600 text-white shadow-lg flex flex-col items-center justify-center flex-shrink-0 border-2 border-amber-300">
                    <i class="fa-solid fa-moon text-2xl sm:text-3xl text-amber-100"></i>
                    <span class="text-[10px] font-bold mt-0.5 text-amber-100 uppercase">ចន្ទគតិ</span>
                </div>
                <div class="space-y-1">
                    <div class="inline-flex items-center gap-1.5 text-xs font-bold text-red-900 bg-red-50 px-2.5 py-0.5 rounded-full">
                        <i class="fa-solid fa-dharmachakra text-amber-600"></i> ប្រតិទិនពុទ្ធសាសនា និងចន្ទគតិខ្មែរ
                    </div>
                    <h3 class="font-moul text-base sm:text-lg text-red-950">
                        {{ $lunarDate['lunar_date_kh'] ?? 'ថ្ងៃនេះជាថ្ងៃធម្មតា' }}
                    </h3>
                    <p class="text-xs text-gray-600">
                        {{ $lunarDate['solar_date_kh'] ?? '' }} • ឆ្នាំ{{ $lunarDate['zodiac_year'] ?? '' }} {{ $lunarDate['sak'] ?? '' }}
                    </p>
                </div>
            </div>

            <!-- Right: Next Sil Day Countdown Card -->
            <div class="lg:col-span-5 bg-gradient-to-r from-red-950 to-amber-950 rounded-2xl p-4 sm:p-5 text-white shadow-inner flex items-center justify-between gap-4 border border-amber-500/30">
                <div class="space-y-1 text-left">
                    <span class="text-[10px] uppercase font-bold text-amber-300 tracking-wider flex items-center gap-1">
                        <i class="fa-solid fa-bell text-amber-400"></i> កាលវិភាគថ្ងៃសីលបន្ទាប់
                    </span>
                    <div class="font-moul text-xs sm:text-sm text-white">
                        {{ $lunarDate['next_sil']['sil_name'] ?? 'ថ្ងៃសីល' }}
                    </div>
                    <div class="text-[11px] text-amber-200/80">
                        {{ $lunarDate['next_sil']['target_date_kh'] ?? '' }}
                    </div>
                </div>

                <!-- Countdown Number Box -->
                <div class="text-center bg-white/10 border border-amber-400/40 rounded-xl px-4 py-2 flex-shrink-0">
                    <div class="font-moul text-2xl sm:text-3xl text-amber-400 leading-none">
                        {{ $lunarDate['next_sil']['days_remaining_kh'] ?? '០' }}
                    </div>
                    <span class="text-[10px] text-amber-200 font-semibold block mt-1">ថ្ងៃទៀត</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Dual Hub Section: Pagoda Hub vs School Hub -->
<section class="py-12 bg-amber-50/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Pagoda Box -->
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-md border-t-4 border-red-800 hover:shadow-xl transition-all duration-300 flex flex-col justify-between relative overflow-hidden group">
                <div class="absolute -right-6 -bottom-6 text-8xl text-red-100 pointer-events-none group-hover:text-red-200 transition">
                    <i class="fa-solid fa-place-of-worship"></i>
                </div>
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('images/wat-logo.png') }}?v={{ time() }}" alt="Logo វត្ត" class="w-14 h-14 object-contain drop-shadow-sm flex-shrink-0">
                        <div>
                            <div class="inline-flex items-center gap-1.5 bg-red-100 text-red-900 px-2.5 py-0.5 rounded-full text-[11px] font-bold">
                                <i class="fa-solid fa-dharmachakra"></i> ផ្នែកទី ១៖ វត្តអារាម
                            </div>
                            <h3 class="font-moul text-lg text-red-900 mt-1">វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)</h3>
                        </div>
                    </div>
                    <p class="text-gray-600 text-xs sm:text-sm leading-relaxed mb-6">
                        ស្វែងយល់ពីប្រវត្តិទីអារាម ព្រះចៅអធិការគ្រប់ជំនាន់ សមិទ្ធផលនានាក្នុងវត្ត កាលវិភាគបុណ្យទាន និងព្រះធម៌អប់រំចិត្តសម្រាប់ពុទ្ធបរិស័ទ។
                    </p>
                    <div class="grid grid-cols-2 gap-2.5 mb-6 text-xs text-gray-700">
                        <a href="{{ route('pagoda.about') }}" class="flex items-center gap-2 bg-amber-50/80 hover:bg-amber-100 p-2.5 rounded-xl transition">
                            <i class="fa-solid fa-history text-amber-700"></i> ប្រវត្តិវត្ត & ព្រះសង្ឃ
                        </a>
                        <a href="{{ route('pagoda.map') }}" class="flex items-center gap-2 bg-amber-100/70 hover:bg-amber-200 text-red-950 font-bold p-2.5 rounded-xl transition border border-amber-300/60">
                            <i class="fa-solid fa-map-location-dot text-amber-800"></i> ផែនទីក្នុងវត្ត (Map)
                        </a>
                        <a href="{{ route('events.index') }}" class="flex items-center gap-2 bg-amber-50/80 hover:bg-amber-100 p-2.5 rounded-xl transition">
                            <i class="fa-regular fa-calendar-check text-amber-700"></i> ប្រតិទិនបុណ្យទាន
                        </a>
                        <a href="{{ route('donation.index') }}" class="flex items-center gap-2 bg-amber-50/80 hover:bg-amber-100 p-2.5 rounded-xl transition">
                            <i class="fa-solid fa-hand-holding-heart text-amber-700"></i> ចូលរួមកសាងវត្ត
                        </a>
                    </div>
                </div>
                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <a href="{{ route('pagoda.about') }}" class="text-sm font-bold text-red-800 hover:text-amber-700 flex items-center gap-1.5 transition">
                        ចូលមើលផ្នែកវត្ត <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                    <a href="{{ route('pagoda.map') }}" class="text-xs bg-red-900 text-white font-bold px-3.5 py-1.5 rounded-lg hover:bg-red-950 transition shadow-sm flex items-center gap-1.5">
                        <i class="fa-solid fa-map text-[10px]"></i> ប្លង់វត្ត
                    </a>
                </div>
            </div>

            <!-- School Box -->
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-md border-t-4 border-amber-600 hover:shadow-xl transition-all duration-300 flex flex-col justify-between relative overflow-hidden group">
                <div class="absolute -right-6 -bottom-6 text-8xl text-amber-100 pointer-events-none group-hover:text-amber-200 transition">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('images/school-logo.png') }}?v={{ time() }}" alt="Logo សាលា" class="w-14 h-14 object-contain drop-shadow-sm flex-shrink-0">
                        <div>
                            <div class="inline-flex items-center gap-1.5 bg-amber-100 text-amber-900 px-2.5 py-0.5 rounded-full text-[11px] font-bold">
                                <i class="fa-solid fa-school"></i> ផ្នែកទី ២៖ ពុទ្ធិកបឋមសិក្សា
                            </div>
                            <h3 class="font-moul text-lg text-amber-900 mt-1">ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី</h3>
                        </div>
                    </div>
                    <p class="text-gray-600 text-xs sm:text-sm leading-relaxed mb-6">
                        ការបណ្ដុះបណ្ដាលសមណសិស្សលើភាសាបាលី វិន័យបិដក ធម្មវិភាគ រួមជាមួយចំណេះដឹងទូទៅ (ភាសាខ្មែរ គណិត ភាសាអង់គ្លេស និងកុំព្យូទ័រ)។
                    </p>
                    <div class="grid grid-cols-2 gap-2.5 mb-6 text-xs text-gray-700">
                        <a href="{{ route('school.curriculum') }}" class="flex items-center gap-2 bg-amber-50/80 hover:bg-amber-100 p-2.5 rounded-xl transition">
                            <i class="fa-solid fa-book-bookmark text-amber-700"></i> កម្មវិធី ៣ ថ្នាក់
                        </a>
                        <a href="{{ route('school.timetable') }}" class="flex items-center gap-2 bg-amber-50/80 hover:bg-amber-100 p-2.5 rounded-xl transition">
                            <i class="fa-regular fa-calendar-days text-amber-700"></i> កាលវិភាគសិក្សា
                        </a>
                        <a href="{{ route('school.results') }}" class="flex items-center gap-2 bg-amber-100/70 hover:bg-amber-200 text-amber-950 font-bold p-2.5 rounded-xl transition border border-amber-300/60">
                            <i class="fa-solid fa-square-poll-vertical text-red-900"></i> ពិនិត្យលទ្ធផលប្រឡង
                        </a>
                        <a href="{{ route('school.admissions') }}" class="flex items-center gap-2 bg-amber-50/80 hover:bg-amber-100 p-2.5 rounded-xl transition">
                            <i class="fa-solid fa-pen-nib text-amber-700"></i> ចុះឈ្មោះចូលរៀន
                        </a>
                    </div>
                </div>
                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <a href="{{ route('school.index') }}" class="text-sm font-bold text-amber-800 hover:text-red-900 flex items-center gap-1.5 transition">
                        ចូលមើលផ្នែកសាលា <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                    <a href="{{ route('school.results') }}" class="text-xs bg-gradient-to-r from-red-900 to-amber-800 text-white font-bold px-3.5 py-1.5 rounded-lg hover:from-red-950 hover:to-amber-900 transition shadow-sm flex items-center gap-1.5">
                        <i class="fa-solid fa-magnifying-glass text-[10px]"></i> ពិនិត្យពិន្ទុ
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Upcoming Buddhist Events Section -->
<section class="py-14 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 pb-4 border-b border-gray-200">
            <div>
                <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">ប្រតិទិនសាសនា និងវត្ត</span>
                <h2 class="font-moul text-xl sm:text-2xl text-red-950 mt-1">កម្មវិធីបុណ្យទានជិតមកដល់</h2>
            </div>
            <a href="{{ route('events.index') }}" class="text-sm font-semibold text-amber-700 hover:text-red-900 flex items-center gap-1 mt-2 md:mt-0 transition">
                មើលកម្មវិធីបុណ្យទាំងអស់ <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($upcomingEvents as $event)
                <div class="bg-amber-50/30 rounded-2xl overflow-hidden border border-amber-100 hover:shadow-xl transition-all duration-300 flex flex-col group shadow-sm">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $event->image ?? 'https://images.unsplash.com/photo-1548625361-04285e6878b3?w=800&auto=format&fit=crop&q=80' }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-3 left-3 bg-red-900/90 text-amber-300 text-xs font-semibold px-3 py-1 rounded-full backdrop-blur-sm shadow-md">
                            <i class="fa-solid fa-moon mr-1"></i> {{ $event->lunar_date }}
                        </div>
                    </div>
                    <div class="p-5 flex-grow flex flex-col justify-between">
                        <div>
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
                            <p class="text-xs text-gray-600 line-clamp-2 leading-relaxed">
                                {{ $event->description }}
                            </p>
                        </div>
                        <div class="pt-4 mt-4 border-t border-amber-100/80 flex items-center justify-between">
                            <a href="{{ route('events.show', $event->slug) }}" class="text-xs font-bold text-red-900 hover:text-amber-700 flex items-center gap-1 transition">
                                អានសេចក្ដីលម្អិត <i class="fa-solid fa-chevron-right text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

@if($featuredPosts->count() > 0)
<!-- Latest News & School Updates -->
<section class="py-14 bg-[#fbf9f4]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 pb-4 border-b border-gray-200">
            <div>
                <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">ដំណឹង និងសកម្មភាព</span>
                <h2 class="font-moul text-xl sm:text-2xl text-red-950 mt-1">ព័ត៌មានថ្មីៗពីវត្ត និងសាលារៀន</h2>
            </div>
            <a href="{{ route('posts.index') }}" class="text-sm font-semibold text-amber-700 hover:text-red-900 flex items-center gap-1 mt-2 md:mt-0 transition">
                មើលព័ត៌មានទាំងអស់ <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($featuredPosts as $post)
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 flex flex-col group">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $post->thumbnail ?? 'https://images.unsplash.com/photo-1590073242678-70ee3fc28e8e?w=800&auto=format&fit=crop&q=80' }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-3 left-3 bg-amber-600 text-white text-[11px] font-bold px-2.5 py-1 rounded shadow">
                            {{ $post->category }}
                        </div>
                    </div>
                    <div class="p-5 flex-grow flex flex-col justify-between">
                        <div>
                            <div class="text-[11px] text-gray-500 mb-2 flex items-center gap-2">
                                <span><i class="fa-regular fa-clock mr-1 text-amber-600"></i> {{ $post->published_at ? $post->published_at->diffForHumans() : 'ថ្មីៗ' }}</span>
                                <span>•</span>
                                <span><i class="fa-regular fa-user mr-1 text-amber-600"></i> {{ $post->author }}</span>
                            </div>
                            <h3 class="font-bold text-gray-900 group-hover:text-red-900 text-base leading-snug mb-2 transition line-clamp-2">
                                <a href="{{ route('posts.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="text-xs text-gray-600 line-clamp-2 leading-relaxed">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                        <div class="pt-4 mt-4 border-t border-gray-100 flex items-center justify-between">
                            <a href="{{ route('posts.show', $post->slug) }}" class="text-xs font-bold text-amber-800 hover:text-red-900 flex items-center gap-1 transition">
                                អានបន្ត <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </a>
                            <span class="text-[11px] text-gray-400"><i class="fa-regular fa-eye mr-1"></i> {{ $post->views }} ចូលមើល</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
@endif


<!-- Buddhist Videos Showcase -->
<section class="py-14 bg-[#fcfaf6]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 pb-4 border-b border-gray-200">
            <div>
                <span class="text-amber-700 font-bold text-xs uppercase tracking-wider flex items-center gap-1.5">
                    <i class="fa-solid fa-video text-amber-600"></i> សោតទស្សន៍ព្រះពុទ្ធសាសនា
                </span>
                <h2 class="font-moul text-xl sm:text-2xl text-red-950 mt-1">
                    វីដេអូធម្មទេសនា និងសកម្មភាពវត្ត
                </h2>
            </div>
            <a href="{{ route('videos.index') }}" class="text-sm font-semibold text-amber-700 hover:text-red-900 flex items-center gap-1 mt-2 md:mt-0 transition">
                មើលវីដេអូទាំងអស់ <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($latestVideos as $v)
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-amber-100 transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="relative aspect-video bg-gray-900 overflow-hidden">
                            <img src="{{ $v->thumbnail_url }}" alt="{{ $v->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            
                            <div class="absolute bottom-2 right-2 bg-black/80 text-white text-[10px] font-mono px-2 py-0.5 rounded backdrop-blur-sm">
                                <i class="fa-regular fa-clock mr-1"></i>{{ $v->duration }}
                            </div>

                            <div class="absolute top-2 left-2">
                                <span class="bg-red-900/90 text-amber-300 text-[10px] font-semibold px-2.5 py-0.5 rounded-full shadow">
                                    {{ $v->category }}
                                </span>
                            </div>

                            <a href="{{ route('videos.show', $v->slug) }}" class="absolute inset-0 bg-black/20 group-hover:bg-black/5 flex items-center justify-center transition">
                                <div class="w-12 h-12 rounded-full bg-amber-500 text-red-950 flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-play text-base ml-1"></i>
                                </div>
                            </a>
                        </div>

                        <div class="p-5 space-y-2">
                            <h3 class="font-bold text-gray-900 group-hover:text-red-900 text-sm leading-snug line-clamp-2 transition">
                                <a href="{{ route('videos.show', $v->slug) }}">
                                    {{ $v->title }}
                                </a>
                            </h3>
                            <div class="text-[11px] text-amber-800 font-semibold flex items-center gap-1.5">
                                <i class="fa-solid fa-microphone-lines text-amber-600"></i>
                                <span class="truncate">{{ $v->preacher }}</span>
                            </div>
                            <p class="text-xs text-gray-600 line-clamp-2 leading-relaxed">
                                {{ $v->description }}
                            </p>
                        </div>
                    </div>

                    <div class="px-5 py-3 bg-gray-50 border-t border-gray-100 flex items-center justify-between text-[11px] text-gray-500">
                        <span><i class="fa-regular fa-eye mr-1"></i> {{ number_format($v->views) }} ដង</span>
                        <a href="{{ route('videos.show', $v->slug) }}" class="text-red-900 font-semibold hover:text-amber-700 flex items-center gap-1">
                            ទស្សនា <i class="fa-solid fa-arrow-right text-[9px]"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Photo Gallery Highlights -->
<section class="py-14 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 pb-4 border-b border-gray-200">
            <div>
                <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">កម្រងរូបភាព</span>
                <h2 class="font-moul text-xl sm:text-2xl text-red-950 mt-1">វិចិត្រសាលរូបភាពវត្ត និងសាលារៀន</h2>
            </div>
            <a href="{{ route('gallery.index') }}" class="text-sm font-semibold text-amber-700 hover:text-red-900 flex items-center gap-1 mt-2 md:mt-0 transition">
                មើលរូបភាពទាំងអស់ <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($galleries as $photo)
                <div class="relative group rounded-xl overflow-hidden shadow-sm h-40">
                    <img src="{{ $photo->image_url }}" alt="{{ $photo->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-2.5">
                        <p class="text-[11px] text-white font-medium truncate">{{ $photo->title }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Call to Action Banner -->
<section class="py-14 bg-gradient-to-r from-amber-600 via-amber-500 to-amber-700 text-red-950 shadow-inner">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h2 class="font-moul text-2xl sm:text-3xl text-red-950">
            ចូលរួមទ្រទ្រង់វិស័យព្រះពុទ្ធសាសនា និងការអប់រំពុទ្ធិកសិក្សា
        </h2>
        <p class="max-w-2xl mx-auto text-sm sm:text-base font-medium text-red-900/90 leading-relaxed">
            លោកអ្នកអាចចូលរួមជាបច្ច័យកសាងសមិទ្ធផលនានាក្នុងវត្ត ឬឧបត្ថម្ភអាហារូបករណ៍ដល់សមណសិស្សក្រីក្រ ដើម្បីជាប្រទីបបំភ្លឺផ្លូវជីវិត និងសង្គម។
        </p>
        <div class="flex flex-wrap justify-center gap-4 pt-2">
            <a href="{{ route('school.admissions') }}" class="bg-red-950 hover:bg-black text-amber-300 font-bold px-6 py-3.5 rounded-xl shadow-xl transition flex items-center gap-2 text-sm">
                <i class="fa-solid fa-graduation-cap"></i> ពាក្យចុះឈ្មោះចូលរៀន
            </a>
            <a href="{{ route('donation.index') }}" class="bg-white hover:bg-amber-50 text-red-950 font-bold px-6 py-3.5 rounded-xl shadow-xl transition flex items-center gap-2 text-sm">
                <i class="fa-solid fa-hand-holding-heart text-amber-600"></i> ចូលរួមបរិច្ចាគ (Donation)
            </a>
            <a href="{{ route('contact') }}" class="bg-amber-900/40 hover:bg-amber-900/60 text-white font-bold px-5 py-3.5 rounded-xl transition flex items-center gap-2 text-sm">
                <i class="fa-solid fa-phone"></i> ទំនាក់ទំនងផ្ទាល់
            </a>
        </div>
    </div>
</section>

@endsection
