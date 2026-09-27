@extends('layouts.app')

@section('title', 'ពាក្យចុះឈ្មោះចូលរៀន - ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី')

@section('content')

<!-- Header Banner -->
<div class="bg-gradient-to-r from-red-950 via-amber-900 to-amber-950 text-white py-12 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block bg-amber-500 text-red-950 font-bold text-xs px-3.5 py-1 rounded-full shadow">
            ឆ្នាំសិក្សាថ្មី
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            ការចុះឈ្មោះចូលរៀន ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី
        </h1>
        <p class="text-amber-100/80 text-sm max-w-2xl mx-auto">
            សូមបំពេញទម្រង់ពាក្យសុំខាងក្រោម ដើម្បីចុះឈ្មោះចូលរៀនថ្នាក់ត្រី ថ្នាក់ទោ ឬថ្នាក់ឯ
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        <!-- Left Column: Information & Conditions -->
        <div class="lg:col-span-5 space-y-6">
            <div class="bg-white rounded-2xl p-6 shadow-md border border-amber-200">
                <h3 class="font-moul text-lg text-red-950 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-list-check text-amber-600"></i> លក្ខខណ្ឌនៃការសុំចូលរៀន
                </h3>
                <ul class="text-xs text-gray-700 space-y-3">
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-circle-check text-emerald-600 mt-0.5"></i>
                        <span>ជាសមណសិស្ស (ភិក្ខុ សាមណេរ) ឬជាកុលបុត្រដែលមានបំណងបួសរៀន។</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-circle-check text-emerald-600 mt-0.5"></i>
                        <span>មានអាយុចាប់ពី ១២ ឆ្នាំឡើងទៅ និងមានកាយសម្បទារឹងមាំ។</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-circle-check text-emerald-600 mt-0.5"></i>
                        <span>បានបញ្ចប់ការសិក្សាបឋមសិក្សាចំណេះទូទៅ (ថ្នាក់ទី ៦) ឬសមមូល។</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-circle-check text-emerald-600 mt-0.5"></i>
                        <span>មានការអនុញ្ញាតពីព្រះចៅអធិការវត្តសាមី ឬមាតាបិតា/អាណាព្យាបាល។</span>
                    </li>
                </ul>
            </div>

            <div class="bg-amber-50 rounded-2xl p-6 border border-amber-200">
                <h3 class="font-moul text-base text-amber-950 mb-3 flex items-center gap-2">
                    <i class="fa-solid fa-file-lines text-amber-700"></i> ឯកសារដែលត្រូវភ្ជាប់មកជាមួយ
                </h3>
                <ul class="text-xs text-amber-900 space-y-2">
                    <li>១. សំបុត្រកំណើត ឬអត្តសញ្ញាណប័ណ្ណ (ច្បាប់ចម្លង ០២ សន្លឹក)</li>
                    <li>២. សៀវភៅតាមដានការសិក្សា ឬសញ្ញាបត្របឋមសិក្សា</li>
                    <li>៣. រូបថត ៤x៦ (ព្រះសង្ឃគ្រងចីវរ ឬសិស្សសម្លៀកបំពាក់សមរម្យ) ចំនួន ៤ សន្លឹក</li>
                    <li>៤. លិខិតបញ្ជាក់ ឬលិខិតអនុញ្ញាតពីព្រះចៅអធិការវត្ត</li>
                </ul>
            </div>

            <div class="bg-red-950 text-amber-100 rounded-2xl p-6 shadow-md border border-amber-500/30">
                <h4 class="font-bold text-amber-300 text-sm mb-2 flex items-center gap-2">
                    <i class="fa-solid fa-circle-question"></i> ត្រូវការជំនួយក្នុងការចុះឈ្មោះ?
                </h4>
                <p class="text-xs text-amber-200/80 leading-relaxed mb-4">
                    លោកអ្នកអាចទាក់ទងមកកាន់ការិយាល័យសិក្សាធិការនៃពុទ្ធិកបឋមសិក្សាដោយផ្ទាល់៖
                </p>
                <div class="text-xs space-y-1 text-amber-200">
                    <div><i class="fa-solid fa-phone text-amber-400 mr-2"></i> 012 345 678 / 098 765 432</div>
                    <div><i class="fa-solid fa-envelope text-amber-400 mr-2"></i> admissions@wat.edu.kh</div>
                </div>
            </div>
        </div>

        <!-- Right Column: Online Application Form -->
        <div class="lg:col-span-7">
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-xl border border-amber-200">
                <div class="border-b border-gray-100 pb-4 mb-6">
                    <h2 class="font-moul text-xl text-red-950">ទម្រង់ពាក្យសុំចុះឈ្មោះចូលរៀន</h2>
                    <p class="text-xs text-gray-500 mt-1">សូមបំពេញព័ត៌មានឱ្យបានត្រឹមត្រូវនិងគ្រប់ជ្រុងជ្រោយ</p>
                </div>

                <form action="{{ route('school.admissions.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Applicant Name & Dharma Name -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">
                                គោត្តនាម និងនាម <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="applicant_name" required placeholder="ឧ. ចាន់ សុភា" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none" value="{{ old('applicant_name') }}">
                            @error('applicant_name') <span class="text-red-500 text-[11px]">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">
                                ឆាយា (បើជាព្រះសង្ឃ)
                            </label>
                            <input type="text" name="dharma_name" placeholder="ឧ. សុភធម្មោ" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none" value="{{ old('dharma_name') }}">
                        </div>
                    </div>

                    <!-- Gender & Date of Birth -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">
                                ភេទ <span class="text-red-500">*</span>
                            </label>
                            <select name="gender" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none">
                                <option value="ប្រុស">ប្រុស</option>
                                <option value="ស្រី">ស្រី</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">
                                ថ្ងៃខែឆ្នាំកំណើត
                            </label>
                            <input type="date" name="date_of_birth" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none" value="{{ old('date_of_birth') }}">
                        </div>
                    </div>

                    <!-- Monk Status & Applied Grade -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">
                                ស្ថានភាពបុគ្គល <span class="text-red-500">*</span>
                            </label>
                            <select name="monk_status" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none">
                                <option value="សមណសិស្ស (ព្រះសង្ឃ)">សមណសិស្ស (ភិក្ខុ / សាមណេរ)</option>
                                <option value="កុលបុត្រ/សិស្សគ្រហស្ថ">កុលបុត្រ / សិស្សគ្រហស្ថ (ត្រៀមបួស)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">
                                កម្រិតថ្នាក់ដែលសុំចូលរៀន <span class="text-red-500">*</span>
                            </label>
                            <select name="applied_grade" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none font-bold text-red-900">
                                <option value="ថ្នាក់ត្រី">ពុទ្ធិកបឋមសិក្សា ថ្នាក់ត្រី (កម្រិតទី១)</option>
                                <option value="ថ្នាក់ទោ">ពុទ្ធិកបឋមសិក្សា ថ្នាក់ទោ (កម្រិតទី២)</option>
                                <option value="ថ្នាក់ឯ">ពុទ្ធិកបឋមសិក្សា ថ្នាក់ឯ (កម្រិតទី៣)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Parent / Abbot Name & Phone -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">
                                ឈ្មោះអាណាព្យាបាល / ព្រះចៅអធិការ
                            </label>
                            <input type="text" name="parent_name" placeholder="ឧ. ព្រះគ្រូចៅអធិការវត្ត ឬឈ្មោះឪពុកម្តាយ" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none" value="{{ old('parent_name') }}">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">
                                លេខទូរស័ព្ទទំនាក់ទំនង <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="phone" required placeholder="ឧ. 012 345 678" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none" value="{{ old('phone') }}">
                            @error('phone') <span class="text-red-500 text-[11px]">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Previous Education -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">
                            កម្រិតវប្បធម៌ទូទៅ ឬការសិក្សាកន្លងមក
                        </label>
                        <input type="text" name="previous_education" placeholder="ឧ. ចប់ថ្នាក់ទី ៦ បឋមសិក្សា..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none" value="{{ old('previous_education') }}">
                    </div>

                    <!-- Current Address -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">
                            អាសយដ្ឋានបច្ចុប្បន្ន / វត្តដែលកំពុងគង់នៅ
                        </label>
                        <input type="text" name="address" placeholder="ភូមិ ឃុំ/សង្កាត់ ស្រុក/ខណ្ឌ ខេត្ត/រាជធានី" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none" value="{{ old('address') }}">
                    </div>

                    <!-- Additional Notes -->
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">
                            កំណត់ចំណាំបន្ថែម ឬបំណងប្រាថ្នា
                        </label>
                        <textarea name="notes" rows="3" placeholder="បញ្ជាក់ព័ត៌មានបន្ថែមបើមាន..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none">{{ old('notes') }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-3">
                        <button type="submit" class="w-full bg-gradient-to-r from-red-950 via-red-900 to-amber-800 hover:from-red-900 hover:to-amber-700 text-amber-300 font-bold py-3.5 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 text-sm flex items-center justify-center gap-2">
                            <i class="fa-solid fa-paper-plane"></i> បញ្ជូនពាក្យសុំចុះឈ្មោះចូលរៀន
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection
