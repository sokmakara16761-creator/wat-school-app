@extends('layouts.app')

@section('title', 'ប្រវត្តិវត្ត និងព្រះចៅអធិការ - វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)')

@section('content')

<!-- Banner Header -->
<div class="bg-gradient-to-r from-red-950 via-red-900 to-amber-950 text-white py-12 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <div class="w-24 h-24 sm:w-28 sm:h-28 mx-auto flex items-center justify-center">
            <img src="{{ asset('images/wat-logo.png') }}?v={{ time() }}" alt="Logo វត្តធនរតនេសោភណារាម" class="w-full h-full object-contain filter drop-shadow-xl hover:scale-105 transition-transform duration-300">
        </div>
        <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-400/30 text-xs px-3.5 py-1 rounded-full font-semibold">
            ផ្នែកវត្តអារាម • សង្កាត់ចោមចៅ២ ខណ្ឌពោធិ៍សែនជ័យ
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            ប្រវត្តិវត្តធនរតនេសោភណារាម (ព្រៃស្ដី)
        </h1>
        <p class="text-amber-100/80 text-sm max-w-2xl mx-auto">
            ស្វែងយល់អំពីប្រវត្តិកកើតទីអារាម ស្នាព្រះហស្តព្រះចៅអធិការគ្រប់ជំនាន់ និងសមិទ្ធផលនានាក្នុងវត្ត
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-16">

    <!-- Pagoda History Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
        <div class="lg:col-span-6 space-y-4">
            <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">ប្រវត្តិសង្ខេប</span>
            <h2 class="font-moul text-xl sm:text-2xl text-red-950 leading-relaxed">
                ដើមកំណើត និងការកកើតវត្តព្រៃស្ដី
            </h2>
            <p class="text-gray-700 text-sm leading-relaxed">
                វត្តព្រៃស្ដី ត្រូវបានកសាងឡើងដោយមានការផ្ដួចផ្ដើមពីព្រះថេរានុថេរៈ និងពុទ្ធបរិស័ទចំណុះជើងវត្តក្នុងមូលដ្ឋាន។ ទីអារាមនេះជាទីសក្ការបូជាដ៏ពិសិដ្ឋ និងជាមជ្ឈមណ្ឌលនៃការប្រតិបត្តិធម៌វិន័យរបស់ព្រះសង្ឃនិងពុទ្ធសាសនិកជន។
            </p>
            <p class="text-gray-700 text-sm leading-relaxed">
                ឆ្លងកាត់ដំណាក់កាលប្រវត្តិសាស្ត្រជាច្រើនទសវត្សរ៍ ទីអារាមនេះត្រូវបានស្ថាបនា កែលម្អ និងពង្រីកជាបន្តបន្ទាប់ ដោយបានសាងសង់ព្រះវិហារ សាលាឆាន់ កុដិស្នាក់នៅ និងជាពិសេសគឺការបង្កើត <strong>ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី</strong> ក្រោមឱវាទនៃក្រសួងធម្មការ និងសាសនា ដើម្បីបណ្ដុះបណ្ដាលសមណសិស្សទាំងផ្លូវលោកនិងផ្លូវធម៌។
            </p>
            <div class="pt-2 flex items-center gap-4 text-xs font-semibold text-red-900">
                <div class="bg-amber-100 px-3 py-2 rounded-lg"><i class="fa-solid fa-clock text-amber-600 mr-1"></i> កកើតជាយូរលង់ណាស់មកហើយ</div>
                <div class="bg-amber-100 px-3 py-2 rounded-lg"><i class="fa-solid fa-landmark text-amber-600 mr-1"></i> ផ្ទៃដីវត្ត៖ ធំទូលាយម្លប់ត្រឈឹងត្រឈៃ</div>
            </div>
        </div>
        <div class="lg:col-span-6">
            <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-amber-300 group">
                <img src="{{ asset('images/wat_preysdey_aerial_temple.jpg') }}?v={{ time() }}" alt="ទិដ្ឋភាពពីលើអាកាស វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)" class="w-full h-80 sm:h-96 object-cover group-hover:scale-105 transition duration-500">
            </div>
        </div>
    </div>

    <!-- Current Abbot Profile & Doctoral Degree Showcase -->
    <div class="bg-gradient-to-br from-amber-50 via-white to-stone-50 rounded-3xl p-6 sm:p-10 shadow-xl border-2 border-amber-300 relative overflow-hidden">
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-amber-200/30 rounded-full blur-2xl"></div>
        <div class="relative z-10 space-y-8">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-amber-800 bg-amber-100 border border-amber-300 text-xs px-3.5 py-1 rounded-full font-bold uppercase tracking-wider">
                    ព្រះសង្ឃនាយកវត្ត & នាយកសាលា
                </span>
                <h2 class="font-moul text-xl sm:text-2xl lg:text-3xl text-red-950 mt-2">
                    ព្រះចៅអធិការបច្ចុប្បន្ន
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 mt-1">
                    ជីវប្រវត្តិសង្ខេប និងការដឹកនាំរបស់ព្រះចៅអធិការវត្តព្រៃស្ដី
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <!-- Abbot Photo & Core Identity -->
                <div class="lg:col-span-4 text-center">
                    <div class="relative inline-block">
                        <img src="{{ asset('images/abbot_phal_sophoeun.jpg') }}?v={{ time() }}" 
                             alt="ព្រះវិសុទ្ធានុញ្ញាណ បណ្ឌិត ផល សុភឿន" 
                             class="w-56 h-56 sm:w-64 sm:h-64 mx-auto object-cover rounded-3xl shadow-2xl border-4 border-amber-400">
                        <span class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-red-900 text-amber-300 text-xs font-bold px-4 py-1 rounded-full shadow-lg border border-amber-300 whitespace-nowrap">
                            ព្រះចៅអធិការវត្តព្រៃស្ដី
                        </span>
                    </div>
                    <div class="mt-6">
                        <h3 class="font-moul text-lg sm:text-xl text-red-950">ព្រះវិសុទ្ធានុញ្ញាណ បណ្ឌិត ផល សុភឿន</h3>
                        <p class="text-xs font-bold text-amber-800 mt-0.5">PHAL SOPHOEUN (Ph.D. in Linguistics)</p>
                        <p class="text-xs text-gray-600 mt-1">ព្រះចៅអធិការវត្តព្រៃស្ដី និងជានាយកពុទ្ធិកបឋមសិក្សាវត្តព្រៃស្ដី</p>
                    </div>
                </div>

                <!-- Biography & Leadership Info -->
                <div class="lg:col-span-8 space-y-6">
                    <div class="bg-white p-6 sm:p-8 rounded-2xl border border-amber-200 shadow-sm space-y-4">
                        <h4 class="font-moul text-sm sm:text-base text-red-900 flex items-center gap-2">
                            <i class="fa-solid fa-dharmachakra text-amber-600 text-lg"></i> ជីវប្រវត្តិសង្ខេប និងការដឹកនាំ
                        </h4>
                        <p class="text-xs sm:text-sm text-gray-700 leading-relaxed">
                            <strong>ព្រះតេជព្រះគុណ ព្រះវិសុទ្ធានុញ្ញាណ បណ្ឌិត ផល សុភឿន</strong> ព្រះចៅអធិការវត្តព្រៃស្ដី និងជានាយកដឹកនាំពុទ្ធិកបឋមសិក្សាវត្តព្រៃស្ដី។ ព្រះអង្គបានខិតខំសិក្សាស្រាវជ្រាវរហូតបញ្ចប់ការសិក្សាថ្នាក់បណ្ឌិត ជំនាញភាសាវិទ្យា (Doctor of Philosophy in Linguistics) ពីរាជបណ្ឌិត្យសភាកម្ពុជា នាឆ្នាំ២០២៤។
                        </p>
                        <p class="text-xs sm:text-sm text-gray-700 leading-relaxed">
                            ព្រះអង្គបានលះបង់ព្រះកាយពល និងព្រះបញ្ញាញាណយ៉ាងពេញទំហឹងក្នុងការដឹកនាំកសាងសមិទ្ធផលនានាក្នុងទីអារាមវត្តព្រៃស្ដី ព្រមទាំងបង្កើត និងគ្រប់គ្រងពុទ្ធិកបឋមសិក្សាវត្តព្រៃស្ដី ដើម្បីបណ្ដុះបណ្ដាលសមណសិស្ស លើកកម្ពស់វិស័យពុទ្ធិកសិក្សា និងសីលធម៌សង្គមជាតិទាំងមូល។
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Abbot Lineage Section -->
    <div class="space-y-8">
        <div class="text-center max-w-2xl mx-auto">
            <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">ព្រះសង្ឃនាយកដ្ឋាន</span>
            <h2 class="font-moul text-xl sm:text-2xl text-red-950 mt-1">
                ព្រះចៅអធិការគ្រប់ជំនាន់
            </h2>
            <p class="text-xs text-gray-500 mt-2">ព្រះមហាថេរដែលបានដឹកនាំកសាង និងអភិវឌ្ឍវត្តព្រៃស្ដីពីអតីតកាលដល់បច្ចុប្បន្ន</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($abbotLineage as $abbot)
                <div class="bg-white rounded-2xl p-6 shadow-md border border-amber-100 hover:border-amber-400 hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-full bg-red-900 text-amber-300 flex items-center justify-center font-bold text-lg mb-4 shadow">
                            <i class="fa-solid fa-dharmachakra"></i>
                        </div>
                        <span class="text-xs font-bold text-amber-700 bg-amber-50 px-2.5 py-1 rounded-md">{{ $abbot['order'] }}</span>
                        <h3 class="font-bold text-gray-900 text-base mt-2 mb-1 leading-snug">{{ $abbot['name'] }}</h3>
                        <div class="text-xs font-semibold text-red-800 mb-3"><i class="fa-regular fa-calendar-days mr-1 text-amber-600"></i> {{ $abbot['period'] }}</div>
                        <p class="text-xs text-gray-600 leading-relaxed">{{ $abbot['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Campus Map Interactive Banner -->
    <div class="bg-gradient-to-r from-red-950 via-amber-900 to-amber-950 text-white p-6 sm:p-8 rounded-3xl shadow-xl border-2 border-amber-400 flex flex-col md:flex-row md:items-center justify-between gap-6">
        <div class="space-y-2">
            <span class="bg-amber-400 text-red-950 font-bold text-xs px-3 py-1 rounded-full uppercase shadow inline-flex items-center gap-1.5">
                <i class="fa-solid fa-map-location-dot"></i> សេវាអន្តរកម្មថ្មី
            </span>
            <h3 class="font-moul text-lg sm:text-xl text-amber-300">
                ផែនទីអន្តរកម្មទីតាំងក្នុងបរិវេណវត្ត (Campus Map)
            </h3>
            <p class="text-xs sm:text-sm text-amber-100/90 max-w-xl leading-relaxed">
                ទស្សនាប្លង់ទីតាំងព្រះវិហារ អគារពុទ្ធិកបឋមសិក្សា សាលាឆាន់ មហាកុដិ បណ្ណាល័យ និងសួនពុទ្ធប្រវត្តិ ព្រមទាំងទស្សនាដំណើរកម្សាន្តនិម្មិតក្នុងអារាម។
            </p>
        </div>

        <div class="flex-shrink-0">
            <a href="{{ route('pagoda.map') }}" class="bg-amber-400 hover:bg-amber-300 text-red-950 font-bold text-xs sm:text-sm px-6 py-3 rounded-2xl shadow-lg transition inline-flex items-center gap-2">
                <i class="fa-solid fa-compass"></i> បើកមើលប្លង់ផែនទី
            </a>
        </div>
    </div>

    <!-- Pagoda Landmarks & Construction Projects -->
    <div class="space-y-8">
        <div class="text-center max-w-2xl mx-auto">
            <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">ស្ថាបត្យកម្មខ្មែរ & ការកសាង</span>
            <h2 class="font-moul text-xl sm:text-2xl text-red-950 mt-1">
                សមិទ្ធផលសំខាន់ៗក្នុងវត្ត
            </h2>
            <p class="text-xs text-gray-500 mt-2">ដំណើរការកសាងសមិទ្ធផល និងស្ថាបត្យកម្មព្រះពុទ្ធសាសនាក្នុងវត្តអារាម</p>
        </div>

        <!-- Featured Facebook Project / Post Card -->
        <div class="max-w-4xl mx-auto bg-white rounded-3xl overflow-hidden shadow-xl border-2 border-amber-300 hover:shadow-2xl transition duration-300">
            <div class="grid grid-cols-1 md:grid-cols-12">
                <!-- Project Image -->
                <div class="md:col-span-6 relative overflow-hidden bg-gray-900 group">
                    <img src="{{ asset('images/temple_construction_fb.jpg') }}?v={{ time() }}" 
                         alt="ការសាងសង់ព្រះវិហារថ្មី នៃអារាមដ្ឋានព្រៃស្ដី" 
                         class="w-full h-full min-h-[280px] sm:min-h-[340px] object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute top-4 left-4">
                        <span class="bg-[#1877F2] text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg inline-flex items-center gap-1.5">
                            <i class="fa-brands fa-facebook"></i> Facebook Post
                        </span>
                    </div>
                    <div class="absolute bottom-4 left-4 right-4 text-white">
                        <span class="bg-amber-500/90 backdrop-blur-sm text-red-950 text-[11px] font-bold px-2.5 py-1 rounded-md uppercase">
                            គម្រោងស្ថាបនាថ្មី
                        </span>
                    </div>
                </div>

                <!-- Content & Direct Link -->
                <div class="md:col-span-6 p-6 sm:p-8 flex flex-col justify-between space-y-4">
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 text-xs text-gray-500">
                            <i class="fa-regular fa-calendar text-amber-600"></i>
                            <span>ការសាងសង់ជាបន្តបន្ទាប់</span>
                        </div>
                        <h3 class="font-moul text-lg sm:text-xl text-red-950 leading-snug">
                            ការសាងសង់ព្រះវិហារថ្មី នៃអារាមដ្ឋានព្រៃស្ដី
                        </h3>
                        <p class="text-xs sm:text-sm text-gray-700 leading-relaxed">
                            ដើម្បីឱ្យការកសាងដំណើរការបានល្អប្រសើរ សូមញាតិញោមពុទ្ធបរិស័ទជិតឆ្ងាយចូលរួមចំណែកតាមសទ្ធាជ្រះថ្លារៀងៗខ្លួន ដើម្បីតម្កល់ទុកជាមត៌កសម្រាប់ព្រះពុទ្ធសាសនាអស់កាលជាយូរអង្វែង។
                        </p>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                        <a href="https://web.facebook.com/share/p/1FDxCsQmot/" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="flex-1 bg-[#1877F2] hover:bg-[#0c63d4] text-white font-bold text-xs sm:text-sm py-3 px-5 rounded-xl shadow-md hover:shadow-lg transition flex items-center justify-center gap-2 text-center">
                            <i class="fa-brands fa-facebook text-base"></i> មើលការបង្ហោះលើ Facebook
                        </a>
                        <a href="{{ route('donation.index') }}" 
                           class="bg-amber-100 hover:bg-amber-200 text-amber-950 font-bold text-xs sm:text-sm py-3 px-4 rounded-xl transition flex items-center justify-center gap-1.5 text-center">
                            <i class="fa-solid fa-hand-holding-heart text-amber-700"></i> ចូលរួមបុណ្យ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagoda Committee -->
    <div class="bg-amber-50/50 rounded-2xl p-8 border border-amber-200">
        <div class="text-center max-w-xl mx-auto mb-8">
            <h2 class="font-moul text-xl text-red-950">គណៈកម្មការ និងអាចារ្យវត្ត</h2>
            <p class="text-xs text-gray-600 mt-1">អ្នកទទួលបន្ទុកសម្របសម្រួលកិច្ចការបុណ្យទាន និងការគ្រប់គ្រងវត្តអារាម</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($committee as $c)
                <div class="bg-white p-4 rounded-xl border border-amber-100 shadow-sm text-center">
                    <div class="w-12 h-12 mx-auto mb-2 rounded-full bg-amber-100 text-amber-800 flex items-center justify-center text-lg">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    <div class="text-xs text-amber-700 font-semibold">{{ $c['role'] }}</div>
                    <div class="font-bold text-gray-900 text-sm mt-0.5">{{ $c['name'] }}</div>
                    <div class="text-xs text-gray-500 mt-1"><i class="fa-solid fa-phone text-amber-600 mr-1"></i> {{ $c['phone'] }}</div>
                </div>
            @endforeach
        </div>
    </div>

</div>

@endsection
