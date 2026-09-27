@extends('layouts.admin')

@section('title', 'បង្កើតអត្ថបទព័ត៌មានថ្មី - Admin')
@section('page_title', 'បង្កើតអត្ថបទព័ត៌មានថ្មី')

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
    <div class="border-b border-gray-100 pb-4 mb-6">
        <h2 class="font-moul text-base text-red-950">ទម្រង់បង្កើតអត្ថបទថ្មី</h2>
    </div>

    <form action="{{ route('admin.posts.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">
                ចំណងជើងអត្ថបទ <span class="text-red-500">*</span>
            </label>
            <input type="text" name="title" required placeholder="បញ្ចូលចំណងជើងអត្ថបទ..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">
                    ប្រភេទអត្ថបទ <span class="text-red-500">*</span>
                </label>
                <select name="category" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none">
                    <option value="វត្តអារាម">វត្តអារាម</option>
                    <option value="សាលារៀន">សាលារៀន</option>
                    <option value="ធម្មទាន">ធម្មទាន</option>
                    <option value="សេចក្ដីជូនដំណឹង">សេចក្ដីជូនដំណឹង</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">
                    អ្នកនិពន្ធ / ប្រភព
                </label>
                <input type="text" name="author" value="គណៈកម្មការវត្ត" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">
                តំណភ្ជាប់រូបភាពតំណាង (Image URL)
            </label>
            <input type="url" name="thumbnail" placeholder="https://images.unsplash.com/..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none">
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">
                សេចក្ដីសង្ខេបខ្លី (Excerpt)
            </label>
            <textarea name="excerpt" rows="2" placeholder="សេចក្ដីសង្ខេបខ្លីៗពីអត្ថបទ..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none"></textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">
                ខ្លឹមសារអត្ថបទពេញលេញ (HTML / Text) <span class="text-red-500">*</span>
            </label>
            <textarea name="content" rows="8" required placeholder="សរសេរខ្លឹមសារអត្ថបទនៅទីនេះ..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-amber-500 focus:bg-white focus:outline-none"></textarea>
        </div>

        <div class="flex items-center gap-2 pt-2">
            <input type="checkbox" name="is_featured" id="is_featured" value="1" class="rounded text-amber-600 focus:ring-amber-500">
            <label for="is_featured" class="text-xs text-gray-700 font-semibold">ដាក់ជាអត្ថបទលេចធ្លោលើទំព័រដើម</label>
        </div>

        <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
            <a href="{{ route('admin.posts') }}" class="px-4 py-2.5 rounded-xl border border-gray-300 text-xs font-semibold text-gray-700 hover:bg-gray-50">
                ថយក្រោយ
            </a>
            <button type="submit" class="bg-gradient-to-r from-red-950 to-amber-700 text-amber-300 font-bold px-6 py-2.5 rounded-xl text-xs shadow hover:opacity-95">
                <i class="fa-solid fa-save mr-1"></i> រក្សាទុក និងផ្សព្វផ្សាយ
            </button>
        </div>
    </form>
</div>

@endsection
