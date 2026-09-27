<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ផ្ទាំងគ្រប់គ្រងទិន្នន័យ (Admin Dashboard)')</title>
    
    <!-- Google Khmer Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@400;700&family=Kantumruy+Pro:wght@400;500;600;700&family=Moul&family=Siemreap&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased min-h-screen flex" x-data="{ sidebarOpen: true }">

    <!-- Admin Sidebar -->
    <aside class="w-64 bg-red-950 text-amber-100 flex flex-col justify-between flex-shrink-0 min-h-screen shadow-xl border-r border-amber-500/20">
        <div>
            <!-- Admin Logo Header -->
            <div class="p-5 border-b border-white/10 flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}?v={{ time() }}" alt="Logo វត្តព្រៃស្ដី" class="w-11 h-11 object-contain drop-shadow-md flex-shrink-0">
                <div>
                    <h2 class="font-moul text-xs text-amber-300">វត្តព្រៃស្ដី</h2>
                    <p class="text-[10px] text-amber-200/80">ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី</p>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="p-4 space-y-1.5 text-xs font-semibold">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-amber-500 text-red-950 font-bold' : 'text-amber-200/80 hover:bg-white/10 hover:text-white' }}">
                    <i class="fa-solid fa-chart-pie text-sm"></i> Dashboard
                </a>

                <a href="{{ route('admin.admissions') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.admissions*') ? 'bg-amber-500 text-red-950 font-bold' : 'text-amber-200/80 hover:bg-white/10 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-graduation-cap text-sm"></i> ពាក្យសុំចូលរៀន
                    </div>
                </a>

                <a href="{{ route('admin.posts') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.posts*') ? 'bg-amber-500 text-red-950 font-bold' : 'text-amber-200/80 hover:bg-white/10 hover:text-white' }}">
                    <i class="fa-regular fa-newspaper text-sm"></i> អត្ថបទព័ត៌មាន
                </a>

                <a href="{{ route('admin.events') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.events*') ? 'bg-amber-500 text-red-950 font-bold' : 'text-amber-200/80 hover:bg-white/10 hover:text-white' }}">
                    <i class="fa-regular fa-calendar-check text-sm"></i> កម្មវិធីបុណ្យទាន
                </a>

                <a href="{{ route('admin.messages') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.messages*') ? 'bg-amber-500 text-red-950 font-bold' : 'text-amber-200/80 hover:bg-white/10 hover:text-white' }}">
                    <i class="fa-regular fa-envelope text-sm"></i> សារទំនាក់ទំនង
                </a>

                <div class="pt-4 border-t border-white/10 mt-4">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-amber-300 hover:bg-white/10 transition">
                        <i class="fa-solid fa-arrow-up-right-from-square text-sm"></i> មើល Website ខាងក្រៅ
                    </a>
                </div>
            </nav>
        </div>

        <!-- Admin Profile Footer -->
        <div class="p-4 border-t border-white/10 bg-black/30">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-amber-600 flex items-center justify-center text-white text-sm">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
                <div class="text-xs">
                    <div class="font-bold text-amber-200">Admin វត្ត</div>
                    <div class="text-[10px] text-gray-400">admin@wat.edu.kh</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Admin Area -->
    <div class="flex-grow flex flex-col min-h-screen overflow-x-hidden">
        
        <!-- Top Navbar -->
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center shadow-sm">
            <div class="flex items-center gap-2">
                <h1 class="font-moul text-base text-red-950">@yield('page_title', 'ប្រព័ន្ធគ្រប់គ្រងទិន្នន័យ')</h1>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-xs text-gray-500"><i class="fa-regular fa-calendar mr-1"></i> {{ date('d M Y') }}</span>
            </div>
        </header>

        <!-- Flash Message -->
        @if(session('success'))
            <div class="mx-6 mt-4 p-4 rounded-xl bg-emerald-50 border border-emerald-300 text-emerald-900 text-xs font-medium flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-circle-check text-emerald-600 text-base"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        <!-- Admin Page Body -->
        <main class="p-6 flex-grow">
            @yield('content')
        </main>
    </div>

</body>
</html>
