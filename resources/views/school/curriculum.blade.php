@extends('layouts.app')

@section('title', 'កម្មវិធីសិក្សា - ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី')

@section('content')

<!-- Header Banner -->
<div class="bg-gradient-to-r from-red-950 via-amber-900 to-amber-950 text-white py-12 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-400/30 text-xs px-3 py-1 rounded-full font-semibold">
            ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            កម្មវិធីសិក្សា ថ្នាក់ត្រី ថ្នាក់ទោ ថ្នាក់ឯ
        </h1>
        <p class="text-amber-100/80 text-sm max-w-2xl mx-auto">
            រចនាសម្ព័ន្ធមុខវិជ្ជាពុទ្ធសាសនា ភាសាបាលី និងចំណេះទូទៅ តាមស្ដង់ដារនៃអគ្គាធិការដ្ឋានពុទ្ធិកសិក្សាជាតិ
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12">

    <!-- Class Tabs & Details -->
    <div class="space-y-10">
        @foreach($classes as $c)
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-md border border-amber-200">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-gray-100">
                    <div>
                        <span class="bg-amber-100 text-amber-900 text-xs font-bold px-3 py-1 rounded-full uppercase">
                            កម្រិត {{ $c->grade_level == 'tri' ? 'ថ្នាក់ត្រី' : ($c->grade_level == 'tho' ? 'ថ្នាក់ទោ' : 'ថ្នាក់ឯ') }}
                        </span>
                        <h2 class="font-moul text-xl text-red-950 mt-2">{{ $c->name_kh }}</h2>
                        <p class="text-xs text-gray-500">{{ $c->name_en }}</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-3 text-xs">
                        <div class="bg-amber-50 border border-amber-200 px-3 py-2 rounded-xl text-amber-900 font-semibold">
                            <i class="fa-solid fa-users text-amber-600 mr-1"></i> {{ $c->student_count }} សមណសិស្ស
                        </div>
                        <div class="bg-amber-50 border border-amber-200 px-3 py-2 rounded-xl text-amber-900 font-semibold">
                            <i class="fa-solid fa-chalkboard-user text-amber-600 mr-1"></i> គ្រូទទួលបន្ទុក៖ {{ $c->teacher_in_charge }}
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 pt-6">
                    <div class="lg:col-span-6 space-y-4">
                        <h3 class="font-bold text-gray-900 text-sm flex items-center gap-2">
                            <i class="fa-solid fa-circle-info text-amber-600"></i> ការពិពណ៌នាអំពីកម្រិតថ្នាក់
                        </h3>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            {{ $c->description }}
                        </p>

                        <div class="bg-amber-50/50 p-4 rounded-xl border border-amber-100 text-xs text-gray-700 space-y-2">
                            <div><i class="fa-regular fa-clock text-amber-600 mr-1.5"></i> <strong>កាលវិភាគសិក្សា៖</strong> {{ $c->schedule_summary }}</div>
                            <div><i class="fa-solid fa-cake-candles text-amber-600 mr-1.5"></i> <strong>អាយុដែលត្រូវចូលរៀន៖</strong> {{ $c->age_range }}</div>
                        </div>
                    </div>

                    <div class="lg:col-span-6 space-y-4">
                        <h3 class="font-bold text-gray-900 text-sm flex items-center gap-2">
                            <i class="fa-solid fa-book-bookmark text-amber-600"></i> បញ្ជីមុខវិជ្ជាសិក្សា
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            @if($c->subjects)
                                @foreach($c->subjects as $sub)
                                    <div class="bg-gray-50 hover:bg-amber-50 border border-gray-200 hover:border-amber-300 p-3 rounded-xl text-xs font-medium text-gray-800 flex items-center gap-2 transition">
                                        <i class="fa-solid fa-check-circle text-amber-600 text-sm"></i>
                                        <span>{{ $sub }}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Daily Routine Schedule Table -->
    <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-md border border-amber-100">
        <h3 class="font-moul text-lg text-red-950 mb-4 text-center">កាលវិភាគសកម្មភាពប្រចាំថ្ងៃរបស់សមណសិស្ស</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left text-gray-700">
                <thead class="bg-red-950 text-amber-300 font-bold uppercase text-[11px]">
                    <tr>
                        <th class="py-3 px-4 rounded-l-xl">ពេលវេលា</th>
                        <th class="py-3 px-4">សកម្មភាព / កិច្ចការ</th>
                        <th class="py-3 px-4 rounded-r-xl">ទីកន្លែង</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-amber-50/50">
                        <td class="py-3 px-4 font-semibold text-amber-900">៤:៣០ - ៥:៣០ ព្រឹក</td>
                        <td class="py-3 px-4">ក្រោកពីដំណេក សម្អាតកាយ នមស្សការព្រះ និងចម្រើនសមាធិ</td>
                        <td class="py-3 px-4">ព្រះវិហារ និងកុដិ</td>
                    </tr>
                    <tr class="hover:bg-amber-50/50">
                        <td class="py-3 px-4 font-semibold text-amber-900">៦:០០ - ៦:៤៥ ព្រឹក</td>
                        <td class="py-3 px-4">ពិធីបិណ្ឌបាត និងឆាន់ចង្ហាន់ពេលព្រឹក</td>
                        <td class="py-3 px-4">សាលាឆាន់</td>
                    </tr>
                    <tr class="hover:bg-amber-50/50">
                        <td class="py-3 px-4 font-semibold text-amber-900">៧:០០ - ១១:០០ ព្រឹក</td>
                        <td class="py-3 px-4">ចូលរៀនវេនព្រឹក (ភាសាបាលី វិន័យបិដក និងធម្មវិភាគ)</td>
                        <td class="py-3 px-4">អគារសាលារៀន</td>
                    </tr>
                    <tr class="hover:bg-amber-50/50">
                        <td class="py-3 px-4 font-semibold text-amber-900">១១:១៥ - ១២:០០ ថ្ងៃត្រង់</td>
                        <td class="py-3 px-4">ឆាន់ចង្ហាន់ថ្ងៃត្រង់ និងសម្រាកបន្តិច</td>
                        <td class="py-3 px-4">សាលាឆាន់</td>
                    </tr>
                    <tr class="hover:bg-amber-50/50">
                        <td class="py-3 px-4 font-semibold text-amber-900">១:០០ - ៤:៣០ រសៀល</td>
                        <td class="py-3 px-4">ចូលរៀនវេនរសៀល (ភាសាខ្មែរ គណិតវិទ្យា ភាសាអង់គ្លេស និងកុំព្យូទ័រ)</td>
                        <td class="py-3 px-4">អគារសាលារៀន</td>
                    </tr>
                    <tr class="hover:bg-amber-50/50">
                        <td class="py-3 px-4 font-semibold text-amber-900">៥:០០ - ៦:០០ ល្ងាច</td>
                        <td class="py-3 px-4">បោសសម្អាតទីធ្លាវត្តអារាម និងស្រោចផ្កា</td>
                        <td class="py-3 px-4">បរិវេណវត្ត</td>
                    </tr>
                    <tr class="hover:bg-amber-50/50">
                        <td class="py-3 px-4 font-semibold text-amber-900">៦:៣០ - ៨:៣០ យប់</td>
                        <td class="py-3 px-4">ស្វាធ្យាយធម៌ថ្វាយបង្គំព្រះ និងរំលឹកមេរៀនដោយស្វ័យសិក្សា</td>
                        <td class="py-3 px-4">ព្រះវិហារ និងបណ្ណាល័យ</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
