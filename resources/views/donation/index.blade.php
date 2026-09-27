@extends('layouts.app')

@section('title', 'បុណ្យកុសល និងការបរិច្ចាគ - វត្តព្រៃស្ដី')

@section('content')

<!-- Header Banner -->
<div class="bg-gradient-to-r from-red-950 via-amber-900 to-amber-950 text-white py-12 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block bg-amber-500 text-red-950 font-bold text-xs px-3.5 py-1 rounded-full shadow">
            សទ្ធាជ្រះថ្លាក្នុងព្រះពុទ្ធសាសនា
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            បុណ្យកុសល និងការបរិច្ចាគ (Donations)
        </h1>
        <p class="text-amber-100/80 text-sm max-w-2xl mx-auto">
            ចូលរួមជាបច្ច័យកសាងទីអារាម និងទ្រទ្រង់អាហារូបករណ៍សមណសិស្សពុទ្ធិកបឋមសិក្សា
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-16">

    <!-- Active Projects to Support -->
    <div class="space-y-6">
        <div class="text-center max-w-2xl mx-auto">
            <span class="text-amber-700 font-bold text-xs uppercase tracking-wider">គម្រោងកំពុងដំណើរការ</span>
            <h2 class="font-moul text-xl sm:text-2xl text-red-950 mt-1">
                គម្រោងកសាង និងឧបត្ថម្ភ
            </h2>
            <p class="text-xs text-gray-500 mt-1">លោកអ្នកអាចជ្រើសរើសចូលរួមបច្ច័យតាមសទ្ធាជ្រះថ្លា</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
            @php
                $projectIcons = [
                    1 => ['icon' => 'fa-solid fa-place-of-worship', 'tag' => 'កសាងសមិទ្ធផល'],
                    2 => ['icon' => 'fa-solid fa-graduation-cap', 'tag' => 'ពុទ្ធិកអប់រំ'],
                    3 => ['icon' => 'fa-solid fa-bowl-rice', 'tag' => 'ចង្ហាន់ & គន្លងធម៌'],
                ];
            @endphp
            @foreach($projects as $p)
                @php
                    $meta = $projectIcons[$p['id']] ?? ['icon' => 'fa-solid fa-dharmachakra', 'tag' => 'បុណ្យកុសល'];
                @endphp
                <div class="bg-white rounded-3xl overflow-hidden shadow-lg border-2 border-amber-300/80 hover:border-amber-500 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between h-full group">
                    <div class="flex flex-col flex-grow">
                        <!-- Traditional Khmer Carved Plaque Header (អក្សរឆ្លាក់បែបសិលាចារឹក - កម្ពស់ស្មើគ្នា) -->
                        <div class="relative bg-gradient-to-br from-red-950 via-red-900 to-amber-950 p-6 text-center text-white border-b-4 border-amber-400 overflow-hidden min-h-[170px] sm:min-h-[185px] flex flex-col justify-between items-center">
                            <!-- Subtle Ornamental Pattern Backdrop -->
                            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f59e0b_1px,transparent_1px)] [background-size:12px_12px]"></div>
                            
                            <!-- Gold border frame / inner carved line -->
                            <div class="absolute inset-2 rounded-xl border border-amber-400/40 pointer-events-none"></div>

                            <div class="relative z-10 w-full flex flex-col justify-between items-center h-full space-y-2.5">
                                <div class="inline-flex items-center gap-1.5 bg-amber-400/20 text-amber-300 border border-amber-400/50 text-[10px] font-bold px-3 py-0.5 rounded-full uppercase tracking-wider backdrop-blur-sm">
                                    <i class="{{ $meta['icon'] }}"></i> {{ $meta['tag'] }}
                                </div>

                                <!-- Carved Khmer Heading (អក្សរឆ្លាក់មាស - កម្ពស់ស្មើគ្នា) -->
                                <div class="min-h-[48px] flex items-center justify-center px-1">
                                    <h3 class="font-moul text-sm sm:text-base text-amber-300 leading-snug drop-shadow-[0_2px_3px_rgba(0,0,0,0.9)] text-center">
                                        {{ $p['title'] }}
                                    </h3>
                                </div>

                                <!-- Carved Ornamental Divider -->
                                <div class="flex items-center justify-center gap-2 text-amber-400/70 pt-0.5 w-full">
                                    <span class="w-8 h-0.5 bg-gradient-to-r from-transparent to-amber-400"></span>
                                    <i class="fa-solid fa-dharmachakra text-xs text-amber-300"></i>
                                    <span class="w-8 h-0.5 bg-gradient-to-l from-transparent to-amber-400"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Body Details (កម្ពស់ស្មើគ្នា) -->
                        <div class="p-6 flex flex-col justify-between flex-grow space-y-5">
                            <div class="min-h-[60px] flex items-start">
                                <p class="text-xs sm:text-sm text-gray-700 leading-relaxed">
                                    {{ $p['description'] }}
                                </p>
                            </div>
                            
                            <!-- Progress Bar -->
                            <div class="space-y-2 bg-amber-50/60 p-4 rounded-2xl border border-amber-100 mt-auto">
                                <div class="flex justify-between text-xs font-semibold">
                                    <span class="text-red-950 font-bold">
                                        <i class="fa-solid fa-coins text-amber-600 mr-1"></i> ប្រមូលបាន៖ ${{ number_format($p['raised']) }}
                                    </span>
                                    <span class="text-gray-500">គោលដៅ៖ ${{ number_format($p['target']) }}</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden shadow-inner p-0.5 border border-amber-200">
                                    <div class="bg-gradient-to-r from-amber-500 via-amber-600 to-red-800 h-2 rounded-full transition-all duration-500 shadow" style="width: {{ $p['progress'] }}%"></div>
                                </div>
                                <div class="flex justify-between items-center text-[11px]">
                                    <span class="text-gray-500">វឌ្ឍនភាពបច្ចុប្បន្ន</span>
                                    <span class="font-bold text-amber-800 bg-amber-100 px-2 py-0.5 rounded-md">{{ $p['progress'] }}%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 pt-0">
                        <a href="#bank-transfer" class="block w-full text-center bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-red-950 font-bold text-xs sm:text-sm py-3 rounded-xl shadow-md hover:shadow-lg transition flex items-center justify-center gap-1.5 border border-amber-400">
                            <i class="fa-solid fa-hand-holding-heart text-red-950"></i> ចូលរួមបច្ច័យតាមសទ្ធា
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bank Accounts & QR Codes -->
    <div id="bank-transfer" class="bg-amber-50/60 rounded-3xl p-8 sm:p-10 border border-amber-200 space-y-8">
        <div class="text-center max-w-2xl mx-auto">
            <span class="text-amber-800 font-bold text-xs uppercase tracking-wider">មធ្យោបាយបរិច្ចាគតាមធនាគារ</span>
            <h2 class="font-moul text-xl sm:text-2xl text-red-950 mt-1">
                គណនីធនាគារ និង KHQR កូដ
            </h2>
            <p class="text-xs text-gray-600 mt-1">លោកអ្នកអាចស្កេន KHQR តាមកម្មវិធី Mobile Banking គ្រប់ធនាគារ</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($bankAccounts as $acc)
                <div class="bg-white rounded-2xl p-6 shadow-md border border-amber-200 text-center space-y-4 hover:shadow-xl transition">
                    <span class="inline-block bg-red-900 text-amber-300 text-xs font-bold px-3 py-1 rounded-full">
                        {{ $acc['bank_name'] }}
                    </span>
                    
                    <div class="w-48 h-48 mx-auto bg-gray-50 rounded-2xl p-3 border-2 border-dashed border-amber-300 flex items-center justify-center shadow-inner">
                        <img src="{{ $acc['qr_code'] }}" alt="QR Code" class="w-full h-full object-contain rounded-lg">
                    </div>

                    <div class="space-y-1 text-xs">
                        <div class="text-gray-500">ឈ្មោះគណនី</div>
                        <div class="font-bold text-gray-900 text-sm tracking-wide">{{ $acc['account_name'] }}</div>
                        <div class="text-amber-800 font-mono font-bold text-sm bg-amber-50 py-1 px-2 rounded">{{ $acc['account_number'] }}</div>
                        <div class="text-gray-500 text-[11px]">រូបិយប័ណ្ណ៖ {{ $acc['currency'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Note & Contact for Receipt -->
        <div class="bg-white p-5 rounded-2xl border border-amber-200 text-center text-xs text-gray-600 max-w-2xl mx-auto space-y-1.5">
            <p class="font-bold text-red-950">
                <i class="fa-solid fa-bell text-amber-600 mr-1"></i> បន្ទាប់ពីផ្ទេរបច្ច័យរួច៖
            </p>
            <p>
                សូមមេត្តាផ្ញើវិក្កយបត្រ ឬបង្កាន់ដៃផ្ទេរប្រាក់មកកាន់ Telegram: <strong>012 345 678</strong> ដើម្បីឱ្យគណៈកម្មការវត្តរៀបចំចាត់ចែងតាមបំណងប្រាថ្នារបស់លោកអ្នក។
            </p>
        </div>
    </div>

    <!-- Automatic E-Certificate / Anumodhana Generator -->
    <div id="e-certificate-generator" class="bg-gradient-to-br from-red-950 via-red-900 to-amber-950 text-white rounded-3xl p-8 sm:p-12 shadow-2xl border-4 border-amber-500/40 relative overflow-hidden">
        <div class="absolute right-0 bottom-0 opacity-10 text-9xl pointer-events-none">
            <i class="fa-solid fa-certificate"></i>
        </div>

        <div class="max-w-3xl mx-auto relative z-10 space-y-8">
            <div class="text-center space-y-2">
                <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-400/30 text-xs px-3.5 py-1 rounded-full font-semibold">
                    <i class="fa-solid fa-award mr-1"></i> ប្រព័ន្ធស្វ័យប្រវត្តិ
                </span>
                <h2 class="font-moul text-xl sm:text-3xl text-amber-300">
                    បង្កើតប័ណ្ណថ្លែងអំណរគុណ និងអនុមោទនាបុណ្យ (E-Certificate)
                </h2>
                <p class="text-amber-100/80 text-xs sm:text-sm font-light">
                    បន្ទាប់ពីលោកអ្នកបានបរិច្ចាគបច្ច័យរួច សូមបំពេញព័ត៌មានខាងក្រោម ដើម្បីទទួលបាន **វិញ្ញាបនបត្រថ្លែងអំណរគុណផ្លូវការ** ដែលមានត្រាវត្ត និងពុទ្ធពរទាំង៤ប្រការ សម្រាប់បោះពុម្ព ឬរក្សាទុកជារូបភាពអនុស្សាវរីយ៍។
                </p>
            </div>

            <!-- Form -->
            <form action="{{ route('donation.certificate.generate') }}" method="POST" target="_blank" class="bg-white/10 backdrop-blur-md rounded-2xl p-6 sm:p-8 border border-white/15 space-y-5 text-gray-800">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
                    
                    <!-- Donor Title -->
                    <div class="sm:col-span-4 space-y-1.5 text-left">
                        <label class="block text-xs font-semibold text-amber-200">
                            គោរមងារ / ងារសទ្ធា
                        </label>
                        <select name="donor_title" class="w-full bg-white border border-amber-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                            <option value="ឧបាសក">ឧបាសក (បុរស)</option>
                            <option value="ឧបាសិកា">ឧបាសិកា (ស្ត្រី)</option>
                            <option value="សប្បុរសជន">សប្បុរសជន</option>
                            <option value="ពុទ្ធបរិស័ទ">ពុទ្ធបរិស័ទ</option>
                            <option value="ក្រុមគ្រួសារ">ក្រុមគ្រួសារ</option>
                            <option value="ក្រុមហ៊ុន / ស្ថាប័ន">ក្រុមហ៊ុន / ស្ថាប័ន</option>
                        </select>
                    </div>

                    <!-- Donor Name -->
                    <div class="sm:col-span-8 space-y-1.5 text-left">
                        <label class="block text-xs font-semibold text-amber-200">
                            ឈ្មោះសប្បុរសជន / ម្ចាស់ទាន <span class="text-red-400">*</span>
                        </label>
                        <input type="text" name="donor_name" required placeholder="ឧ. លោក សុខ ចាន់ដារ៉ា និងភរិយា ព្រមទាំងបុត្រ" class="w-full bg-white border border-amber-200 rounded-xl px-4 py-2.5 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>

                    <!-- Amount -->
                    <div class="sm:col-span-6 space-y-1.5 text-left">
                        <label class="block text-xs font-semibold text-amber-200">
                            ចំនួនបច្ច័យបរិច្ចាគ <span class="text-red-400">*</span>
                        </label>
                        <input type="text" name="amount" required placeholder="ឧ. 100 ឬ 400,000" class="w-full bg-white border border-amber-200 rounded-xl px-4 py-2.5 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 font-mono">
                    </div>

                    <!-- Currency -->
                    <div class="sm:col-span-6 space-y-1.5 text-left">
                        <label class="block text-xs font-semibold text-amber-200">
                            រូបិយប័ណ្ណ
                        </label>
                        <select name="currency" class="w-full bg-white border border-amber-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                            <option value="USD">ដុល្លារអាមេរិក ($ USD)</option>
                            <option value="KHR">ប្រាក់រៀល (៛ KHR)</option>
                        </select>
                    </div>

                    <!-- Purpose -->
                    <div class="sm:col-span-12 space-y-1.5 text-left">
                        <label class="block text-xs font-semibold text-amber-200">
                            គោលបំណងនៃការចូលរួមបុណ្យ
                        </label>
                        <select name="purpose" class="w-full bg-white border border-amber-200 rounded-xl px-3.5 py-2.5 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-amber-500">
                            <option value="ចូលរួមកសាងសាលាឆាន់ និងកុដិស្នាក់នៅវត្តព្រៃស្ដី">ចូលរួមកសាងសាលាឆាន់ និងកុដិស្នាក់នៅវត្តព្រៃស្ដី</option>
                            <option value="ឧបត្ថម្ភអាហារូបករណ៍ និងសម្ភារសិក្សាសមណសិស្សពុទ្ធិកបឋមសិក្សា">ឧបត្ថម្ភអាហារូបករណ៍ និងសម្ភារសិក្សាសមណសិស្សពុទ្ធិកបឋមសិក្សា</option>
                            <option value="ចង្ហាន់ប្រចាំថ្ងៃ និងទ្រទ្រង់ទឹកភ្លើងវត្តអារាម">ចង្ហាន់ប្រចាំថ្ងៃ និងទ្រទ្រង់ទឹកភ្លើងវត្តអារាម</option>
                            <option value="ចូលរួមបុណ្យកុសលទូទៅក្នុងវត្តធនរតនេសោភណារាម">ចូលរួមបុណ្យកុសលទូទៅក្នុងវត្តធនរតនេសោភណារាម</option>
                        </select>
                    </div>

                </div>

                <div class="pt-2 text-center">
                    <button type="submit" class="w-full sm:w-auto bg-gradient-to-r from-amber-500 via-amber-400 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-red-950 font-bold px-8 py-3.5 rounded-xl shadow-xl hover:shadow-2xl transition duration-200 text-sm flex items-center justify-center gap-2 mx-auto">
                        <i class="fa-solid fa-file-certificate text-lg"></i> បង្កើត និងទាញយកប័ណ្ណថ្លែងអំណរគុណ (Generate E-Certificate)
                    </button>
                    <p class="text-[11px] text-amber-200/60 mt-2">
                        * ប័ណ្ណថ្លែងអំណរគុណនឹងបើកក្នុងផ្ទាំងថ្មី អាច Print ឬ Save ជារូបភាពបានភ្លាមៗ
                    </p>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
