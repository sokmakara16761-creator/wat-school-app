@extends('layouts.admin')

@section('title', 'បន្ថែមកម្មវិធីបុណ្យថ្មី - Admin')
@section('page_title', 'បន្ថែមកម្មវិធីបុណ្យថ្មី')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
    <div class="border-b border-gray-100 pb-4 mb-6">
        <h2 class="font-moul text-base text-red-950">ទម្រង់បន្ថែមកម្មវិធីបុណ្យទាន</h2>
    </div>

    <form action="{{ route('admin.events.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">
                ឈ្មោះកម្មវិធីបុណ្យ <span class="text-red-500">*</span>
            </label>
            <input type="text" name="title" required placeholder="ឧ. ពិធីបុណ្យមាឃបូជា..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">
                    កាលបរិច្ឆេទចន្ទគតិ (Lunar Date)
                </label>
                <input type="text" name="lunar_date" placeholder="ឧ. ថ្ងៃ ១៥ កើត ខែមាឃ..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">
                    ទីកន្លែងប្រារព្ធ <span class="text-red-500">*</span>
                </label>
                <input type="text" name="location" value="សាលាឆាន់ និងព្រះវិហារវត្ត" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">
                    ថ្ងៃចាប់ផ្ដើម <span class="text-red-500">*</span>
                </label>
                <input type="date" name="start_date" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">
                    ថ្ងៃបញ្ចប់ (បើមាន)
                </label>
                <input type="date" name="end_date" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">
                តំណភ្ជាប់រូបភាព (Image URL)
            </label>
            <input type="url" name="image" placeholder="https://images.unsplash.com/..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">
                ការពិពណ៌នាសង្ខេប
            </label>
            <textarea name="description" rows="2" placeholder="សេចក្ដីសង្ខេបអំពីកម្មវិធីបុណ្យ..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none"></textarea>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
            <a href="{{ route('admin.events') }}" class="px-4 py-2.5 rounded-xl border border-gray-300 text-xs font-semibold text-gray-700 hover:bg-gray-50">
                ថយក្រោយ
            </a>
            <button type="submit" class="bg-gradient-to-r from-red-950 to-amber-700 text-amber-300 font-bold px-6 py-2.5 rounded-xl text-xs shadow hover:opacity-95">
                <i class="fa-solid fa-save mr-1"></i> រក្សាទុក និងផ្សព្វផ្សាយ
            </button>
        </div>
    </form>
</div>

@endsection
