@extends('layouts.app')

@section('title', 'ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី')

@section('content')

<!-- Header Banner -->
<div class="bg-gradient-to-r from-red-950 via-amber-900 to-amber-950 text-white py-14 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <div class="w-24 h-24 sm:w-28 sm:h-28 mx-auto flex items-center justify-center">
            <img src="{{ asset('images/school-logo.png') }}?v={{ time() }}" alt="Logo ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី" class="w-full h-full object-contain filter drop-shadow-xl hover:scale-105 transition-transform duration-300">
        </div>
        <span class="inline-block bg-amber-500 text-red-950 font-bold text-xs px-3.5 py-1 rounded-full shadow">
            ក្រសួងធម្មការ និងសាសនា • ពុទ្ធិកសិក្សាជាតិកម្ពុជា
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី
        </h1>
        <p class="text-amber-100/90 text-sm max-w-2xl mx-auto font-light leading-relaxed">
            ថ្នាលបណ្ដុះបណ្ដាលសមណសិស្ស និងកុលបុត្រខ្មែរ លើវិជ្ជាព្រះពុទ្ធសាសនា ភាសាបាលី វិន័យបិដក និងចំណេះដឹងទូទៅទំនើប ប្រកបដោយគុណភាព និងសីលធម៌ខ្ពស់។
        </p>
        <div class="flex justify-center gap-3 pt-2">
            <a href="{{ route('school.admissions') }}" class="bg-amber-500 hover:bg-amber-400 text-red-950 font-bold px-6 py-2.5 rounded-xl shadow-lg transition text-sm flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square"></i> ចុះឈ្មោះចូលរៀនថ្មី
            </a>
            <a href="{{ route('school.curriculum') }}" class="bg-white/10 hover:bg-white/20 text-amber-200 border border-amber-300/30 px-5 py-2.5 rounded-xl transition text-sm flex items-center gap-2">
                <i class="fa-solid fa-book-open"></i> កម្មវិធីសិក្សា
            </a>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-16">

    <!-- Interactive Services: Exam Results & Timetable -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Exam Results Card -->
        <div class="bg-gradient-to-br from-red-950 via-red-900 to-amber-950 text-white rounded-3xl p-6 sm:p-8 shadow-xl border-2 border-amber-400/50 relative overflow-hidden flex flex-col justify-between">
            <div class="space-y-3">
                <span class="bg-amber-400 text-red-950 font-bold text-[11px] px-3 py-1 rounded-full uppercase inline-flex items-center gap-1.5 shadow">
                    <i class="fa-solid fa-square-poll-vertical"></i> សេវាអេឡិចត្រូនិក
                </span>
                <h3 class="font-moul text-lg sm:text-xl text-amber-300">
                    ប្រព័ន្ធពិនិត្យលទ្ធផលប្រឡងសមណសិស្ស
                </h3>
                <p class="text-xs text-amber-100/90 leading-relaxed">
                    ស្វែងរកពិន្ទុ មធ្យមភាគ ចំណាត់ថ្នាក់ និងព្រឹត្តិបត្រពិន្ទុផ្លូវការ តាមរយៈអត្តលេខ ឬឈ្មោះសមណសិស្ស។
                </p>
            </div>

            <div class="pt-6 flex flex-wrap items-center gap-3">
                <a href="{{ route('school.results') }}" class="bg-amber-400 hover:bg-amber-300 text-red-950 font-bold px-5 py-2.5 rounded-xl shadow transition text-xs flex items-center gap-2">
                    <i class="fa-solid fa-magnifying-glass"></i> ពិនិត្យលទ្ធផលឥឡូវនេះ
                </a>
                <span class="text-[11px] text-amber-200/80">
                    <i class="fa-solid fa-bolt text-amber-400 mr-1"></i> ដឹងលទ្ធផលភ្លាមៗ
                </span>
            </div>
        </div>

        <!-- Timetable Card -->
        <div class="bg-gradient-to-br from-amber-900 via-amber-800 to-red-950 text-white rounded-3xl p-6 sm:p-8 shadow-xl border-2 border-amber-400/50 relative overflow-hidden flex flex-col justify-between">
            <div class="space-y-3">
                <span class="bg-amber-400 text-red-950 font-bold text-[11px] px-3 py-1 rounded-full uppercase inline-flex items-center gap-1.5 shadow">
                    <i class="fa-regular fa-calendar-days"></i> កាលវិភាគសិក្សា
                </span>
                <h3 class="font-moul text-lg sm:text-xl text-amber-300">
                    តារាងកាលវិភាគបង្រៀន និងប្រឡង
                </h3>
                <p class="text-xs text-amber-100/90 leading-relaxed">
                    ពិនិត្យកាលវិភាគសិក្សាប្រចាំសប្ដាហ៍តាមថ្នាក់នីមួយៗ (ថ្នាក់ត្រី ថ្នាក់ទោ ថ្នាក់ឯ) និងកាលវិភាគប្រឡងឆមាស។
                </p>
            </div>

            <div class="pt-6 flex flex-wrap items-center gap-3">
                <a href="{{ route('school.timetable') }}" class="bg-white hover:bg-amber-100 text-red-950 font-bold px-5 py-2.5 rounded-xl shadow transition text-xs flex items-center gap-2">
                    <i class="fa-solid fa-calendar-week"></i> មើលកាលវិភាគ
                </a>
                <span class="text-[11px] text-amber-200/80">
                    <i class="fa-solid fa-print text-amber-400 mr-1"></i> អាចបោះពុម្ពបាន
                </span>
            </div>
        </div>
    </div>

    <!-- Vision & Mission -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-sm border-t-4 border-red-800 hover:shadow-md transition">
            <div class="w-12 h-12 rounded-xl bg-red-100 text-red-800 flex items-center justify-center text-xl mb-4">
                <i class="fa-solid fa-eye"></i>
            </div>
            <h3 class="font-moul text-base text-red-950 mb-2">ចក្ខុវិស័យ (Vision)</h3>
            <p class="text-xs text-gray-600 leading-relaxed">
                ក្លាយជាថ្នាលអប់រំពុទ្ធិកបឋមសិក្សាឈានមុខក្នុងការបណ្ដុះបណ្ដាលសមណសិស្សឱ្យមានចំណេះដឹងភាសាបាលីជ្រៅជ្រះ ប្រកាន់ខ្ជាប់នូវវិន័យសង្ឃ និងមានសមត្ថភាពចំណេះទូទៅរឹងមាំ។
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border-t-4 border-amber-600 hover:shadow-md transition">
            <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center text-xl mb-4">
                <i class="fa-solid fa-bullseye"></i>
            </div>
            <h3 class="font-moul text-base text-amber-950 mb-2">បេសកកម្ម (Mission)</h3>
            <p class="text-xs text-gray-600 leading-relaxed">
                ផ្ដល់ការអប់រំពុទ្ធិកសិក្សាដោយឥតគិតថ្លៃ ទាំងការស្នាក់នៅ អាហារបិណ្ឌបាត និងសម្ភារសិក្សា ព្រមទាំងបំពាក់បំប៉នជំនាញកុំព្យូទ័រ និងភាសាបរទេសដល់សមណសិស្ស។
            </p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border-t-4 border-emerald-700 hover:shadow-md transition">
            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center text-xl mb-4">
                <i class="fa-solid fa-seedling"></i>
            </div>
            <h3 class="font-moul text-base text-emerald-950 mb-2">គុណតម្លៃ (Values)</h3>
            <p class="text-xs text-gray-600 leading-relaxed">
                «សីល សមាធិ បញ្ញា» ជាត្រីវិស័យនៃការអប់រំ បណ្ដុះឱ្យសមណសិស្សមានសីលធម៌ សុជីវធម៌ កតញ្ញូតាធម៌ និងការទទួលខុសត្រូវខ្ពស់ចំពោះសង្គមជាតិ។
            </p>
        </div>
    </div>

    <!-- Classes Overview -->
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between border-b border-gray-200 pb-4">
            <div>
                <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">កម្រិតសិក្សា</span>
                <h2 class="font-moul text-xl sm:text-2xl text-red-950 mt-1">កម្មវិធីសិក្សា ៣ កម្រិតថ្នាក់</h2>
            </div>
            <a href="{{ route('school.curriculum') }}" class="text-xs font-bold text-amber-800 hover:text-red-900 flex items-center gap-1 mt-2 sm:mt-0">
                មើលមុខវិជ្ជាលម្អិត <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($classes as $class)
                <div class="bg-white rounded-2xl p-6 shadow-md border border-amber-100 hover:border-amber-400 hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="inline-block bg-amber-100 text-amber-900 font-bold text-xs px-2.5 py-1 rounded mb-3">
                            {{ $class->grade_level == 'tri' ? 'ថ្នាក់ទី១' : ($class->grade_level == 'tho' ? 'ថ្នាក់ទី២' : 'ថ្នាក់ទី៣ (បញ្ចប់)') }}
                        </div>
                        <h3 class="font-moul text-base text-red-950 mb-1">{{ $class->name_kh }}</h3>
                        <div class="text-[11px] text-gray-500 mb-3">{{ $class->name_en }}</div>
                        <p class="text-xs text-gray-600 leading-relaxed mb-4">{{ $class->description }}</p>
                        
                        <div class="space-y-1.5 mb-4">
                            <span class="text-xs font-bold text-gray-800 block">មុខវិជ្ជាសំខាន់ៗ៖</span>
                            @if($class->subjects)
                                <ul class="text-xs text-gray-600 space-y-1">
                                    @foreach(array_slice($class->subjects, 0, 4) as $sub)
                                        <li class="flex items-center gap-1.5"><i class="fa-solid fa-check text-[10px] text-emerald-600"></i> {{ $sub }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-100 text-xs text-gray-500 space-y-1">
                        <div><i class="fa-solid fa-user-group text-amber-600 mr-1"></i> ចំនួនសមណសិស្ស៖ <strong>{{ $class->student_count }} អង្គ</strong></div>
                        <div><i class="fa-solid fa-chalkboard-user text-amber-600 mr-1"></i> គ្រូទទួលបន្ទុក៖ <strong>{{ $class->teacher_in_charge }}</strong></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Quick Teachers & Monks Preview -->
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between border-b border-gray-200 pb-4">
            <div>
                <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">បុគ្គលិកអប់រំ</span>
                <h2 class="font-moul text-xl sm:text-2xl text-red-950 mt-1">គណៈគ្រប់គ្រង និងសមណគ្រូ</h2>
            </div>
            <a href="{{ route('school.teachers') }}" class="text-xs font-bold text-amber-800 hover:text-red-900 flex items-center gap-1 mt-2 sm:mt-0">
                មើលលោកគ្រូទាំងអស់ <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <!-- School Organizational Chart (Interactive HD Display) -->
        <x-org-chart />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($teachers->take(4) as $teacher)
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-amber-100/80 text-center p-5 hover:shadow-lg transition flex flex-col justify-between">
                    <div>
                        <div class="w-28 h-28 mx-auto mb-3.5 relative">
                            <img src="{{ $teacher->photo }}?v={{ time() }}" 
                                 alt="{{ $teacher->name }}" 
                                 class="w-full h-full rounded-2xl object-cover border-2 border-amber-400 shadow-md">
                        </div>
                        <h4 class="font-bold text-gray-900 text-sm mb-1 leading-snug">{{ $teacher->name }}</h4>
                        <div class="text-[11px] font-semibold text-amber-800 mb-2.5 bg-amber-50 py-0.5 px-2.5 rounded-full inline-block border border-amber-200/60">
                            {{ $teacher->role }}
                        </div>
                        <p class="text-[11px] text-gray-500 line-clamp-3 leading-relaxed">{{ $teacher->bio }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Authentic School & Monastery Gallery Showcase -->
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between border-b border-gray-200 pb-4">
            <div>
                <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">ទិដ្ឋភាពជាក់ស្ដែង</span>
                <h2 class="font-moul text-xl sm:text-2xl text-red-950 mt-1">កម្រងរូបភាពសាលារៀន និងសមិទ្ធផល</h2>
            </div>
            <a href="{{ route('gallery.index') }}" class="text-xs font-bold text-amber-800 hover:text-red-900 flex items-center gap-1 mt-2 sm:mt-0">
                មើលរូបភាពទាំងអស់ <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-3xl overflow-hidden shadow-md border border-amber-200 group">
                <div class="relative aspect-video sm:aspect-[16/10] overflow-hidden bg-gray-900">
                    <img src="{{ asset('images/school_students_monks.jpg') }}" alt="សមណសិស្ស ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex flex-col justify-end p-5 text-white">
                        <span class="bg-amber-500 text-red-950 font-bold text-[10px] px-2.5 py-0.5 rounded-full w-max mb-1">សមណសិស្ស និងកុលបុត្រ</span>
                        <h4 class="font-moul text-sm text-amber-300">សមណសិស្សពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី</h4>
                        <p class="text-xs text-gray-300">ជួបជុំគ្នាមុនពេលចូលរៀនមុខអគារពុទ្ធិកបឋមសិក្សា</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl overflow-hidden shadow-md border border-amber-200 group">
                <div class="relative aspect-video sm:aspect-[16/10] overflow-hidden bg-gray-900">
                    <img src="{{ asset('images/school_building_construction.jpg') }}" alt="ព្រះវិហារថ្មី វត្តព្រៃស្ដី" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex flex-col justify-end p-5 text-white">
                        <span class="bg-amber-500 text-red-950 font-bold text-[10px] px-2.5 py-0.5 rounded-full w-max mb-1">ការដ្ឋានសាងសង់</span>
                        <h4 class="font-moul text-sm text-amber-300">វឌ្ឍនភាពនៃការកសាងព្រះវិហារថ្មី វត្តព្រៃស្ដី</h4>
                        <p class="text-xs text-gray-300">សំណង់ព្រះវិហារបេតុងរឹងមាំ និងជាទីសក្ការបូជាដ៏ឧត្ដមក្នុងអារាម</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
