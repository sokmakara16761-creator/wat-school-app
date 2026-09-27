@extends('layouts.app')

@section('title', 'ពិនិត្យលទ្ធផលប្រឡងសមណសិស្ស - ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី')

@section('content')

<!-- Header Banner -->
<div class="bg-gradient-to-r from-red-950 via-amber-900 to-amber-950 text-white py-12 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-400/30 text-xs px-3.5 py-1 rounded-full font-semibold">
            <i class="fa-solid fa-graduation-cap mr-1"></i> ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            ប្រព័ន្ធពិនិត្យលទ្ធផលប្រឡងសមណសិស្ស (Exam Results)
        </h1>
        <p class="text-amber-100/80 text-xs sm:text-sm max-w-2xl mx-auto">
            ស្វែងរកពិន្ទុ និងចំណាត់ថ្នាក់ប្រឡងប្រចាំឆមាស និងប្រឡងបញ្ចប់ឆ្នាំ តាមរយៈអត្តលេខ ឬឈ្មោះសមណសិស្ស
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10">

    <!-- Search Box Card -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl border border-amber-200 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-amber-50 rounded-full blur-3xl -z-0 opacity-60"></div>
        
        <form action="{{ route('school.results') }}" method="GET" class="relative z-10 space-y-6">
            <div class="text-center max-w-xl mx-auto space-y-2">
                <h2 class="font-moul text-lg sm:text-xl text-red-950">
                    វាយបញ្ចូលអត្តលេខ ឬ ឈ្មោះសមណសិស្ស
                </h2>
                <p class="text-xs text-gray-500">
                    ឧទាហរណ៍៖ អត្តលេខ <span class="font-mono font-bold text-amber-700">PSD-2026-001</span> ឬ ឈ្មោះ <span class="font-bold text-amber-700">កែវ ចាន់ធឿន</span>
                </p>
            </div>

            <!-- Input Fields -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-3 max-w-4xl mx-auto">
                <div class="md:col-span-6 relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-magnifying-glass text-sm text-amber-600"></i>
                    </div>
                    <input type="text" 
                           name="search" 
                           value="{{ $search }}" 
                           placeholder="វាយ អត្តលេខ ឬ ឈ្មោះសមណសិស្ស..." 
                           class="w-full bg-gray-50 border-2 border-amber-200 rounded-2xl pl-10 pr-4 py-3 text-sm focus:outline-none focus:border-amber-500 focus:bg-white transition shadow-sm font-medium">
                </div>

                <div class="md:col-span-3">
                    <select name="grade" class="w-full bg-gray-50 border-2 border-amber-200 rounded-2xl px-3.5 py-3 text-sm focus:outline-none focus:border-amber-500 focus:bg-white transition shadow-sm text-gray-700 font-medium">
                        <option value="all" {{ $grade == 'all' ? 'selected' : '' }}>គ្រប់កម្រិតថ្នាក់</option>
                        <option value="tri" {{ $grade == 'tri' ? 'selected' : '' }}>ពុទ្ធិកថ្នាក់ត្រី (កម្រិត១)</option>
                        <option value="tho" {{ $grade == 'tho' ? 'selected' : '' }}>ពុទ្ធិកថ្នាក់ទោ (កម្រិត២)</option>
                        <option value="ek" {{ $grade == 'ek' ? 'selected' : '' }}>ពុទ្ធិកថ្នាក់ឯ (កម្រិត៣)</option>
                    </select>
                </div>

                <div class="md:col-span-3">
                    <button type="submit" class="w-full bg-gradient-to-r from-red-900 via-amber-800 to-amber-700 hover:from-red-950 hover:to-amber-800 text-white font-bold py-3 px-6 rounded-2xl shadow-lg transition flex items-center justify-center gap-2 text-sm">
                        <i class="fa-solid fa-search"></i> ស្វែងរកលទ្ធផល
                    </button>
                </div>
            </div>

            <!-- Quick Clickable Sample Chips -->
            <div class="flex flex-wrap items-center justify-center gap-2 pt-2 text-xs text-gray-600">
                <span class="font-semibold text-gray-500 mr-1"><i class="fa-solid fa-hand-pointer text-amber-600 mr-1"></i>សាកល្បងចុចមើល៖</span>
                @foreach($sampleStudents as $sample)
                    <a href="{{ route('school.results', ['search' => $sample->student_id]) }}" 
                       class="bg-amber-50 hover:bg-amber-100 text-amber-900 border border-amber-200 px-3 py-1 rounded-xl font-mono text-[11px] transition flex items-center gap-1.5 shadow-sm">
                        <span class="font-bold">{{ $sample->student_id }}</span>
                        <span class="text-gray-500 font-sans">({{ $sample->student_name }})</span>
                    </a>
                @endforeach
            </div>
        </form>
    </div>

    <!-- Detailed Single Result View (Official Transcript Slip) -->
    @if($selectedResult)
        <div id="transcript-container" class="space-y-6">
            
            <!-- Result Action Bar -->
            <div class="flex flex-wrap items-center justify-between gap-4 bg-amber-50 border border-amber-200 p-4 rounded-2xl">
                <div class="flex items-center gap-2 text-amber-950 font-bold text-sm">
                    <i class="fa-solid fa-circle-check text-green-600 text-base"></i>
                    <span>លទ្ធផលប្រឡងរបស់៖ <strong class="text-red-900">{{ $selectedResult->student_name }}</strong> ({{ $selectedResult->student_id }})</span>
                </div>
                
                <div class="flex flex-wrap items-center gap-2 text-xs font-semibold">
                    <a href="{{ route('school.results.slip', $selectedResult->id) }}" target="_blank" class="bg-red-900 hover:bg-red-950 text-white px-4 py-2 rounded-xl transition flex items-center gap-1.5 shadow">
                        <i class="fa-solid fa-print"></i> បោះពុម្ពព្រឹត្តិបត្រ (Print)
                    </a>
                    <button onclick="downloadTranscriptImage()" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-xl transition flex items-center gap-1.5 shadow">
                        <i class="fa-solid fa-download"></i> ទាញយករូបភាព (PNG)
                    </button>
                    <a href="{{ route('school.results') }}" class="bg-white hover:bg-gray-100 text-gray-700 border border-gray-300 px-4 py-2 rounded-xl transition">
                        <i class="fa-solid fa-rotate-left mr-1"></i> ស្វែងរកថ្មី
                    </a>
                </div>
            </div>

            <!-- Printable / Visual Grade Slip Card -->
            <div id="printable-slip" class="bg-white rounded-3xl p-6 sm:p-10 shadow-2xl border-4 border-amber-400 relative overflow-hidden bg-[radial-gradient(#fbf7ee_1px,transparent_1px)] [background-size:16px_16px]">
                
                <!-- Watermark Background Seal -->
                <div class="absolute inset-0 flex items-center justify-center opacity-5 pointer-events-none">
                    <img src="/images/wat-logo.png" alt="Seal" class="w-96 h-96 object-contain">
                </div>

                <div class="relative z-10 space-y-8">
                    
                    <!-- Header with Logos -->
                    <div class="text-center space-y-2 border-b-2 border-amber-200 pb-6">
                        <div class="flex items-center justify-center gap-4 mb-2">
                            <img src="/images/wat-logo.png" alt="Wat Logo" class="h-16 w-16 object-contain drop-shadow">
                            <div>
                                <h3 class="font-moul text-sm sm:text-base text-red-950">ព្រះរាជាណាចក្រកម្ពុជា</h3>
                                <h4 class="font-moul text-xs sm:text-sm text-red-900">ជាតិ សាសនា ព្រះមហាក្សត្រ</h4>
                                <div class="text-amber-600 text-xs">☸ ☸ ☸</div>
                            </div>
                        </div>

                        <div class="pt-2 space-y-1">
                            <h2 class="font-moul text-base sm:text-xl text-red-950">
                                ពុទ្ធិកបឋមសិក្សា វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)
                            </h2>
                            <p class="text-xs text-gray-600">សង្កាត់ចោមចៅ២ ខណ្ឌពោធិ៍សែនជ័យ រាជធានីភ្នំពេញ</p>
                            <div class="inline-block bg-gradient-to-r from-red-900 to-amber-900 text-amber-200 px-6 py-1.5 rounded-full font-moul text-xs sm:text-sm shadow mt-2">
                                ព្រឹត្តិបត្រពិន្ទុ និងចំណាត់ថ្នាក់ប្រឡង
                            </div>
                        </div>
                    </div>

                    <!-- Student Information Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 bg-amber-50/70 p-5 rounded-2xl border border-amber-200 text-xs">
                        <div>
                            <span class="text-gray-500">អត្តលេខសមណសិស្ស៖</span>
                            <div class="font-bold font-mono text-red-950 text-sm mt-0.5">{{ $selectedResult->student_id }}</div>
                        </div>
                        <div>
                            <span class="text-gray-500">នាម និងគោត្តនាម៖</span>
                            <div class="font-moul text-red-950 text-sm mt-0.5">{{ $selectedResult->student_name }}</div>
                        </div>
                        <div>
                            <span class="text-gray-500">ឆាយា / នាមបញ្ញត្តិ៖</span>
                            <div class="font-bold text-amber-900 text-sm mt-0.5">{{ $selectedResult->dharma_name ?? '—' }}</div>
                        </div>
                        <div>
                            <span class="text-gray-500">កម្រិតថ្នាក់៖</span>
                            <div class="font-bold text-gray-800 mt-0.5">{{ $selectedResult->grade_level_kh }}</div>
                        </div>
                        <div>
                            <span class="text-gray-500">សម័យប្រឡង៖</span>
                            <div class="font-bold text-gray-800 mt-0.5">{{ $selectedResult->exam_type }} ({{ $selectedResult->academic_year }})</div>
                        </div>
                        <div>
                            <span class="text-gray-500">កាលបរិច្ឆេទចេញលទ្ធផល៖</span>
                            <div class="font-bold text-gray-800 mt-0.5">{{ date('d/m/Y') }}</div>
                        </div>
                    </div>

                    <!-- Score Table -->
                    <div class="overflow-x-auto rounded-2xl border border-amber-200 shadow-sm">
                        <table class="w-full text-xs text-left">
                            <thead class="bg-red-950 text-amber-300 font-bold uppercase text-[11px]">
                                <tr>
                                    <th class="py-3 px-4 w-12 text-center">ល.រ</th>
                                    <th class="py-3 px-4">មុខវិជ្ជាប្រឡង (Subjects)</th>
                                    <th class="py-3 px-4 text-center">ពិន្ទុពេញ</th>
                                    <th class="py-3 px-4 text-center">ពិន្ទុទទួលបាន</th>
                                    <th class="py-3 px-4 text-center">ភាគរយ</th>
                                    <th class="py-3 px-4">ការវាយតម្លៃរបស់សមណគ្រូ</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @if($selectedResult->scores && is_array($selectedResult->scores))
                                    @foreach($selectedResult->scores as $idx => $s)
                                        <tr class="hover:bg-amber-50/40 transition">
                                            <td class="py-3 px-4 text-center font-bold text-gray-500">{{ $idx + 1 }}</td>
                                            <td class="py-3 px-4 font-bold text-gray-900">
                                                <i class="fa-solid fa-book-open text-amber-600 mr-1.5 text-[10px]"></i>
                                                {{ $s['subject'] ?? '' }}
                                            </td>
                                            <td class="py-3 px-4 text-center font-mono text-gray-600">{{ $s['max_score'] ?? 100 }}</td>
                                            <td class="py-3 px-4 text-center font-mono font-bold text-red-950 text-sm">
                                                {{ $s['score'] ?? 0 }}
                                            </td>
                                            <td class="py-3 px-4 text-center font-mono text-amber-800 font-semibold">
                                                {{ round((($s['score'] ?? 0) / ($s['max_score'] ?? 100)) * 100, 1) }}%
                                            </td>
                                            <td class="py-3 px-4 text-gray-600 italic">
                                                {{ $s['teacher_notes'] ?? '—' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- Performance Summary Box -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="bg-amber-50 p-4 rounded-2xl border border-amber-200 text-center">
                            <span class="text-[11px] text-gray-600 font-semibold block">ពិន្ទុសរុប</span>
                            <span class="text-xl font-bold font-mono text-red-950 mt-1 block">
                                {{ $selectedResult->total_score }} <span class="text-xs font-normal text-gray-500">/ {{ $selectedResult->max_total }}</span>
                            </span>
                        </div>

                        <div class="bg-amber-50 p-4 rounded-2xl border border-amber-200 text-center">
                            <span class="text-[11px] text-gray-600 font-semibold block">មធ្យមភាគ</span>
                            <span class="text-xl font-bold font-mono text-amber-900 mt-1 block">
                                {{ number_format($selectedResult->average, 2) }}%
                            </span>
                        </div>

                        <div class="bg-amber-100/70 p-4 rounded-2xl border border-amber-300 text-center">
                            <span class="text-[11px] text-amber-900 font-bold block">ចំណាត់ថ្នាក់ប្រចាំថ្នាក់</span>
                            <span class="text-2xl font-bold font-mono text-red-900 mt-0.5 block flex items-center justify-center gap-1">
                                @if($selectedResult->rank == 1)
                                    <i class="fa-solid fa-crown text-amber-500 text-base"></i>
                                @endif
                                លេខ {{ $selectedResult->rank }}
                            </span>
                        </div>

                        <div class="bg-gradient-to-br from-red-900 to-amber-900 text-white p-4 rounded-2xl text-center shadow">
                            <span class="text-[11px] text-amber-200 font-semibold block">និទ្ទេស & លទ្ធផល</span>
                            <span class="text-base font-bold font-moul mt-1 block text-amber-300">
                                {{ $selectedResult->grade_mention }}
                            </span>
                            <span class="text-[10px] bg-amber-400 text-red-950 font-bold px-2 py-0.5 rounded-full inline-block mt-1">
                                {{ $selectedResult->status }}
                            </span>
                        </div>
                    </div>

                    <!-- Evaluation Remarks & Signatures -->
                    <div class="pt-4 border-t border-amber-200 grid grid-cols-1 md:grid-cols-2 gap-8 items-end">
                        <div class="space-y-2 text-xs">
                            <h4 class="font-bold text-gray-900 flex items-center gap-1.5">
                                <i class="fa-solid fa-quote-left text-amber-600"></i> សេចក្តីសង្កេត និងការវាយតម្លៃរួម៖
                            </h4>
                            <p class="text-gray-700 bg-gray-50 p-3.5 rounded-xl border border-gray-200 leading-relaxed italic">
                                "{{ $selectedResult->remarks ?? 'សមណសិស្សមានការខិតខំប្រឹងប្រែងរៀនសូត្រ និងគោរពវិន័យសាលាបានល្អប្រសើរ។' }}"
                            </p>
                        </div>

                        <!-- Signatures & Stamp -->
                        <div class="grid grid-cols-2 gap-4 text-center text-xs">
                            <div class="space-y-10">
                                <p class="font-semibold text-gray-700">សមណគ្រូទទួលបន្ទុកថ្នាក់</p>
                                <div class="font-moul text-xs text-red-950">ព្រះមហា សុវណ្ណជោតិ</div>
                            </div>
                            <div class="space-y-10">
                                <div>
                                    <p class="text-[10px] text-gray-500">រាជធានីភ្នំពេញ, ថ្ងៃទី{{ date('d') }} ខែ{{ date('m') }} ឆ្នាំ{{ date('Y') }}</p>
                                    <p class="font-bold text-red-950 font-moul text-[11px] mt-1">ព្រះចៅអធិការ / នាយកសាលា</p>
                                </div>
                                <div class="font-moul text-xs text-red-950">ព្រះមហា ញាណរង្សី ម៉ៅ សំអុល</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    @elseif(!empty($search) || $grade !== 'all')
        <!-- Multiple Results or No Match List -->
        @if($results->count() > 0)
            <div class="space-y-4">
                <div class="flex items-center justify-between pb-2 border-b border-gray-200">
                    <h3 class="font-moul text-sm sm:text-base text-red-950">
                        លទ្ធផលស្វែងរក (រកឃើញ {{ $results->count() }} នាក់)
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($results as $res)
                        <div class="bg-white rounded-2xl p-5 shadow-md border border-amber-200 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-xs font-bold bg-amber-100 text-amber-900 px-2.5 py-1 rounded-lg border border-amber-200">
                                        {{ $res->student_id }}
                                    </span>
                                    <span class="text-xs font-bold bg-red-900 text-amber-300 px-2.5 py-0.5 rounded-full">
                                        ចំណាត់ថ្នាក់លេខ {{ $res->rank }}
                                    </span>
                                </div>

                                <div>
                                    <h4 class="font-moul text-sm text-red-950 group-hover:text-amber-800 transition">
                                        {{ $res->student_name }}
                                    </h4>
                                    @if($res->dharma_name)
                                        <p class="text-xs text-amber-800 font-semibold mt-0.5">({{ $res->dharma_name }})</p>
                                    @endif
                                </div>

                                <div class="bg-gray-50 p-3 rounded-xl space-y-1.5 text-xs text-gray-700">
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">កម្រិតថ្នាក់៖</span>
                                        <span class="font-semibold">{{ $res->grade_level_kh }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">ពិន្ទុសរុប៖</span>
                                        <span class="font-mono font-bold text-red-900">{{ $res->total_score }} / {{ $res->max_total }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">មធ្យមភាគ៖</span>
                                        <span class="font-mono font-bold text-amber-800">{{ number_format($res->average, 2) }}%</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-500">និទ្ទេស៖</span>
                                        <span class="font-bold text-green-700">{{ $res->grade_mention }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4 mt-3 border-t border-gray-100 flex items-center justify-between">
                                <span class="text-xs font-semibold text-green-600 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-check"></i> {{ $res->status }}
                                </span>
                                <a href="{{ route('school.results', ['view_id' => $res->id, 'search' => $search, 'grade' => $grade]) }}" 
                                   class="bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold px-3.5 py-2 rounded-xl transition flex items-center gap-1">
                                    មើលព្រឹត្តិបត្រពិន្ទុ <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-3xl border border-amber-200 p-8 space-y-4">
                <i class="fa-solid fa-user-xmark text-5xl text-gray-300"></i>
                <h3 class="font-moul text-base text-gray-700">រកមិនឃើញទិន្នន័យសមណសិស្សទេ</h3>
                <p class="text-xs text-gray-500 max-w-md mx-auto">
                    សូមពិនិត្យមើល អត្តលេខ ឬ ឈ្មោះសមណសិស្សឡើងវិញ ឱ្យបានត្រឹមត្រូវ ឬជ្រើសរើសកម្រិតថ្នាក់ដែលសមណសិស្សកំពុងសិក្សា។
                </p>
                <a href="{{ route('school.results') }}" class="inline-block bg-amber-100 hover:bg-amber-200 text-red-950 text-xs font-bold px-5 py-2.5 rounded-xl transition">
                    សម្អាតការស្វែងរក
                </a>
            </div>
        @endif
    @else
        <!-- Information Landing Guide -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-amber-100 space-y-3">
                <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center text-lg font-bold">
                    <i class="fa-solid fa-id-card"></i>
                </div>
                <h3 class="font-moul text-sm text-red-950">១. ស្វែងរកតាមអត្តលេខ</h3>
                <p class="text-xs text-gray-600 leading-relaxed">
                    បញ្ចូលលេខកូដសម្គាល់សមណសិស្សដូចជា PSD-2026-001 ដើម្បីពិនិត្យលទ្ធផលផ្ទាល់ខ្លួនយ៉ាងរហ័ស។
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-amber-100 space-y-3">
                <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center text-lg font-bold">
                    <i class="fa-solid fa-file-invoice"></i>
                </div>
                <h3 class="font-moul text-sm text-red-950">២. ព្រឹត្តិបត្រពិន្ទុផ្លូវការ</h3>
                <p class="text-xs text-gray-600 leading-relaxed">
                    ប្រព័ន្ធនឹងបង្ហាញតារាងពិន្ទុលម្អិតគ្រប់មុខវិជ្ជា ចំណាត់ថ្នាក់ និងនិទ្ទេសប្រឡងប្រចាំឆមាស។
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-amber-100 space-y-3">
                <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center text-lg font-bold">
                    <i class="fa-solid fa-print"></i>
                </div>
                <h3 class="font-moul text-sm text-red-950">៣. បោះពុម្ព & រក្សាទុក</h3>
                <p class="text-xs text-gray-600 leading-relaxed">
                    អាចបោះពុម្ពជាក្រដាស A4 ឬទាញយករូបភាពព្រឹត្តិបត្រពិន្ទុទុកជាឯកសារផ្លូវការបានយ៉ាងងាយស្រួល។
                </p>
            </div>
        </div>
    @endif

</div>

<!-- HTML2Canvas for Downloading Slip Image -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
function downloadTranscriptImage() {
    const slipElement = document.getElementById('printable-slip');
    if (!slipElement) return;

    const originalShadow = slipElement.style.boxShadow;
    slipElement.style.boxShadow = 'none';

    html2canvas(slipElement, {
        scale: 2,
        useCORS: true,
        backgroundColor: '#ffffff',
    }).then(canvas => {
        slipElement.style.boxShadow = originalShadow;
        const link = document.createElement('a');
        link.download = 'ព្រឹត្តិបត្រពិន្ទុ_{{ $selectedResult ? $selectedResult->student_id : "exam" }}.png';
        link.href = canvas.toDataURL('image/png');
        link.click();
    });
}
</script>

@endsection
