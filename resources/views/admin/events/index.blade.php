@extends('layouts.admin')

@section('title', 'គ្រប់គ្រងកម្មវិធីបុណ្យទាន - Admin')
@section('page_title', 'បញ្ជីកម្មវិធីបុណ្យទាន និងព្រឹត្តិការណ៍')

@section('content')

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 space-y-6">
    
    <div class="flex justify-between items-center">
        <h2 class="font-moul text-base text-red-950">កម្មវិធីបុណ្យសរុប ({{ $events->total() }})</h2>
        <a href="{{ route('admin.events.create') }}" class="bg-gradient-to-r from-red-950 to-amber-700 text-amber-300 font-bold px-4 py-2 rounded-xl text-xs flex items-center gap-2 hover:opacity-95 shadow transition">
            <i class="fa-solid fa-plus"></i> បន្ថែមកម្មវិធីបុណ្យ
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-xs text-left text-gray-700">
            <thead class="bg-gray-50 text-gray-700 font-bold border-b border-gray-200 uppercase text-[11px]">
                <tr>
                    <th class="py-3 px-4">រូបភាព</th>
                    <th class="py-3 px-4">កម្មវិធីបុណ្យ</th>
                    <th class="py-3 px-4">កាលបរិច្ឆេទចន្ទគតិ</th>
                    <th class="py-3 px-4">ថ្ងៃចាប់ផ្ដើម</th>
                    <th class="py-3 px-4">ទីកន្លែង</th>
                    <th class="py-3 px-4 text-center">សកម្មភាព</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($events as $event)
                    <tr class="hover:bg-amber-50/40">
                        <td class="py-3 px-4">
                            <img src="{{ $event->image ?? 'https://images.unsplash.com/photo-1548625361-04285e6878b3?w=200&auto=format&fit=crop&q=80' }}" class="w-12 h-10 object-cover rounded-lg">
                        </td>
                        <td class="py-3 px-4 font-bold text-gray-900 max-w-sm truncate">
                            {{ $event->title }}
                        </td>
                        <td class="py-3 px-4 font-medium text-amber-800">{{ $event->lunar_date ?? '-' }}</td>
                        <td class="py-3 px-4 text-gray-600 font-mono">{{ \Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }}</td>
                        <td class="py-3 px-4 text-gray-500">{{ $event->location }}</td>
                        <td class="py-3 px-4 text-center">
                            <form action="{{ route('admin.events.delete', $event->id) }}" method="POST" onsubmit="return confirm('តើអ្នកពិតជាចង់លុបកម្មវិធីនេះមែនទេ?');" class="inline">
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
                        <td colspan="6" class="text-center py-8 text-gray-400">មិនទាន់មានកម្មវិធីបុណ្យនៅឡើយទេ។</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pt-4">
        {{ $events->links() }}
    </div>

</div>

@endsection
