<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ព្រឹត្តិបត្រពិន្ទុ - {{ $result->student_name }} ({{ $result->student_id }})</title>
    
    <!-- Google Fonts: Moul, Siemreap, Kantumruy Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@300;400;500;600;700&family=Moul&family=Siemreap&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @media print {
            body {
                background: white !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            .no-print {
                display: none !important;
            }
            .print-card {
                border: 2px solid #b45309 !important;
                box-shadow: none !important;
                width: 100% !important;
                margin: 0 !important;
            }
        }
    </style>
</head>
<body class="bg-gray-100 font-sans p-4 sm:p-8 flex flex-col items-center justify-center min-h-screen text-gray-900">

    <!-- Action Bar -->
    <div class="no-print w-full max-w-3xl mb-4 flex justify-between items-center bg-white p-4 rounded-2xl shadow-md border border-amber-200">
        <a href="{{ route('school.results', ['search' => $result->student_id]) }}" class="text-xs font-semibold text-gray-700 hover:text-red-900 flex items-center gap-1">
            <i class="fa-solid fa-arrow-left"></i> ត្រឡប់ក្រោយ
        </a>
        <div class="flex gap-2">
            <button onclick="window.print()" class="bg-red-900 hover:bg-red-950 text-white text-xs font-bold px-4 py-2 rounded-xl transition flex items-center gap-1.5 shadow">
                <i class="fa-solid fa-print"></i> បោះពុម្ព (Print A4)
            </button>
        </div>
    </div>

    <!-- Official Slip Card -->
    <div class="print-card w-full max-w-3xl bg-white rounded-3xl p-8 sm:p-12 shadow-2xl border-4 border-amber-400 relative overflow-hidden bg-[radial-gradient(#fbf7ee_1px,transparent_1px)] [background-size:16px_16px]">
        
        <!-- Watermark -->
        <div class="absolute inset-0 flex items-center justify-center opacity-5 pointer-events-none">
            <img src="/images/wat-logo.png" alt="Seal" class="w-80 h-80 object-contain">
        </div>

        <div class="relative z-10 space-y-6">
            
            <!-- Header -->
            <div class="text-center space-y-1.5 border-b-2 border-amber-200 pb-5">
                <div class="flex items-center justify-center gap-3 mb-1">
                    <img src="/images/wat-logo.png" alt="Wat Logo" class="h-14 w-14 object-contain">
                    <div>
                        <h3 class="font-moul text-sm text-red-950">ព្រះរាជាណាចក្រកម្ពុជា</h3>
                        <h4 class="font-moul text-xs text-red-900">ជាតិ សាសនា ព្រះមហាក្សត្រ</h4>
                        <div class="text-amber-600 text-[10px]">☸ ☸ ☸</div>
                    </div>
                </div>

                <h2 class="font-moul text-base text-red-950">
                    ពុទ្ធិកបឋមសិក្សា វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)
                </h2>
                <p class="text-[11px] text-gray-500">សង្កាត់ចោមចៅ២ ខណ្ឌពោធិ៍សែនជ័យ រាជធានីភ្នំពេញ</p>
                <div class="inline-block bg-red-900 text-amber-300 px-5 py-1 rounded-full font-moul text-xs shadow mt-1">
                    ព្រឹត្តិបត្រពិន្ទុ និងចំណាត់ថ្នាក់ប្រឡង
                </div>
            </div>

            <!-- Student Info -->
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 bg-amber-50/70 p-4 rounded-xl border border-amber-200 text-xs">
                <div>
                    <span class="text-gray-500">អត្តលេខ៖</span>
                    <div class="font-bold font-mono text-red-950 text-sm">{{ $result->student_id }}</div>
                </div>
                <div>
                    <span class="text-gray-500">ឈ្មោះសមណសិស្ស៖</span>
                    <div class="font-moul text-red-950 text-sm">{{ $result->student_name }}</div>
                </div>
                <div>
                    <span class="text-gray-500">ឆាយា / នាមបញ្ញត្តិ៖</span>
                    <div class="font-bold text-amber-900 text-sm">{{ $result->dharma_name ?? '—' }}</div>
                </div>
                <div>
                    <span class="text-gray-500">កម្រិតថ្នាក់៖</span>
                    <div class="font-bold text-gray-800">{{ $result->grade_level_kh }}</div>
                </div>
                <div>
                    <span class="text-gray-500">សម័យប្រឡង៖</span>
                    <div class="font-bold text-gray-800">{{ $result->exam_type }} ({{ $result->academic_year }})</div>
                </div>
                <div>
                    <span class="text-gray-500">កាលបរិច្ឆេទ៖</span>
                    <div class="font-bold text-gray-800">{{ date('d/m/Y') }}</div>
                </div>
            </div>

            <!-- Score Table -->
            <div class="overflow-x-auto rounded-xl border border-amber-200">
                <table class="w-full text-xs text-left">
                    <thead class="bg-red-950 text-amber-300 font-bold uppercase text-[10px]">
                        <tr>
                            <th class="py-2.5 px-3 w-10 text-center">ល.រ</th>
                            <th class="py-2.5 px-3">មុខវិជ្ជាប្រឡង</th>
                            <th class="py-2.5 px-3 text-center">ពិន្ទុពេញ</th>
                            <th class="py-2.5 px-3 text-center">ពិន្ទុទទួលបាន</th>
                            <th class="py-2.5 px-3 text-center">ភាគរយ</th>
                            <th class="py-2.5 px-3">ការវាយតម្លៃ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                        @if($result->scores && is_array($result->scores))
                            @foreach($result->scores as $idx => $s)
                                <tr>
                                    <td class="py-2 px-3 text-center font-bold text-gray-500">{{ $idx + 1 }}</td>
                                    <td class="py-2 px-3 font-bold text-gray-900">{{ $s['subject'] ?? '' }}</td>
                                    <td class="py-2 px-3 text-center font-mono">{{ $s['max_score'] ?? 100 }}</td>
                                    <td class="py-2 px-3 text-center font-mono font-bold text-red-950">{{ $s['score'] ?? 0 }}</td>
                                    <td class="py-2 px-3 text-center font-mono text-amber-800">{{ round((($s['score'] ?? 0) / ($s['max_score'] ?? 100)) * 100, 1) }}%</td>
                                    <td class="py-2 px-3 text-gray-600 italic text-[11px]">{{ $s['teacher_notes'] ?? '—' }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Summary -->
            <div class="grid grid-cols-4 gap-3 text-center text-xs">
                <div class="bg-amber-50 p-2.5 rounded-xl border border-amber-200">
                    <span class="text-gray-500 block text-[10px]">ពិន្ទុសរុប</span>
                    <span class="font-mono font-bold text-red-950 text-base">{{ $result->total_score }}/{{ $result->max_total }}</span>
                </div>
                <div class="bg-amber-50 p-2.5 rounded-xl border border-amber-200">
                    <span class="text-gray-500 block text-[10px]">មធ្យមភាគ</span>
                    <span class="font-mono font-bold text-amber-900 text-base">{{ number_format($result->average, 2) }}%</span>
                </div>
                <div class="bg-amber-100 p-2.5 rounded-xl border border-amber-300">
                    <span class="text-amber-900 font-bold block text-[10px]">ចំណាត់ថ្នាក់</span>
                    <span class="font-mono font-bold text-red-900 text-base">លេខ {{ $result->rank }}</span>
                </div>
                <div class="bg-red-900 text-white p-2.5 rounded-xl">
                    <span class="text-amber-200 block text-[10px]">និទ្ទេស</span>
                    <span class="font-moul text-amber-300 text-xs">{{ $result->grade_mention }}</span>
                </div>
            </div>

            <!-- Remarks & Signatures -->
            <div class="pt-4 border-t border-amber-200 grid grid-cols-2 gap-6 items-end text-xs">
                <div class="space-y-1">
                    <span class="font-bold text-gray-800 text-[11px]">ការវាយតម្លៃរួម៖</span>
                    <p class="text-gray-600 italic text-[11px]">{{ $result->remarks }}</p>
                </div>

                <div class="grid grid-cols-2 gap-2 text-center">
                    <div class="space-y-8">
                        <p class="font-semibold text-gray-700 text-[11px]">សមណគ្រូបន្ទុកថ្នាក់</p>
                        <div class="font-moul text-[10px] text-red-950">ព្រះមហា សុវណ្ណជោតិ</div>
                    </div>
                    <div class="space-y-8">
                        <div>
                            <p class="text-[9px] text-gray-500">ថ្ងៃទី{{ date('d/m/Y') }}</p>
                            <p class="font-bold text-red-950 font-moul text-[10px]">នាយកសាលា</p>
                        </div>
                        <div class="font-moul text-[10px] text-red-950">ព្រះមហា ញាណរង្សី</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
