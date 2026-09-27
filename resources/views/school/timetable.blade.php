@extends('layouts.app')

@section('title', 'កាលវិភាគសិក្សា និងប្រឡង - ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី')

@section('content')

<!-- Header Banner -->
<div class="bg-gradient-to-r from-red-950 via-amber-900 to-amber-950 text-white py-12 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-400/30 text-xs px-3.5 py-1 rounded-full font-semibold">
            <i class="fa-regular fa-calendar-days mr-1"></i> ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            កាលវិភាគសិក្សា និងប្រឡង (Timetable)
        </h1>
        <p class="text-amber-100/80 text-xs sm:text-sm max-w-2xl mx-auto">
            កម្មវិធីសិក្សាប្រចាំសប្ដាហ៍តាមកម្រិតថ្នាក់ (ថ្នាក់ត្រី ថ្នាក់ទោ ថ្នាក់ឯ) និងកាលវិភាគប្រឡងផ្លូវការ
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">

    <!-- Top Grade Navigation Tabs -->
    <div class="flex flex-wrap items-center justify-center sm:justify-between gap-3 bg-white p-3.5 rounded-2xl shadow-sm border border-amber-200">
        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('school.timetable', ['grade' => 'tri', 'tab' => 'weekly']) }}" 
               class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition flex items-center gap-2 {{ ($currentGrade == 'tri' && $currentTab != 'exam') ? 'bg-gradient-to-r from-red-900 to-amber-800 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-amber-50 hover:text-red-900' }}">
                <i class="fa-solid fa-graduation-cap"></i> ពុទ្ធិកថ្នាក់ត្រី (កម្រិត១)
            </a>

            <a href="{{ route('school.timetable', ['grade' => 'tho', 'tab' => 'weekly']) }}" 
               class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition flex items-center gap-2 {{ ($currentGrade == 'tho' && $currentTab != 'exam') ? 'bg-gradient-to-r from-red-900 to-amber-800 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-amber-50 hover:text-red-900' }}">
                <i class="fa-solid fa-graduation-cap"></i> ពុទ្ធិកថ្នាក់ទោ (កម្រិត២)
            </a>

            <a href="{{ route('school.timetable', ['grade' => 'ek', 'tab' => 'weekly']) }}" 
               class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition flex items-center gap-2 {{ ($currentGrade == 'ek' && $currentTab != 'exam') ? 'bg-gradient-to-r from-red-900 to-amber-800 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-amber-50 hover:text-red-900' }}">
                <i class="fa-solid fa-graduation-cap"></i> ពុទ្ធិកថ្នាក់ឯ (កម្រិត៣)
            </a>
        </div>

        <div>
            <a href="{{ route('school.timetable', ['grade' => $currentGrade, 'tab' => 'exam']) }}" 
               class="px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition flex items-center gap-2 {{ $currentTab == 'exam' ? 'bg-red-600 text-white shadow-md animate-pulse' : 'bg-red-50 text-red-900 border border-red-200 hover:bg-red-100' }}">
                <i class="fa-solid fa-file-pen"></i> កាលវិភាគប្រឡងឆមាស
            </a>
        </div>
    </div>

    @if($currentTab == 'exam')
        <!-- Exam Schedule View -->
        <div class="space-y-8">
            
            <div class="bg-gradient-to-r from-red-900 to-amber-900 text-white p-6 rounded-3xl shadow-lg border-2 border-amber-400 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="space-y-1">
                    <span class="bg-amber-400 text-red-950 font-bold text-xs px-3 py-1 rounded-full uppercase">
                        កាលវិភាគប្រឡងផ្លូវការ
                    </span>
                    <h2 class="font-moul text-lg sm:text-xl text-amber-200 mt-2">
                        ការប្រឡងវាស់ស្ទង់សមត្ថភាព ឆមាសទី១ ឆ្នាំសិក្សា ២០២៥ - ២០២៦
                    </h2>
                    <p class="text-xs text-amber-100/80">
                        សម្រាប់សមណសិស្សទាំង ៣ កម្រិតថ្នាក់ (ថ្នាក់ត្រី ថ្នាក់ទោ និងថ្នាក់ឯ)
                    </p>
                </div>

                <div class="flex gap-2">
                    <button onclick="window.print()" class="bg-amber-400 hover:bg-amber-300 text-red-950 font-bold text-xs px-4 py-2.5 rounded-xl transition flex items-center gap-1.5 shadow">
                        <i class="fa-solid fa-print"></i> បោះពុម្ពកាលវិភាគ
                    </button>
                </div>
            </div>

            <!-- Exam Timetable Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($examSchedules as $idx => $exam)
                    <div class="bg-white rounded-2xl p-6 shadow-md border-2 border-amber-200 hover:shadow-xl transition space-y-4">
                        <div class="border-b border-gray-100 pb-3">
                            <span class="text-[10px] font-bold bg-red-100 text-red-900 px-2.5 py-0.5 rounded-full">
                                ថ្ងៃប្រឡងទី {{ $idx + 1 }}
                            </span>
                            <h3 class="font-moul text-sm text-red-950 mt-1.5">{{ $exam['date'] }}</h3>
                            <p class="text-xs text-amber-800 font-semibold mt-0.5">{{ $exam['lunar'] }}</p>
                        </div>

                        <!-- Morning Session -->
                        <div class="bg-amber-50/60 p-3.5 rounded-xl border border-amber-100 space-y-1">
                            <div class="flex items-center justify-between">
                                <span class="text-[11px] font-bold text-amber-900">
                                    <i class="fa-regular fa-sun text-amber-600 mr-1"></i> វេនព្រឹក
                                </span>
                                <span class="text-[10px] text-gray-500 font-mono">{{ $exam['morning_time'] }}</span>
                            </div>
                            <h4 class="font-bold text-xs text-gray-900">{{ $exam['morning_subject'] }}</h4>
                        </div>

                        <!-- Afternoon Session -->
                        <div class="bg-amber-50/60 p-3.5 rounded-xl border border-amber-100 space-y-1">
                            <div class="flex items-center justify-between">
                                <span class="text-[11px] font-bold text-amber-900">
                                    <i class="fa-solid fa-cloud-sun text-amber-600 mr-1"></i> វេនរសៀល
                                </span>
                                <span class="text-[10px] text-gray-500 font-mono">{{ $exam['afternoon_time'] }}</span>
                            </div>
                            <h4 class="font-bold text-xs text-gray-900">{{ $exam['afternoon_subject'] }}</h4>
                        </div>

                        <!-- Location -->
                        <div class="text-[11px] text-gray-500 flex items-center gap-1.5 pt-1">
                            <i class="fa-solid fa-location-dot text-amber-600"></i>
                            <span>{{ $exam['room'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Exam Regulations -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-md border border-amber-100 space-y-4">
                <h3 class="font-moul text-base text-red-950 flex items-center gap-2">
                    <i class="fa-solid fa-shield-halved text-amber-600"></i> បទបញ្ជាផ្ទៃក្នុងពេលប្រឡង
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-gray-700">
                    <div class="flex items-start gap-2.5 p-3 rounded-xl bg-gray-50">
                        <i class="fa-solid fa-circle-check text-green-600 text-sm mt-0.5"></i>
                        <span>សមណសិស្សត្រូវមានវត្តមានក្នុងបន្ទប់ប្រឡងមុនម៉ោងកំណត់ ១៥ នាទី និងស្លៀកពាក់ចីវរ/សម្លៀកបំពាក់ឱ្យបានត្រឹមត្រូវ។</span>
                    </div>
                    <div class="flex items-start gap-2.5 p-3 rounded-xl bg-gray-50">
                        <i class="fa-solid fa-circle-xmark text-red-600 text-sm mt-0.5"></i>
                        <span>ហាមដាច់ខាតការលួចចម្លង យកឯកសារ កូនសៀវភៅ ឬទូរស័ព្ទដៃចូលក្នុងបន្ទប់ប្រឡង។</span>
                    </div>
                    <div class="flex items-start gap-2.5 p-3 rounded-xl bg-gray-50">
                        <i class="fa-solid fa-circle-check text-green-600 text-sm mt-0.5"></i>
                        <span>ត្រូវយកសម្ភារៈសរសេរ ប៊ិច ខ្មៅដៃ បន្ទាត់ និងកាតសម្គាល់សមណសិស្សឱ្យបានគ្រប់គ្រាន់។</span>
                    </div>
                    <div class="flex items-start gap-2.5 p-3 rounded-xl bg-gray-50">
                        <i class="fa-solid fa-circle-check text-green-600 text-sm mt-0.5"></i>
                        <span>គោរពតាមការណែនាំរបស់សមណគ្រូអនុរក្ស និងរក្សាភាពស្ងប់ស្ងាត់ក្នុងពេលធ្វើវិញ្ញាសា។</span>
                    </div>
                </div>
            </div>

        </div>
    @else
        <!-- Weekly Class Timetable View -->
        <div class="space-y-8">
            
            <!-- Class Info Banner -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-amber-200 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <span class="bg-amber-100 text-amber-900 text-xs font-bold px-3 py-1 rounded-full uppercase">
                        កាលវិភាគសិក្សាប្រចាំសប្ដាហ៍
                    </span>
                    <h2 class="font-moul text-lg sm:text-xl text-red-950 mt-2">
                        @if($currentGrade == 'tri')
                            ពុទ្ធិកបឋមសិក្សា ថ្នាក់ត្រី (កម្រិតទី១)
                        @elseif($currentGrade == 'tho')
                            ពុទ្ធិកបឋមសិក្សា ថ្នាក់ទោ (កម្រិតទី២)
                        @else
                            ពុទ្ធិកបឋមសិក្សា ថ្នាក់ឯ (កម្រិតទី៣)
                        @endif
                    </h2>
                    <p class="text-xs text-gray-500 mt-0.5">ម៉ោងសិក្សា៖ ព្រឹក (០៧:០០ - ១១:០០) | រសៀល (១៣:០០ - ១៦:៤៥)</p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('school.results', ['grade' => $currentGrade]) }}" class="bg-amber-100 hover:bg-amber-200 text-red-950 text-xs font-bold px-4 py-2.5 rounded-xl transition flex items-center gap-1.5">
                        <i class="fa-solid fa-magnifying-glass"></i> មើលលទ្ធផលប្រឡងថ្នាក់នេះ
                    </a>
                </div>
            </div>

            <!-- Days Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($days as $day)
                    @php
                        $dayLessons = $timetables->get($day, collect());
                    @endphp
                    <div class="bg-white rounded-3xl overflow-hidden shadow-md border border-amber-200 flex flex-col justify-between">
                        <!-- Day Header -->
                        <div class="bg-gradient-to-r from-red-950 to-amber-950 text-white p-4 flex items-center justify-between border-b-2 border-amber-500">
                            <h3 class="font-moul text-sm text-amber-300">
                                ថ្ងៃ{{ $day }}
                            </h3>
                            <span class="text-[11px] bg-amber-500/20 text-amber-200 border border-amber-400/30 px-2.5 py-0.5 rounded-full font-mono">
                                {{ $dayLessons->count() }} ម៉ោង
                            </span>
                        </div>

                        <!-- Schedule Items -->
                        <div class="p-4 space-y-3 flex-1">
                            @forelse($dayLessons as $item)
                                <div class="p-3 rounded-2xl border transition {{ $item->session == 'ព្រឹក' ? 'bg-amber-50/50 border-amber-100 hover:border-amber-300' : 'bg-blue-50/40 border-blue-100 hover:border-blue-300' }}">
                                    <div class="flex items-center justify-between text-[10px] text-gray-500 font-mono mb-1">
                                        <span class="font-bold {{ $item->session == 'ព្រឹក' ? 'text-amber-800' : 'text-blue-800' }}">
                                            <i class="fa-regular {{ $item->session == 'ព្រឹក' ? 'fa-sun text-amber-600' : 'fa-cloud-sun text-blue-600' }} mr-1"></i>
                                            {{ $item->session }}
                                        </span>
                                        <span>{{ $item->time_slot }}</span>
                                    </div>

                                    <h4 class="font-bold text-xs text-gray-900 line-clamp-1">
                                        {{ $item->subject }}
                                    </h4>

                                    <div class="flex items-center justify-between text-[11px] text-gray-600 mt-2 pt-1.5 border-t border-gray-100">
                                        <span class="text-amber-900 font-medium truncate max-w-[150px]">
                                            <i class="fa-solid fa-user-tie text-[9px] text-amber-600 mr-1"></i>
                                            {{ $item->teacher_name }}
                                        </span>
                                        <span class="text-[10px] bg-white px-2 py-0.5 rounded-md border border-gray-200 text-gray-500">
                                            {{ $item->room }}
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-6 text-xs text-gray-400">
                                    គ្មានកាលវិភាគ
                                </div>
                            @endforelse
                        </div>

                        <!-- Day Footer -->
                        <div class="p-3 bg-gray-50 border-t border-gray-100 text-center text-[11px] text-gray-500 font-medium">
                            ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Teachers List Reference -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-md border border-amber-100 space-y-4">
                <h3 class="font-moul text-base text-red-950 flex items-center gap-2">
                    <i class="fa-solid fa-chalkboard-user text-amber-600"></i> បញ្ជីសមណគ្រូ និងគ្រូបង្រៀនទទួលបន្ទុក
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($teachers as $t)
                        <div class="bg-amber-50/50 p-4 rounded-2xl border border-amber-200 flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full overflow-hidden flex-shrink-0 border-2 border-amber-300">
                                <img src="{{ $t->photo }}" alt="{{ $t->name }}" class="w-full h-full object-cover">
                            </div>
                            <div class="space-y-0.5 truncate">
                                <h4 class="font-bold text-xs text-gray-900 truncate">{{ $t->name }}</h4>
                                <p class="text-[10px] text-amber-800 font-semibold truncate">{{ $t->role }}</p>
                                <p class="text-[10px] text-gray-500 truncate">{{ $t->teaching_subjects }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    @endif

</div>

@endsection
