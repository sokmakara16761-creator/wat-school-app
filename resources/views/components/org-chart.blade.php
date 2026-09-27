<div x-data="{ openModal: false, zoomLevel: 1 }" class="bg-white rounded-3xl p-4 sm:p-8 shadow-xl border-2 border-amber-300 text-center">
    
    <!-- Top Header Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 pb-4 border-b border-amber-100 gap-3">
        <div class="text-left">
            <span class="text-xs font-bold text-amber-800 bg-amber-100 border border-amber-300 px-3 py-1 rounded-full uppercase tracking-wider">
                រចនាសម្ព័ន្ធដឹកនាំផ្លូវការ
            </span>
            <h3 class="font-moul text-lg sm:text-xl text-red-950 mt-1.5">
                រចនាសម្ព័ន្ធគណៈគ្រប់គ្រង សាលាពុទ្ធិកបឋមសិក្សាវត្តព្រៃស្ដី
            </h3>
        </div>

        <div class="flex items-center gap-2 self-start sm:self-center">
            <button @click="openModal = true; zoomLevel = 1.2" 
                    type="button"
                    class="inline-flex items-center gap-1.5 text-xs bg-amber-600 hover:bg-amber-700 text-white font-bold px-4 py-2.5 rounded-xl shadow transition cursor-pointer">
                <i class="fa-solid fa-magnifying-glass-plus"></i> ចុចពង្រីកមើលអក្សរច្បាស់ (Zoom)
            </button>
            <a href="{{ asset('images/school_organization_chart.png') }}" target="_blank" 
               class="inline-flex items-center gap-1.5 text-xs bg-stone-100 hover:bg-stone-200 text-gray-700 font-bold px-3 py-2.5 rounded-xl border border-gray-300 shadow-sm transition"
               title="បើកមើលក្នុងផ្ទាំងថ្មី">
                <i class="fa-solid fa-up-right-from-square"></i>
            </a>
        </div>
    </div>

    <!-- Main Large Image Container (Unconstrained High Quality) -->
    <div class="max-w-4xl mx-auto overflow-hidden rounded-2xl bg-amber-50/40 p-2 sm:p-6 border border-amber-200 shadow-inner">
        <div class="relative group cursor-pointer" @click="openModal = true; zoomLevel = 1.2">
            <img src="{{ asset('images/school_organization_chart.png') }}?v={{ time() }}" 
                 alt="រចនាសម្ព័ន្ធគណៈគ្រប់គ្រង សាលាពុទ្ធិកបឋមសិក្សាវត្តព្រៃស្ដី" 
                 class="w-full max-w-3xl mx-auto h-auto object-contain rounded-xl shadow-md transition duration-300 group-hover:brightness-95">
            
            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition bg-black/20 rounded-xl">
                <span class="bg-black/75 text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg flex items-center gap-2 backdrop-blur-sm">
                    <i class="fa-solid fa-magnifying-glass-plus text-amber-400"></i> ចុចលើរូបភាពដើម្បីពង្រីកធំ
                </span>
            </div>
        </div>
        <p class="text-[11px] text-gray-500 mt-3 flex items-center justify-center gap-1">
            <i class="fa-solid fa-circle-info text-amber-600"></i> ចុចលើរូបភាពដើម្បីពង្រីកមើលឈ្មោះ និងតួនាទីនីមួយៗឱ្យកាន់តែច្បាស់
        </p>
    </div>

    <!-- Fullscreen Lightbox / Zoom Modal -->
    <div x-show="openModal" 
         x-transition.opacity
         @keydown.escape.window="openModal = false"
         class="fixed inset-0 z-50 bg-black/90 backdrop-blur-sm flex flex-col items-center justify-between p-2 sm:p-6"
         style="display: none;">
        
        <!-- Modal Top Controls -->
        <div class="w-full max-w-5xl flex items-center justify-between text-white py-2 px-4 bg-black/60 rounded-2xl border border-white/20 mb-2">
            <div class="font-moul text-xs sm:text-sm text-amber-300">
                រចនាសម្ព័ន្ធគណៈគ្រប់គ្រង សាលាពុទ្ធិកបឋមសិក្សាវត្តព្រៃស្ដី
            </div>
            <div class="flex items-center gap-2">
                <button @click="zoomLevel = Math.min(zoomLevel + 0.3, 3)" 
                        type="button"
                        class="px-3 py-1.5 bg-white/20 hover:bg-white/30 rounded-lg text-xs font-bold transition flex items-center gap-1">
                    <i class="fa-solid fa-plus"></i> ពង្រីក
                </button>
                <button @click="zoomLevel = Math.max(zoomLevel - 0.3, 0.7)" 
                        type="button"
                        class="px-3 py-1.5 bg-white/20 hover:bg-white/30 rounded-lg text-xs font-bold transition flex items-center gap-1">
                    <i class="fa-solid fa-minus"></i> បង្រួម
                </button>
                <button @click="zoomLevel = 1.2" 
                        type="button"
                        class="px-3 py-1.5 bg-white/20 hover:bg-white/30 rounded-lg text-xs font-bold transition">
                    ដើម
                </button>
                <button @click="openModal = false" 
                        type="button"
                        class="w-8 h-8 rounded-full bg-red-600 hover:bg-red-700 text-white flex items-center justify-center font-bold text-sm transition ml-2">
                    ✕
                </button>
            </div>
        </div>

        <!-- Scrollable Large Image -->
        <div class="w-full h-full overflow-auto flex items-center justify-center p-2 rounded-2xl">
            <img src="{{ asset('images/school_organization_chart.png') }}?v={{ time() }}" 
                 alt="រចនាសម្ព័ន្ធគណៈគ្រប់គ្រង សាលាពុទ្ធិកបឋមសិក្សាវត្តព្រៃស្ដី" 
                 :style="`transform: scale(${zoomLevel}); transform-origin: center top; transition: transform 0.2s ease;`"
                 class="max-w-full max-h-[85vh] object-contain rounded-lg shadow-2xl">
        </div>

        <!-- Modal Bottom Helper -->
        <div class="text-[11px] text-gray-400 py-1">
            ចុច [✕] ឬចុចប៊ូតុង Esc លើ Keyboard ដើម្បីបិទវិញ
        </div>
    </div>

</div>
