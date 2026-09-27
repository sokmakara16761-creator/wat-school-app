@extends('layouts.admin')

@section('title', 'គ្រប់គ្រងអត្ថបទព័ត៌មាន - Admin')
@section('page_title', 'បញ្ជីអត្ថបទព័ត៌មាន និងសេចក្ដីប្រកាស')

@section('content')

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 space-y-6">
    
    <div class="flex justify-between items-center">
        <h2 class="font-moul text-base text-red-950">អត្ថបទទាំងអស់ ({{ $posts->total() }})</h2>
        <a href="{{ route('admin.posts.create') }}" class="bg-gradient-to-r from-red-950 to-amber-700 text-amber-300 font-bold px-4 py-2 rounded-xl text-xs flex items-center gap-2 hover:opacity-95 shadow transition">
            <i class="fa-solid fa-plus"></i> បង្កើតអត្ថបទថ្មី
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-xs text-left text-gray-700">
            <thead class="bg-gray-50 text-gray-700 font-bold border-b border-gray-200 uppercase text-[11px]">
                <tr>
                    <th class="py-3 px-4">រូបភាព</th>
                    <th class="py-3 px-4">ចំណងជើង</th>
                    <th class="py-3 px-4">ប្រភេទ</th>
                    <th class="py-3 px-4">អ្នកនិពន្ធ</th>
                    <th class="py-3 px-4">កាលបរិច្ឆេទ</th>
                    <th class="py-3 px-4">ចូលមើល</th>
                    <th class="py-3 px-4 text-center">សកម្មភាព</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($posts as $post)
                    <tr class="hover:bg-amber-50/40">
                        <td class="py-3 px-4">
                            <img src="{{ $post->thumbnail ?? 'https://images.unsplash.com/photo-1590073242678-70ee3fc28e8e?w=200&auto=format&fit=crop&q=80' }}" class="w-12 h-10 object-cover rounded-lg">
                        </td>
                        <td class="py-3 px-4 font-bold text-gray-900 max-w-sm truncate">
                            {{ $post->title }}
                        </td>
                        <td class="py-3 px-4">
                            <span class="bg-amber-100 text-amber-900 px-2 py-0.5 rounded text-[10px] font-bold">{{ $post->category }}</span>
                        </td>
                        <td class="py-3 px-4 text-gray-600">{{ $post->author }}</td>
                        <td class="py-3 px-4 text-gray-400 text-[11px]">{{ $post->published_at ? $post->published_at->format('d/m/Y') : '-' }}</td>
                        <td class="py-3 px-4 font-mono">{{ $post->views }}</td>
                        <td class="py-3 px-4 text-center">
                            <form action="{{ route('admin.posts.delete', $post->id) }}" method="POST" onsubmit="return confirm('តើអ្នកពិតជាចង់លុបអត្ថបទនេះមែនទេ?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 p-1">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-8 text-gray-400">មិនទាន់មានអត្ថបទនៅឡើយទេ។</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pt-4">
        {{ $posts->links() }}
    </div>

</div>

@endsection
