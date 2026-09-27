@extends('layouts.app')

@section('title', 'ប្លង់ផែនទីទីតាំងក្នុងវត្ត - វត្តព្រៃស្ដី')

@section('content')

<!-- Header Banner -->
<div class="bg-gradient-to-r from-red-950 via-amber-900 to-amber-950 text-white py-12 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-400/30 text-xs px-3.5 py-1 rounded-full font-semibold">
            <i class="fa-solid fa-map-location-dot mr-1"></i> ប្លង់ទីតាំង និងសមិទ្ធផលក្នុងអារាម
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            ប្លង់ផែនទីទីតាំងក្នុងវត្ត (Pagoda Campus Map)
        </h1>
        <p class="text-amber-100/80 text-xs sm:text-sm max-w-2xl mx-auto">
            ស្វែងយល់ពីប្លង់ទីតាំងព្រះវិហារ សាលារៀន កុដិព្រះចៅអធិកា ការិយាល័យ សាលាឆាន់ ផ្ទះបាយ មហាកុដិ ស្រះទឹក និងកុដិព្រះសង្ឃគង់នៅ
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10" x-data="{
    locations: {{ json_encode($locations) }},
    activeId: {{ $selectedId }},
    filterCategory: 'all',
    searchQuery: '',
    viewMode: 'interactive', // 'interactive' or 'sketch'
    tourActive: false,
    tourIndex: 0,

    get activeLocation() {
        return this.locations.find(l => l.id === this.activeId) || this.locations[0];
    },

    get filteredLocations() {
        return this.locations.filter(l => {
            const matchesCat = this.filterCategory === 'all' || l.category === this.filterCategory;
            const matchesSearch = !this.searchQuery || l.name.toLowerCase().includes(this.searchQuery.toLowerCase()) || l.description.toLowerCase().includes(this.searchQuery.toLowerCase());
            return matchesCat && matchesSearch;
        });
    },

    selectLocation(id) {
        this.activeId = id;
        this.tourActive = false;
        if (window.innerWidth < 1024) {
            document.getElementById('location-detail-card')?.scrollIntoView({ behavior: 'smooth' });
        }
    },

    startTour() {
        this.tourActive = true;
        this.tourIndex = 0;
        this.activeId = this.locations[0].id;
    },

    nextTour() {
        if (this.tourIndex < this.locations.length - 1) {
            this.tourIndex++;
            this.activeId = this.locations[this.tourIndex].id;
        } else {
            this.tourIndex = 0;
            this.activeId = this.locations[0].id;
        }
    },

    prevTour() {
        if (this.tourIndex > 0) {
            this.tourIndex--;
            this.activeId = this.locations[this.tourIndex].id;
        } else {
            this.tourIndex = this.locations.length - 1;
            this.activeId = this.locations[this.tourIndex].id;
        }
    }
}">

    <!-- Top View Mode & Filter Bar -->
    <div class="bg-white p-4 sm:p-5 rounded-3xl shadow-sm border border-amber-200 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
        
        <!-- View Switcher (Interactive vs Original Sketch) -->
        <div class="flex items-center gap-2 p-1 bg-amber-50 rounded-2xl border border-amber-200">
            <button @click="viewMode = 'interactive'"
                    class="px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-1.5"
                    :class="viewMode === 'interactive' ? 'bg-gradient-to-r from-red-900 to-amber-800 text-white shadow-md' : 'text-gray-700 hover:text-red-900'">
                <i class="fa-solid fa-map"></i> ប្លង់ផែនទីឌីជីថល (Digital Map)
            </button>

            <button @click="viewMode = 'sketch'"
                    class="px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-1.5"
                    :class="viewMode === 'sketch' ? 'bg-gradient-to-r from-red-900 to-amber-800 text-white shadow-md' : 'text-gray-700 hover:text-red-900'">
                <i class="fa-solid fa-pen-ruler"></i> ប្លង់គំនូសព្រាងដើម (Sketch)
            </button>
        </div>

        <!-- Category Filter Pills -->
        <div class="flex flex-wrap items-center gap-1.5" x-show="viewMode === 'interactive'">
            @foreach($categories as $key => $label)
                <button @click="filterCategory = '{{ $key }}'"
                        class="px-3 py-1.5 rounded-xl text-[11px] font-bold transition flex items-center gap-1"
                        :class="filterCategory === '{{ $key }}' ? 'bg-amber-500 text-red-950 shadow' : 'bg-gray-100 text-gray-700 hover:bg-amber-100'">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        <!-- Virtual Tour CTA -->
        <div class="flex items-center gap-2">
            <button @click="startTour()" 
                    class="bg-amber-400 hover:bg-amber-300 text-red-950 font-bold text-xs px-4 py-2 rounded-xl transition flex items-center gap-1.5 shadow whitespace-nowrap">
                <i class="fa-solid fa-compass"></i> ដំណើរកម្សាន្តនិម្មិត
            </button>
        </div>

    </div>

    <!-- Virtual Tour Guidance Banner (when active) -->
    <div x-show="tourActive" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="bg-gradient-to-r from-red-950 via-amber-900 to-red-950 text-white p-4 rounded-2xl border-2 border-amber-400 shadow-xl flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-amber-400 text-red-950 flex items-center justify-center font-bold text-base">
                <i class="fa-solid fa-person-walking"></i>
            </div>
            <div>
                <span class="text-[11px] uppercase font-bold text-amber-300">ដំណើរកម្សាន្តនិម្មិតក្នុងអារាម</span>
                <h4 class="font-moul text-sm text-white">
                    ទីតាំងទី <span x-text="tourIndex + 1"></span> / <span x-text="locations.length"></span>៖ <span class="text-amber-300" x-text="activeLocation.name"></span>
                </h4>
            </div>
        </div>

        <div class="flex items-center gap-2">
            <button @click="prevTour()" class="bg-white/10 hover:bg-white/20 text-white text-xs px-3 py-1.5 rounded-lg border border-white/20">
                <i class="fa-solid fa-chevron-left mr-1"></i> មុន
            </button>
            <button @click="nextTour()" class="bg-amber-400 hover:bg-amber-300 text-red-950 font-bold text-xs px-4 py-1.5 rounded-lg shadow">
                បន្ទាប់ <i class="fa-solid fa-chevron-right ml-1"></i>
            </button>
            <button @click="tourActive = false" class="text-gray-300 hover:text-white text-xs px-2 py-1">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    </div>

    <!-- Main Map & Detail Split Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left: Campus Map / Sketch Display (7 Cols) -->
        <div class="lg:col-span-7 bg-white rounded-3xl p-5 sm:p-7 shadow-xl border-2 border-amber-200 space-y-4">
            
            <div class="flex items-center justify-between pb-3 border-b border-gray-100">
                <div>
                    <h3 class="font-moul text-base text-red-950 flex items-center gap-2">
                        <i class="fa-solid fa-map text-amber-600"></i>
                        <span x-text="viewMode === 'interactive' ? 'ប្លង់ទីតាំងវត្តអារាម (Digital Layout)' : 'ប្លង់គំនូសព្រាងដើម (Original Blueprint Sketch)'"></span>
                    </h3>
                    <p class="text-xs text-gray-500">
                        <span x-text="viewMode === 'interactive' ? 'ចុចលើចំណុចសម្គាល់ (Pins) ឬសំណង់នីមួយៗ ដើម្បីមើលព័ត៌មានលម្អិត' : 'គំនូសព្រាងប្លង់វត្ត និងសាលារៀនពិតប្រាកដ'"></span>
                    </p>
                </div>

                <span class="text-xs font-bold text-amber-900 bg-amber-50 border border-amber-200 px-3 py-1 rounded-xl">
                    <span x-text="filteredLocations.length"></span> ទីតាំង
                </span>
            </div>

            <!-- View 1: Stylized Interactive 2D Digital Map (matching user sketch perfectly) -->
            <div x-show="viewMode === 'interactive'" 
                 class="relative w-full aspect-[4/5] sm:aspect-[4/4.8] bg-[#fbf9f3] rounded-3xl overflow-hidden border-4 border-amber-300 shadow-inner select-none p-3 sm:p-5">
                
                <!-- SVG Blueprint Canvas matching the exact sketch lines & structures -->
                <svg class="absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 400 500" fill="none" xmlns="http://www.w3.org/2000/svg">
                    
                    <!-- Outer Boundary / Fence Line -->
                    <rect x="15" y="40" width="370" height="445" rx="8" stroke="#8c6d31" stroke-width="2" stroke-dasharray="6 3" fill="#fdfbf7"/>
                    
                    <!-- Top Road Area -->
                    <rect x="15" y="10" width="370" height="30" fill="#f3efe6"/>
                    <text x="75" y="25" fill="#8c6d31" font-size="10" font-weight="bold" font-family="sans-serif">ខ្លោងទ្វារទី១ (Gate 1)</text>
                    <text x="285" y="25" fill="#8c6d31" font-size="10" font-weight="bold" font-family="sans-serif">ខ្លោងទ្វារទី២ (Gate 2)</text>

                    <!-- Top Building Section (Kuti Abbot & School) -->
                    <rect x="75" y="55" width="250" height="60" rx="6" stroke="#b45309" stroke-width="2" fill="#fffbeb"/>
                    <line x1="195" y1="55" x2="195" y2="115" stroke="#d97706" stroke-width="1.5" stroke-dasharray="4 2"/>
                    
                    <!-- Left-Middle Compound Box (Office, Dining, Kuti) -->
                    <rect x="75" y="135" width="90" height="190" rx="6" stroke="#b45309" stroke-width="2" fill="#fffef7"/>
                    <!-- Kitchen out-box left -->
                    <rect x="25" y="195" width="40" height="45" rx="4" stroke="#c2410c" stroke-width="1.5" fill="#ffedd5"/>
                    <path d="M 65 218 L 75 218" stroke="#c2410c" stroke-width="2" marker-end="url(#arrow)"/>

                    <!-- Right-Middle Vihear Compound -->
                    <rect x="195" y="135" width="135" height="190" rx="8" stroke="#d97706" stroke-width="1" stroke-dasharray="4 2" fill="none"/>
                    
                    <!-- Vihear Building (Oval/Rect with gold traditional styling) -->
                    <rect x="210" y="150" width="105" height="150" rx="35" stroke="#b45309" stroke-width="3" fill="#fef3c7"/>
                    <rect x="230" y="175" width="65" height="100" rx="20" stroke="#d97706" stroke-width="1.5" fill="#fde68a" opacity="0.6"/>
                    
                    <!-- Lotus Pond (Significantly enlarged reservoir on far right) -->
                    <rect x="338" y="125" width="42" height="260" rx="18" fill="#e0f2fe" stroke="#0284c7" stroke-width="2.5"/>
                    <!-- Water ripples -->
                    <path d="M 345 170 Q 359 178 373 170" stroke="#38bdf8" stroke-width="2" stroke-linecap="round" fill="none"/>
                    <path d="M 345 220 Q 359 228 373 220" stroke="#38bdf8" stroke-width="2" stroke-linecap="round" fill="none"/>
                    <path d="M 345 270 Q 359 278 373 270" stroke="#38bdf8" stroke-width="2" stroke-linecap="round" fill="none"/>
                    <path d="M 345 320 Q 359 328 373 320" stroke="#38bdf8" stroke-width="2" stroke-linecap="round" fill="none"/>
                    <text x="360" y="255" fill="#0369a1" font-size="11" font-weight="bold" font-family="sans-serif" transform="rotate(90 360,255)">ស្រះទឹក (Pond)</text>

                    <!-- Bottom Student Residence Block (Full width strip) -->
                    <rect x="40" y="405" width="320" height="60" rx="10" stroke="#4338ca" stroke-width="2" fill="#eef2ff"/>
                    
                    <!-- Sitting/Recreation Area -->
                    <rect x="215" y="340" width="105" height="45" rx="12" stroke="#059669" stroke-width="1.5" fill="#ecfdf5"/>
                </svg>

                <!-- Interactive Hotspot Pins -->
                <template x-for="loc in locations" :key="loc.id">
                    <div class="absolute -translate-x-1/2 -translate-y-1/2 cursor-pointer transition-all duration-300 z-10 group"
                         :style="`top: ${loc.coordinates.top}; left: ${loc.coordinates.left};`"
                         @click="selectLocation(loc.id)">
                        
                        <!-- Glow Ping for Active -->
                        <div x-show="activeId === loc.id" class="absolute -inset-2.5 rounded-full bg-amber-500 animate-ping opacity-75"></div>

                        <!-- Pin Node -->
                        <div class="relative flex items-center justify-center rounded-2xl shadow-xl transition-all duration-300 border-2"
                             :class="activeId === loc.id 
                                ? 'w-11 h-11 bg-red-950 text-amber-300 border-amber-400 scale-125 z-30 shadow-amber-500/50' 
                                : 'w-8 h-8 bg-white text-gray-800 border-amber-600 hover:scale-110 hover:bg-amber-500 hover:text-red-950 z-20'">
                            
                            <i :class="`fa-solid ${loc.icon} ${activeId === loc.id ? 'text-sm' : 'text-xs'}`"></i>
                            
                            <!-- Number Badge -->
                            <span class="absolute -top-2 -right-2 w-4 h-4 rounded-full bg-amber-500 text-red-950 font-bold text-[9px] flex items-center justify-center border border-white shadow"
                                  x-text="loc.id"></span>
                        </div>

                        <!-- Floating Label Tooltip -->
                        <div class="absolute left-1/2 -translate-x-1/2 top-full mt-1.5 px-2.5 py-1 rounded-lg bg-black/90 text-white text-[10px] font-bold whitespace-nowrap backdrop-blur-sm opacity-0 group-hover:opacity-100 transition shadow-lg pointer-events-none z-40"
                             :class="activeId === loc.id ? '!opacity-100 bg-red-950 text-amber-200 border border-amber-400' : ''"
                             x-text="loc.name">
                        </div>
                    </div>
                </template>

            </div>

            <!-- View 2: User's Original Hand-drawn Sketch -->
            <div x-show="viewMode === 'sketch'" 
                 class="relative w-full rounded-3xl overflow-hidden border-4 border-amber-300 shadow-xl bg-gray-900 aspect-[4/5] sm:aspect-[4/4.8]">
                <img src="{{ asset('images/map_sketch.png') }}" alt="ប្លង់គំនូសព្រាងវត្តព្រៃស្ដី" class="w-full h-full object-contain">
                <div class="absolute bottom-3 left-3 right-3 bg-black/75 backdrop-blur-md text-white p-3 rounded-2xl border border-white/20 text-xs flex items-center justify-between">
                    <div>
                        <span class="font-bold text-amber-400">ប្លង់គំនូសព្រាងដើម</span>
                        <p class="text-[11px] text-gray-300">គូសដោយផ្ទាល់ដៃ បង្ហាញទីតាំងជាក់ស្ដែងក្នុងអារាម</p>
                    </div>
                    <button @click="viewMode = 'interactive'" class="bg-amber-500 text-red-950 font-bold text-xs px-3 py-1.5 rounded-xl hover:bg-amber-400 transition">
                        ប្ដូរមកប្លង់ឌីជីថល
                    </button>
                </div>
            </div>

            <!-- Quick Legend Row -->
            <div class="flex flex-wrap items-center justify-center gap-2 pt-2 text-[10px] text-gray-600">
                <span class="font-bold text-gray-500">ពណ៌សម្គាល់៖</span>
                <span class="bg-amber-100 text-amber-900 px-2 py-0.5 rounded-md font-semibold">ព្រះវិហារសក្ការៈ</span>
                <span class="bg-red-100 text-red-900 px-2 py-0.5 rounded-md font-semibold">សាលារៀន & ការិយាល័យ</span>
                <span class="bg-blue-100 text-blue-900 px-2 py-0.5 rounded-md font-semibold">កុដិ ផ្ទះបាយ & សាលាឆាន់</span>
                <span class="bg-cyan-100 text-cyan-900 px-2 py-0.5 rounded-md font-semibold">ស្រះទឹក</span>
                <span class="bg-emerald-100 text-emerald-900 px-2 py-0.5 rounded-md font-semibold">កន្លែងអង្គុយលេង</span>
            </div>

        </div>

        <!-- Right: Active Location Detail Panel (5 Cols) -->
        <div id="location-detail-card" class="lg:col-span-5 bg-white rounded-3xl p-6 sm:p-7 shadow-xl border-2 border-amber-300 space-y-5 sticky top-24">
            
            <!-- Photo & Badges -->
            <div class="relative aspect-video sm:aspect-[16/10] rounded-2xl overflow-hidden bg-gray-900 border border-amber-200 shadow-md group">
                <img :src="activeLocation.image" :alt="activeLocation.name" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                
                <div class="absolute top-3 left-3 flex flex-wrap gap-1.5">
                    <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow"
                          :class="activeLocation.badge_color"
                          x-text="activeLocation.category_name">
                    </span>
                    <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-black/70 text-amber-300 backdrop-blur-sm border border-white/20"
                          x-text="activeLocation.status">
                    </span>
                </div>

                <div class="absolute bottom-2 right-2 bg-black/80 text-white text-[10px] font-mono px-2 py-0.5 rounded backdrop-blur-sm">
                    ទីតាំងលេខ <span class="text-amber-400 font-bold" x-text="activeLocation.id"></span>
                </div>
            </div>

            <!-- Title & Zone -->
            <div class="space-y-1 pb-3 border-b border-gray-100">
                <div class="text-[11px] text-amber-800 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-location-dot text-amber-600"></i>
                    <span x-text="activeLocation.zone"></span>
                </div>
                <h3 class="font-moul text-base sm:text-lg text-red-950" x-text="activeLocation.name"></h3>
                <div class="text-xs text-gray-500 font-medium" x-text="activeLocation.name_en"></div>
            </div>

            <!-- Description -->
            <div class="space-y-2 text-xs leading-relaxed text-gray-700">
                <h4 class="font-bold text-gray-900 text-xs flex items-center gap-1.5">
                    <i class="fa-solid fa-circle-info text-amber-600"></i> សេចក្តីពិពណ៌នា៖
                </h4>
                <p class="bg-gray-50 p-3.5 rounded-xl border border-gray-100" x-text="activeLocation.description"></p>
            </div>

            <!-- Activities Held Here -->
            <div class="space-y-1.5 text-xs text-gray-700">
                <h4 class="font-bold text-gray-900 text-xs flex items-center gap-1.5">
                    <i class="fa-solid fa-bell text-amber-600"></i> កិច្ចពិធី និងសកម្មភាពសំខាន់ៗ៖
                </h4>
                <div class="bg-amber-50/60 p-3 rounded-xl border border-amber-100 text-[11px] text-amber-950 font-medium flex items-center gap-2">
                    <i class="fa-solid fa-dharmachakra text-amber-700"></i>
                    <span x-text="activeLocation.activities"></span>
                </div>
            </div>

            <!-- Actions: Google Maps Directions & Share -->
            <div class="pt-2 flex flex-wrap items-center gap-2.5">
                <a href="https://maps.google.com/?q=11.516800,104.832900" target="_blank" 
                   class="flex-1 bg-gradient-to-r from-red-900 to-amber-800 hover:from-red-950 hover:to-amber-900 text-white font-bold text-xs py-2.5 px-4 rounded-xl shadow transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-diamond-turn-right text-amber-300"></i> នាំផ្លូវតាម Google Maps
                </a>

                <button @click="navigator.clipboard.writeText(window.location.origin + '/pagoda/map?location_id=' + activeLocation.id); alert('បានចម្លងតំណភ្ជាប់ទីតាំង៖ ' + activeLocation.name);" 
                        class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs py-2.5 px-3.5 rounded-xl transition flex items-center gap-1.5">
                    <i class="fa-solid fa-share-nodes"></i> ចែករំលែក
                </button>
            </div>

        </div>

    </div>

    <!-- All 12 Landmarks Grid Cards -->
    <div class="space-y-6 pt-6">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between border-b border-gray-200 pb-4">
            <div>
                <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">បញ្ជីទីតាំងទាំង ១២ ក្នុងវត្ត</span>
                <h2 class="font-moul text-lg sm:text-xl text-red-950 mt-1">សំណង់ និងសមិទ្ធផលនានាក្នុងអារាម</h2>
            </div>
            <p class="text-xs text-gray-500 mt-1 sm:mt-0">ចុចលើទីតាំងណាមួយ ដើម្បីស្វែងរកលើប្លង់ផែនទីខាងលើ</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="loc in filteredLocations" :key="loc.id">
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-amber-100 transition-all duration-300 flex flex-col justify-between group cursor-pointer"
                     :class="activeId === loc.id ? 'border-2 border-amber-500 ring-2 ring-amber-400/30' : ''"
                     @click="selectLocation(loc.id)">
                    
                    <div>
                        <!-- Thumbnail -->
                        <div class="relative aspect-video bg-gray-900 overflow-hidden">
                            <img :src="loc.image" :alt="loc.name" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            
                            <div class="absolute top-2 left-2">
                                <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow"
                                      :class="loc.badge_color"
                                      x-text="loc.category_name">
                                </span>
                            </div>

                            <div class="absolute bottom-2 right-2 bg-black/80 text-white text-[10px] font-mono px-2 py-0.5 rounded">
                                លេខ <span class="text-amber-400 font-bold" x-text="loc.id"></span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-5 space-y-2">
                            <h4 class="font-moul text-sm text-red-950 group-hover:text-amber-800 transition line-clamp-1" x-text="loc.name"></h4>
                            <p class="text-[11px] text-amber-800 font-semibold" x-text="loc.zone"></p>
                            <p class="text-xs text-gray-600 line-clamp-2 leading-relaxed" x-text="loc.description"></p>
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="px-5 py-3 bg-gray-50/70 border-t border-gray-100 flex items-center justify-between text-xs">
                        <span class="text-[11px] text-gray-500" x-text="loc.status"></span>
                        <span class="text-red-900 font-bold group-hover:text-amber-700 flex items-center gap-1 text-[11px]">
                            មើលលើផែនទី <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i>
                        </span>
                    </div>

                </div>
            </template>
        </div>
    </div>

</div>

@endsection
