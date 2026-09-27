@extends('layouts.app')

@section('title', 'ទំនាក់ទំនង - វត្តព្រៃស្ដី')

@section('content')

<!-- Header Banner -->
<div class="bg-gradient-to-r from-red-950 via-red-900 to-amber-950 text-white py-12 border-b-4 border-amber-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="inline-block bg-amber-500/20 text-amber-300 border border-amber-400/30 text-xs px-3 py-1 rounded-full font-semibold">
            ទំនាក់ទំនង និងទីតាំង
        </span>
        <h1 class="font-moul text-2xl sm:text-3xl lg:text-4xl text-amber-300">
            ព័ត៌មានទំនាក់ទំនង និងផែនទី
        </h1>
        <p class="text-amber-100/80 text-sm max-w-2xl mx-auto">
            លោកអ្នកអាចទាក់ទងមកកាន់គណៈកម្មការវត្ត ឬការិយាល័យសាលាពុទ្ធិកបឋមសិក្សាបានគ្រប់ពេលវេលា
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        <!-- Left: Contact Details -->
        <div class="lg:col-span-5 space-y-6">
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-md border border-amber-200 space-y-6">
                <h3 class="font-moul text-lg text-red-950 border-b border-gray-100 pb-3">
                    ទីស្នាក់ការ និងការិយាល័យ
                </h3>

                <div class="space-y-4 text-xs text-gray-700">
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center flex-shrink-0 text-base">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900 text-sm">អាសយដ្ឋាន</div>
                            <p class="text-gray-600 mt-0.5">វត្តធនរតនេសោភណារាម (ព្រៃស្ដី) សង្កាត់ចោមចៅ២ ខណ្ឌពោធិ៍សែនជ័យ រាជធានីភ្នំពេញ</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center flex-shrink-0 text-base">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900 text-sm">លេខទូរស័ព្ទ</div>
                            <p class="text-gray-600 mt-0.5">012 345 678 / 098 765 432 / 077 889 900</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center flex-shrink-0 text-base">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900 text-sm">សារអេឡិចត្រូនិច (Email)</div>
                            <p class="text-gray-600 mt-0.5">info@watpreysdei.edu.kh / school@watpreysdei.edu.kh</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center flex-shrink-0 text-base">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900 text-sm">ម៉ោងធ្វើការ / បើកទ្វារវត្ត</div>
                            <p class="text-gray-600 mt-0.5">រៀងរាល់ថ្ងៃ៖ ម៉ោង ៦:០០ ព្រឹក ដល់ ៦:០០ ល្ងាច</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="bg-red-950 text-amber-100 rounded-2xl p-6 shadow-md border border-amber-500/30 space-y-3">
                <h4 class="font-bold text-amber-300 text-sm">បណ្ដាញទំនាក់ទំនងសង្គម</h4>
                <p class="text-xs text-amber-200/80">តាមដានសកម្មភាព និងការផ្សាយបន្តផ្ទាល់ពិធីបុណ្យទានផ្សេងៗ៖</p>
                <div class="flex items-center gap-3 pt-2">
                    <a href="#" class="bg-white/10 hover:bg-amber-500 hover:text-black text-amber-200 px-3.5 py-2 rounded-xl text-xs font-semibold flex items-center gap-2 transition">
                        <i class="fa-brands fa-facebook-f"></i> Facebook Page
                    </a>
                    <a href="#" class="bg-white/10 hover:bg-red-600 hover:text-white text-amber-200 px-3.5 py-2 rounded-xl text-xs font-semibold flex items-center gap-2 transition">
                        <i class="fa-brands fa-youtube"></i> YouTube
                    </a>
                    <a href="#" class="bg-white/10 hover:bg-blue-500 hover:text-white text-amber-200 px-3.5 py-2 rounded-xl text-xs font-semibold flex items-center gap-2 transition">
                        <i class="fa-brands fa-telegram"></i> Telegram
                    </a>
                </div>
            </div>
        </div>

        <!-- Right: Contact Form -->
        <div class="lg:col-span-7">
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-xl border border-amber-200">
                <div class="border-b border-gray-100 pb-4 mb-6">
                    <h2 class="font-moul text-xl text-red-950">ផ្ញើសារ ឬសំណូមពរ</h2>
                    <p class="text-xs text-gray-500 mt-1">សូមបំពេញព័ត៌មានខាងក្រោមដើម្បីផ្ញើសារមកកាន់គណៈកម្មការវត្ត</p>
                </div>

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">
                            ឈ្មោះរបស់អ្នក <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" required placeholder="ឧ. សុខ សុជាតិ" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none" value="{{ old('name') }}">
                        @error('name') <span class="text-red-500 text-[11px]">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">លេខទូរស័ព្ទ</label>
                            <input type="text" name="phone" placeholder="ឧ. 012 345 678" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none" value="{{ old('phone') }}">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-1">អ៊ីមែល (Email)</label>
                            <input type="email" name="email" placeholder="ឧ. example@gmail.com" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">ប្រធានបទ</label>
                        <input type="text" name="subject" placeholder="ឧ. សាកសួរអំពីការចូលរួមបុណ្យ ឬចុះឈ្មោះរៀន..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none" value="{{ old('subject') }}">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">
                            ខ្លឹមសារនៃសារ <span class="text-red-500">*</span>
                        </label>
                        <textarea name="message" rows="4" required placeholder="សូមសរសេរសារ ឬសំណួររបស់អ្នកនៅទីនេះ..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none">{{ old('message') }}</textarea>
                        @error('message') <span class="text-red-500 text-[11px]">{{ $message }}</span> @enderror
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="w-full bg-gradient-to-r from-red-950 via-red-900 to-amber-800 hover:from-red-900 hover:to-amber-700 text-amber-300 font-bold py-3.5 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 text-sm flex items-center justify-center gap-2">
                            <i class="fa-solid fa-paper-plane"></i> ផ្ញើសារជូនគណៈកម្មការ
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- Google Map Embed -->
    <div class="mt-12 rounded-2xl overflow-hidden shadow-md border border-amber-200 h-80 bg-gray-100 relative">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31274.887227447094!2d104.8340156!3d11.5218765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095034c4491763%3A0x6b1076f7b1981a2e!2sChaom%20Chau%202%2C%20Phnom%20Penh!5e0!3m2!1sen!2skh!4v1700000000000!5m2!1sen!2skh" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

</div>

@endsection
