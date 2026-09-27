<!DOCTYPE html>
<html lang="km" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'វត្តធនរតនេសោភណារាម (ព្រៃស្ដី) និង ពុទ្ធិកបឋមសិក្សា')</title>
    
    <!-- Google Khmer Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@400;700&family=Kantumruy+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Moul&family=Preahvihear&family=Siemreap&display=swap" rel="stylesheet">
    
    <!-- FontAwesome for Buddhist & UI Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- PWA & Mobile Web Optimization -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#7c2d12">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="វត្តព្រៃស្ដី">
    <meta name="format-detection" content="telephone=no">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fcfaf6] text-gray-800 font-sans antialiased min-h-screen flex flex-col selection:bg-amber-500 selection:text-white pb-20 lg:pb-0" x-data="{ mobileMenu: false, searchModal: false }">

    <!-- Top Announcement Bar (Khmer Lunar Date & Sil Day Countdown) -->
    <div class="bg-gradient-to-r from-red-950 via-red-900 to-amber-950 text-amber-100 text-xs sm:text-sm py-2 px-4 shadow-inner border-b border-amber-500/20">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2 text-center sm:text-left">
                <!-- Lunar / BE Badge -->
                <span class="inline-flex items-center justify-center bg-amber-500/20 text-amber-300 px-2.5 py-0.5 rounded text-[11px] font-medium border border-amber-400/30">
                    <i class="fa-solid fa-dharmachakra mr-1.5 text-amber-400 animate-spin-slow"></i> ព.ស. {{ $lunarDate['buddhist_era_kh'] ?? '២៥៦៩' }}
                </span>
                
                <!-- Sil Day Alert / Countdown -->
                @if(!empty($lunarDate['is_sil_day']))
                    <span class="inline-flex items-center bg-amber-400 text-red-950 px-2.5 py-0.5 rounded text-[11px] font-bold animate-pulse shadow">
                        <i class="fa-solid fa-bell mr-1"></i> ថ្ងៃនេះជា {{ $lunarDate['sil_day_type'] }}
                    </span>
                @else
                    <span class="inline-flex items-center bg-white/10 text-amber-200 border border-white/15 px-2.5 py-0.5 rounded text-[11px] font-medium">
                        <i class="fa-solid fa-moon mr-1 text-amber-300"></i> {{ $lunarDate['next_sil']['sil_name'] ?? 'ថ្ងៃសីល' }}៖ នៅសល់ <strong class="text-amber-300 mx-1 font-bold">{{ $lunarDate['next_sil']['days_remaining_kh'] ?? '២' }}</strong> ថ្ងៃទៀត
                    </span>
                @endif

                <span class="hidden xl:inline text-amber-400/40">|</span>
                <span class="hidden md:inline text-[11px] text-amber-100/90 truncate">
                    {{ $lunarDate['lunar_date_kh'] ?? 'វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)' }}
                </span>
            </div>
            <div class="flex items-center gap-4 text-xs">
                <a href="{{ route('school.admissions') }}" class="text-amber-300 hover:text-white font-medium flex items-center gap-1 transition">
                    <i class="fa-solid fa-graduation-cap text-amber-400"></i> ចុះឈ្មោះចូលរៀន
                </a>
                <span class="text-amber-500/40">|</span>
                <a href="{{ route('donation.index') }}" class="text-amber-300 hover:text-white font-medium flex items-center gap-1 transition">
                    <i class="fa-solid fa-hand-holding-heart text-amber-400"></i> ចូលរួមបុណ្យកុសល
                </a>
                <span class="text-amber-500/40">|</span>
                <a href="{{ route('admin.dashboard') }}" class="text-amber-200/80 hover:text-amber-200 flex items-center gap-1">
                    <i class="fa-solid fa-lock text-[10px]"></i> ប្រព័ន្ធគ្រប់គ្រង
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <header class="bg-white/95 backdrop-blur-md sticky top-0 z-40 shadow-md border-b border-amber-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 sm:h-20">
                
                <!-- Logo & Brand Title (Dual Wat & School Logos) -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 sm:gap-3 group min-w-0">
                    <div class="flex items-center space-x-1 flex-shrink-0">
                        <!-- Wat Logo -->
                        <img src="{{ asset('images/wat-logo.png') }}?v={{ time() }}" alt="Logo វត្តធនរតនេសោភណារាម" class="w-10 h-10 sm:w-14 sm:h-14 object-contain filter drop-shadow-sm group-hover:scale-105 transition-transform duration-300" title="Logo វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)">
                        <!-- School Logo -->
                        <img src="{{ asset('images/school-logo.png') }}?v={{ time() }}" alt="Logo ពុទ្ធិកបឋមសិក្សា" class="w-9 h-9 sm:w-13 sm:h-13 object-contain filter drop-shadow-sm group-hover:scale-105 transition-transform duration-300" title="Logo ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី">
                    </div>
                    <div class="truncate">
                        <div class="font-moul text-red-900 text-xs sm:text-base leading-tight tracking-wide group-hover:text-amber-700 transition truncate">
                            វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)
                        </div>
                        <div class="text-[9px] sm:text-xs text-amber-800 font-semibold tracking-normal flex items-center gap-1 mt-0.5 truncate">
                            <span class="inline-block bg-red-100 text-red-800 text-[9px] sm:text-[10px] px-1 py-0.2 rounded font-bold">សាលា</span>
                            <span class="truncate">ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី</span>
                        </div>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center gap-1 xl:gap-2">
                    <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('home') ? 'bg-amber-50 text-red-900 font-semibold border-b-2 border-amber-600' : 'text-gray-700 hover:text-amber-700 hover:bg-amber-50/50' }}">
                        <i class="fa-solid fa-house mr-1 text-xs text-amber-600"></i> ទំព័រដើម
                    </a>

                    <!-- Pagoda Dropdown -->
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('pagoda.about') }}" class="px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1 transition {{ request()->is('pagoda*') || request()->is('events*') || request()->is('videos*') ? 'bg-amber-50 text-red-900 font-semibold border-b-2 border-amber-600' : 'text-gray-700 hover:text-amber-700 hover:bg-amber-50/50' }}">
                            <i class="fa-solid fa-place-of-worship mr-1 text-xs text-amber-600"></i> ផ្នែកវត្តអារាម <i class="fa-solid fa-chevron-down text-[10px] text-gray-400"></i>
                        </a>
                        <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="absolute left-0 mt-1 w-64 bg-white rounded-xl shadow-xl border border-amber-100 py-2 z-50">
                            <a href="{{ route('pagoda.about') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-amber-50 hover:text-red-900 transition flex items-center gap-2">
                                <i class="fa-solid fa-book-open-reader text-amber-600 text-xs"></i> ប្រវត្តិវត្ត និងព្រះចៅអធិការ
                            </a>
                            <a href="{{ route('pagoda.map') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-amber-50 hover:text-red-900 transition flex items-center gap-2">
                                <i class="fa-solid fa-map-location-dot text-amber-600 text-xs"></i> ផែនទីទីតាំងក្នុងវត្ត (Campus Map)
                            </a>
                            <a href="{{ route('events.index') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-amber-50 hover:text-red-900 transition flex items-center gap-2">
                                <i class="fa-regular fa-calendar-check text-amber-600 text-xs"></i> កម្មវិធីបុណ្យទាន
                            </a>
                            <a href="{{ route('dhamma.index') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-amber-50 hover:text-red-900 transition flex items-center gap-2">
                                <i class="fa-solid fa-om text-amber-600 text-xs"></i> ព្រះធម៌ និងអត្ថបទអប់រំ
                            </a>
                            <a href="{{ route('videos.index') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-amber-50 hover:text-red-900 transition flex items-center gap-2">
                                <i class="fa-solid fa-video text-amber-600 text-xs"></i> វីដេអូធម្មទេសនា
                            </a>
                        </div>
                    </div>

                    <!-- School Dropdown -->
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('school.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium flex items-center gap-1 transition {{ request()->is('school*') ? 'bg-amber-50 text-red-900 font-semibold border-b-2 border-amber-600' : 'text-gray-700 hover:text-amber-700 hover:bg-amber-50/50' }}">
                            <i class="fa-solid fa-graduation-cap mr-1 text-xs text-amber-600"></i> ពុទ្ធិកបឋមសិក្សា <i class="fa-solid fa-chevron-down text-[10px] text-gray-400"></i>
                        </a>
                        <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="absolute left-0 mt-1 w-64 bg-white rounded-xl shadow-xl border border-amber-100 py-2 z-50">
                            <a href="{{ route('school.index') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-amber-50 hover:text-red-900 transition flex items-center gap-2">
                                <i class="fa-solid fa-circle-info text-amber-600 text-xs"></i> អំពីសាលារៀន និងចក្ខុវិស័យ
                            </a>
                            <a href="{{ route('school.curriculum') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-amber-50 hover:text-red-900 transition flex items-center gap-2">
                                <i class="fa-solid fa-book-bookmark text-amber-600 text-xs"></i> កម្មវិធីសិក្សា (ថ្នាក់ត្រី/ទោ/ឯ)
                            </a>
                            <a href="{{ route('school.teachers') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-amber-50 hover:text-red-900 transition flex items-center gap-2">
                                <i class="fa-solid fa-chalkboard-user text-amber-600 text-xs"></i> គណៈគ្រប់គ្រង និងសមណគ្រូ
                            </a>
                            <a href="{{ route('school.timetable') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-amber-50 hover:text-red-900 transition flex items-center gap-2">
                                <i class="fa-regular fa-calendar-days text-amber-600 text-xs"></i> កាលវិភាគសិក្សា & ប្រឡង
                            </a>
                            <a href="{{ route('school.results') }}" class="block px-4 py-2.5 text-sm text-amber-900 font-bold bg-amber-50/50 hover:bg-amber-100 transition flex items-center gap-2">
                                <i class="fa-solid fa-square-poll-vertical text-amber-700 text-xs"></i> ពិនិត្យលទ្ធផលប្រឡង
                            </a>
                            <a href="{{ route('school.achievements') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-amber-50 hover:text-red-900 transition flex items-center gap-2">
                                <i class="fa-solid fa-trophy text-amber-600 text-xs"></i> តារាងកិត្តិយសសមណសិស្ស
                            </a>
                            <a href="{{ route('school.admissions') }}" class="block px-4 py-2.5 text-sm text-amber-800 font-semibold bg-amber-50/60 hover:bg-amber-100 transition flex items-center gap-2">
                                <i class="fa-solid fa-pen-to-square text-amber-600 text-xs"></i> ពាក្យចុះឈ្មោះចូលរៀន
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('posts.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('posts.*') ? 'bg-amber-50 text-red-900 font-semibold border-b-2 border-amber-600' : 'text-gray-700 hover:text-amber-700 hover:bg-amber-50/50' }}">
                        <i class="fa-regular fa-newspaper mr-1 text-xs text-amber-600"></i> ព័ត៌មានថ្មីៗ
                    </a>

                    <a href="{{ route('gallery.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('gallery.*') ? 'bg-amber-50 text-red-900 font-semibold border-b-2 border-amber-600' : 'text-gray-700 hover:text-amber-700 hover:bg-amber-50/50' }}">
                        <i class="fa-regular fa-images mr-1 text-xs text-amber-600"></i> វិចិត្រសាល
                    </a>

                    <a href="{{ route('donation.index') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('donation.*') ? 'bg-amber-50 text-red-900 font-semibold border-b-2 border-amber-600' : 'text-gray-700 hover:text-amber-700 hover:bg-amber-50/50' }}">
                        <i class="fa-solid fa-hand-holding-heart mr-1 text-xs text-amber-600"></i> បរិច្ចាគ
                    </a>

                    <a href="{{ route('contact') }}" class="px-3 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('contact*') ? 'bg-amber-50 text-red-900 font-semibold border-b-2 border-amber-600' : 'text-gray-700 hover:text-amber-700 hover:bg-amber-50/50' }}">
                        <i class="fa-regular fa-address-book mr-1 text-xs text-amber-600"></i> ទំនាក់ទំនង
                    </a>
                </nav>

                <!-- Search and Action Button -->
                <div class="flex items-center gap-1.5 sm:gap-2 flex-shrink-0">
                    <button @click="searchModal = true" class="p-2 sm:p-2.5 text-gray-600 hover:text-amber-700 hover:bg-amber-50 rounded-xl transition" title="ស្វែងរក">
                        <i class="fa-solid fa-magnifying-glass text-sm sm:text-base"></i>
                    </button>

                    <a href="{{ route('school.admissions') }}" class="hidden sm:inline-flex items-center gap-2 bg-gradient-to-r from-red-900 via-red-800 to-amber-700 hover:from-red-800 hover:to-amber-600 text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-xl shadow-md hover:shadow-lg transition duration-200">
                        <i class="fa-solid fa-user-plus text-amber-300"></i> ចុះឈ្មោះរៀន
                    </a>

                    <!-- Mobile Menu Button -->
                    <button @click="mobileMenu = !mobileMenu" class="lg:hidden p-2 text-gray-700 hover:text-red-900 hover:bg-amber-50 rounded-xl transition">
                        <i :class="mobileMenu ? 'fa-solid fa-xmark text-xl sm:text-2xl' : 'fa-solid fa-bars text-xl sm:text-2xl'"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Slide-Down / Overlay Drawer -->
        <div x-show="mobileMenu" 
             x-transition:enter="transition ease-out duration-200" 
             x-transition:enter-start="opacity-0 -translate-y-4" 
             x-transition:enter-end="opacity-100 translate-y-0" 
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="lg:hidden bg-white border-b border-amber-200 px-4 pt-3 pb-8 space-y-3 shadow-2xl max-h-[85vh] overflow-y-auto">
            
            <a href="{{ route('home') }}" @click="mobileMenu = false" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('home') ? 'bg-amber-100 text-red-950 font-bold' : 'text-gray-800 hover:bg-amber-50' }}">
                <i class="fa-solid fa-house text-amber-600 text-base"></i> ទំព័រដើម
            </a>
            
            <!-- Pagoda Group -->
            <div class="bg-amber-50/50 rounded-xl p-2.5 border border-amber-100/80 space-y-1">
                <div class="px-2 py-1 text-[11px] font-bold text-red-950 flex items-center gap-1.5 uppercase">
                    <i class="fa-solid fa-place-of-worship text-amber-600"></i> ផ្នែកវត្តអារាម
                </div>
                <a href="{{ route('pagoda.about') }}" @click="mobileMenu = false" class="block px-3 py-2 rounded-lg text-xs sm:text-sm text-gray-700 hover:bg-white transition flex items-center gap-2">
                    <i class="fa-solid fa-book-open-reader text-amber-600 text-xs"></i> ប្រវត្តិវត្ត និងព្រះចៅអធិការ
                </a>
                <a href="{{ route('pagoda.map') }}" @click="mobileMenu = false" class="block px-3 py-2 rounded-lg text-xs sm:text-sm text-gray-700 hover:bg-white transition flex items-center gap-2">
                    <i class="fa-solid fa-map-location-dot text-amber-600 text-xs"></i> ផែនទីទីតាំងក្នុងវត្ត (Campus Map)
                </a>
                <a href="{{ route('events.index') }}" @click="mobileMenu = false" class="block px-3 py-2 rounded-lg text-xs sm:text-sm text-gray-700 hover:bg-white transition flex items-center gap-2">
                    <i class="fa-regular fa-calendar-check text-amber-600 text-xs"></i> កម្មវិធីបុណ្យទាន
                </a>
                <a href="{{ route('dhamma.index') }}" @click="mobileMenu = false" class="block px-3 py-2 rounded-lg text-xs sm:text-sm text-gray-700 hover:bg-white transition flex items-center gap-2">
                    <i class="fa-solid fa-om text-amber-600 text-xs"></i> ព្រះធម៌ និងអត្ថបទអប់រំ
                </a>
                <a href="{{ route('videos.index') }}" @click="mobileMenu = false" class="block px-3 py-2 rounded-lg text-xs sm:text-sm text-gray-700 hover:bg-white transition flex items-center gap-2">
                    <i class="fa-solid fa-video text-amber-600 text-xs"></i> វីដេអូធម្មទេសនា
                </a>
            </div>

            <!-- School Group -->
            <div class="bg-amber-50/50 rounded-xl p-2.5 border border-amber-100/80 space-y-1">
                <div class="px-2 py-1 text-[11px] font-bold text-amber-900 flex items-center gap-1.5 uppercase">
                    <i class="fa-solid fa-graduation-cap text-amber-600"></i> ផ្នែកពុទ្ធិកបឋមសិក្សា
                </div>
                <a href="{{ route('school.index') }}" @click="mobileMenu = false" class="block px-3 py-2 rounded-lg text-xs sm:text-sm text-gray-700 hover:bg-white transition flex items-center gap-2">
                    <i class="fa-solid fa-circle-info text-amber-600 text-xs"></i> អំពីសាលារៀន និងចក្ខុវិស័យ
                </a>
                <a href="{{ route('school.curriculum') }}" @click="mobileMenu = false" class="block px-3 py-2 rounded-lg text-xs sm:text-sm text-gray-700 hover:bg-white transition flex items-center gap-2">
                    <i class="fa-solid fa-book-bookmark text-amber-600 text-xs"></i> កម្មវិធីសិក្សា (ថ្នាក់ត្រី/ទោ/ឯ)
                </a>
                <a href="{{ route('school.teachers') }}" @click="mobileMenu = false" class="block px-3 py-2 rounded-lg text-xs sm:text-sm text-gray-700 hover:bg-white transition flex items-center gap-2">
                    <i class="fa-solid fa-chalkboard-user text-amber-600 text-xs"></i> គណៈគ្រប់គ្រង និងសមណគ្រូ
                </a>
                <a href="{{ route('school.timetable') }}" @click="mobileMenu = false" class="block px-3 py-2 rounded-lg text-xs sm:text-sm text-gray-700 hover:bg-white transition flex items-center gap-2">
                    <i class="fa-regular fa-calendar-days text-amber-600 text-xs"></i> កាលវិភាគសិក្សា & ប្រឡង
                </a>
                <a href="{{ route('school.results') }}" @click="mobileMenu = false" class="block px-3 py-2 rounded-lg text-xs sm:text-sm text-amber-900 font-bold bg-amber-100/60 hover:bg-white transition flex items-center gap-2">
                    <i class="fa-solid fa-square-poll-vertical text-amber-700 text-xs"></i> ពិនិត្យលទ្ធផលប្រឡង
                </a>
                <a href="{{ route('school.achievements') }}" @click="mobileMenu = false" class="block px-3 py-2 rounded-lg text-xs sm:text-sm text-gray-700 hover:bg-white transition flex items-center gap-2">
                    <i class="fa-solid fa-trophy text-amber-600 text-xs"></i> តារាងកិត្តិយសសមណសិស្ស
                </a>
                <a href="{{ route('school.admissions') }}" @click="mobileMenu = false" class="block px-3 py-2.5 rounded-lg text-xs sm:text-sm text-red-950 font-bold bg-amber-200/70 hover:bg-amber-200 transition flex items-center gap-2">
                    <i class="fa-solid fa-pen-to-square text-red-900 text-xs"></i> ចុះឈ្មោះចូលរៀនថ្មី (Online)
                </a>
            </div>

            <!-- General Links -->
            <div class="grid grid-cols-2 gap-2 pt-1">
                <a href="{{ route('posts.index') }}" @click="mobileMenu = false" class="p-2.5 rounded-xl border border-gray-100 bg-gray-50/60 text-xs font-semibold text-gray-800 flex items-center gap-2 hover:bg-amber-50">
                    <i class="fa-regular fa-newspaper text-amber-600"></i> ព័ត៌មានថ្មីៗ
                </a>
                <a href="{{ route('gallery.index') }}" @click="mobileMenu = false" class="p-2.5 rounded-xl border border-gray-100 bg-gray-50/60 text-xs font-semibold text-gray-800 flex items-center gap-2 hover:bg-amber-50">
                    <i class="fa-regular fa-images text-amber-600"></i> វិចិត្រសាល
                </a>
                <a href="{{ route('donation.index') }}" @click="mobileMenu = false" class="p-2.5 rounded-xl border border-amber-200 bg-amber-50 text-xs font-semibold text-red-950 flex items-center gap-2 hover:bg-amber-100">
                    <i class="fa-solid fa-hand-holding-heart text-amber-600"></i> បរិច្ចាគកុសល
                </a>
                <a href="{{ route('contact') }}" @click="mobileMenu = false" class="p-2.5 rounded-xl border border-gray-100 bg-gray-50/60 text-xs font-semibold text-gray-800 flex items-center gap-2 hover:bg-amber-50">
                    <i class="fa-regular fa-address-book text-amber-600"></i> ទំនាក់ទំនង
                </a>
            </div>

            <!-- Quick Call Buttons -->
            <div class="pt-2 border-t border-gray-100 flex items-center justify-between text-xs text-gray-600">
                <a href="tel:012345678" class="flex items-center gap-1.5 text-amber-800 font-semibold">
                    <i class="fa-solid fa-phone text-amber-600"></i> 012 345 678
                </a>
                <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-amber-800 flex items-center gap-1">
                    <i class="fa-solid fa-lock text-[10px]"></i> Admin
                </a>
            </div>
        </div>
    </header>

    <!-- Global Search Modal -->
    <div x-show="searchModal" x-transition.opacity class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-start justify-center pt-20 px-4" style="display: none;">
        <div @click.away="searchModal = false" class="bg-white rounded-2xl max-w-xl w-full p-6 shadow-2xl border border-amber-200">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-bold text-gray-800 flex items-center gap-2">
                    <i class="fa-solid fa-magnifying-glass text-amber-600"></i> ស្វែងរកព័ត៌មានក្នុងគេហទំព័រ
                </h3>
                <button @click="searchModal = false" class="text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            <form action="{{ route('search') }}" method="GET">
                <div class="relative">
                    <input type="text" name="q" placeholder="បញ្ចូលពាក្យគន្លឹះ (ឧ. បាលី, មាឃបូជា, ចុះឈ្មោះ, ធម៌...)" class="w-full bg-amber-50/50 border border-amber-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 focus:bg-white" autofocus required>
                    <button type="submit" class="absolute right-2 top-2 bg-gradient-to-r from-amber-600 to-red-800 text-white px-4 py-1.5 rounded-lg text-xs font-semibold hover:opacity-95 transition">
                        ស្វែងរក
                    </button>
                </div>
            </form>
            <div class="mt-4 text-xs text-gray-500 flex flex-wrap gap-2 items-center">
                <span>ពាក្យពេញនិយម៖</span>
                <a href="{{ route('search', ['q' => 'បាលី']) }}" class="bg-gray-100 hover:bg-amber-100 text-gray-700 px-2.5 py-1 rounded-full transition">បាលី</a>
                <a href="{{ route('search', ['q' => 'បុណ្យ']) }}" class="bg-gray-100 hover:bg-amber-100 text-gray-700 px-2.5 py-1 rounded-full transition">បុណ្យ</a>
                <a href="{{ route('search', ['q' => 'សាលា']) }}" class="bg-gray-100 hover:bg-amber-100 text-gray-700 px-2.5 py-1 rounded-full transition">សាលា</a>
                <a href="{{ route('search', ['q' => 'សមាធិ']) }}" class="bg-gray-100 hover:bg-amber-100 text-gray-700 px-2.5 py-1 rounded-full transition">សមាធិ</a>
            </div>
        </div>
    </div>

    <!-- Flash Alert Messages -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-emerald-50 border border-emerald-300 text-emerald-900 px-4 py-3.5 rounded-xl shadow-sm flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-circle-check text-emerald-600 text-xl"></i>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>
    @endif

    <!-- Main Content Body -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-b from-gray-950 via-red-950 to-black text-gray-300 pt-16 pb-8 border-t-4 border-amber-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                
                <!-- Col 1: About Wat -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/wat-logo.png') }}?v={{ time() }}" alt="Logo វត្តធនរតនេសោភណារាម" class="w-13 h-13 object-contain drop-shadow-md flex-shrink-0">
                        <div>
                            <h4 class="font-moul text-amber-400 text-sm">វត្តធនរតនេសោភណារាម</h4>
                            <p class="text-[11px] text-amber-200/80">(វត្តព្រៃស្ដី) និង ពុទ្ធិកបឋមសិក្សា</p>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 leading-relaxed">
                        ជាទីសក្ការបូជា និងជាថ្នាលបណ្ដុះបណ្ដាលសមណសិស្ស លើកកម្ពស់វិស័យពុទ្ធិកសិក្សា និងសីលធម៌សង្គមខ្មែរឱ្យបានគង់វង្សរីកចម្រើន។
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-amber-500 hover:text-black flex items-center justify-center transition"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-red-600 hover:text-white flex items-center justify-center transition"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#" class="w-9 h-9 rounded-full bg-white/10 hover:bg-blue-500 hover:text-white flex items-center justify-center transition"><i class="fa-brands fa-telegram"></i></a>
                    </div>
                </div>

                <!-- Col 2: Pagoda Links -->
                <div>
                    <h5 class="text-amber-400 font-bold text-sm tracking-wide uppercase mb-4 pb-2 border-b border-amber-500/20">
                        ផ្នែកវត្តអារាម
                    </h5>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('pagoda.about') }}" class="hover:text-amber-300 transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-amber-500"></i> ប្រវត្តិវត្ត និងព្រះចៅអធិការ</a></li>
                        <li><a href="{{ route('events.index') }}" class="hover:text-amber-300 transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-amber-500"></i> កាលវិភាគបុណ្យទាន</a></li>
                        <li><a href="{{ route('dhamma.index') }}" class="hover:text-amber-300 transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-amber-500"></i> បណ្ណាល័យព្រះធម៌ទេសនា</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="hover:text-amber-300 transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-amber-500"></i> រូបភាពទិដ្ឋភាពវត្ត</a></li>
                        <li><a href="{{ route('donation.index') }}" class="hover:text-amber-300 transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-amber-500"></i> ចូលរួមកសាងសមិទ្ធផល</a></li>
                    </ul>
                </div>

                <!-- Col 3: School Links -->
                <div>
                    <h5 class="text-amber-400 font-bold text-sm tracking-wide uppercase mb-4 pb-2 border-b border-amber-500/20">
                        សាលាពុទ្ធិកបឋមសិក្សា
                    </h5>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('school.index') }}" class="hover:text-amber-300 transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-amber-500"></i> អំពីសាលារៀន</a></li>
                        <li><a href="{{ route('school.curriculum') }}" class="hover:text-amber-300 transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-amber-500"></i> កម្រិតថ្នាក់ត្រី ថ្នាក់ទោ ថ្នាក់ឯ</a></li>
                        <li><a href="{{ route('school.teachers') }}" class="hover:text-amber-300 transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-amber-500"></i> សមាសភាពលោកគ្រូ-អ្នកគ្រូ</a></li>
                        <li><a href="{{ route('school.achievements') }}" class="hover:text-amber-300 transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-amber-500"></i> តារាងកិត្តិយសសមណសិស្ស</a></li>
                        <li><a href="{{ route('school.admissions') }}" class="hover:text-amber-300 transition flex items-center gap-2"><i class="fa-solid fa-chevron-right text-[10px] text-amber-500"></i> ពាក្យចុះឈ្មោះចូលរៀនថ្មី</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact & Location -->
                <div>
                    <h5 class="text-amber-400 font-bold text-sm tracking-wide uppercase mb-4 pb-2 border-b border-amber-500/20">
                        ព័ត៌មានទំនាក់ទំនង
                    </h5>
                    <ul class="space-y-3 text-xs text-gray-400">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-location-dot text-amber-500 mt-1 flex-shrink-0"></i>
                            <span>សង្កាត់ចោមចៅ២ ខណ្ឌពោធិ៍សែនជ័យ រាជធានីភ្នំពេញ</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-phone text-amber-500 flex-shrink-0"></i>
                            <span>012 345 678 / 098 765 432</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-solid fa-envelope text-amber-500 flex-shrink-0"></i>
                            <span>info@watpreysdei.edu.kh</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fa-regular fa-clock text-amber-500 flex-shrink-0"></i>
                            <span>រៀងរាល់ថ្ងៃ ម៉ោង ៦:០០ ព្រឹក - ៦:០០ ល្ងាច</span>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Bottom Copyright -->
            <div class="border-t border-white/10 pt-6 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-gray-500">
                <p>© {{ date('Y') }} វត្តធនរតនេសោភណារាម (ព្រៃស្ដី) និង ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី។ រក្សាសិទ្ធិគ្រប់យ៉ាង។</p>
                <div class="flex items-center gap-4">
                    <a href="{{ route('pagoda.about') }}" class="hover:underline">អំពីវត្ត</a>
                    <a href="{{ route('school.admissions') }}" class="hover:underline">ចុះឈ្មោះរៀន</a>
                    <a href="{{ route('contact') }}" class="hover:underline">ទំនាក់ទំនង</a>
                    <a href="{{ route('admin.dashboard') }}" class="text-amber-500/70 hover:text-amber-400">គ្រប់គ្រងទិន្នន័យ (Admin)</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile Bottom Navigation Bar (Visible only on mobile / tablet) -->
    <nav class="lg:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-lg border-t border-amber-200 shadow-2xl px-2 py-1.5 flex justify-around items-center safe-area-bottom">
        <a href="{{ route('home') }}" class="flex flex-col items-center justify-center py-1 px-2 rounded-xl transition {{ request()->routeIs('home') ? 'text-red-900 font-bold scale-105' : 'text-gray-500 hover:text-amber-700' }}">
            <i class="fa-solid fa-house text-lg {{ request()->routeIs('home') ? 'text-amber-600' : '' }}"></i>
            <span class="text-[10px] mt-0.5">ទំព័រដើម</span>
        </a>

        <a href="{{ route('pagoda.about') }}" class="flex flex-col items-center justify-center py-1 px-2 rounded-xl transition {{ request()->is('pagoda*') || request()->is('events*') ? 'text-red-900 font-bold scale-105' : 'text-gray-500 hover:text-amber-700' }}">
            <i class="fa-solid fa-place-of-worship text-lg {{ request()->is('pagoda*') || request()->is('events*') ? 'text-amber-600' : '' }}"></i>
            <span class="text-[10px] mt-0.5">វត្តអារាម</span>
        </a>

        <!-- Middle Quick Action: Admissions -->
        <a href="{{ route('school.admissions') }}" class="-mt-5 bg-gradient-to-tr from-red-900 via-red-800 to-amber-600 text-white w-12 h-12 rounded-full shadow-xl flex items-center justify-center border-4 border-[#fcfaf6] hover:scale-110 active:scale-95 transition-all" title="ចុះឈ្មោះចូលរៀន">
            <i class="fa-solid fa-user-graduate text-base text-amber-300"></i>
        </a>

        <a href="{{ route('school.index') }}" class="flex flex-col items-center justify-center py-1 px-2 rounded-xl transition {{ request()->is('school*') ? 'text-red-900 font-bold scale-105' : 'text-gray-500 hover:text-amber-700' }}">
            <i class="fa-solid fa-graduation-cap text-lg {{ request()->is('school*') ? 'text-amber-600' : '' }}"></i>
            <span class="text-[10px] mt-0.5">សាលារៀន</span>
        </a>

        <button @click="mobileMenu = !mobileMenu" class="flex flex-col items-center justify-center py-1 px-2 rounded-xl transition" :class="mobileMenu ? 'text-red-900 font-bold' : 'text-gray-500 hover:text-amber-700'">
            <i :class="mobileMenu ? 'fa-solid fa-xmark text-lg text-amber-600' : 'fa-solid fa-bars text-lg'"></i>
            <span class="text-[10px] mt-0.5" x-text="mobileMenu ? 'បិទ' : 'មឺនុយ'">មឺនុយ</span>
        </button>
    </nav>

</body>
</html>
