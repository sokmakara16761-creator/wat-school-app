@extends('layouts.admin')

@section('title', 'គ្រប់គ្រងពាក្យសុំចូលរៀន - Admin')
@section('page_title', 'បញ្ជីពាក្យសុំចុះឈ្មោះចូលរៀន')

@section('content')

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 space-y-6">
    
    <div class="flex justify-between items-center">
        <h2 class="font-moul text-base text-red-950">ពាក្យសុំចុះឈ្មោះចូលរៀនសរុប ({{ $admissions->total() }})</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-xs text-left text-gray-700">
            <thead class="bg-gray-50 text-gray-700 font-bold border-b border-gray-200 uppercase text-[11px]">
                <tr>
                    <th class="py-3 px-4">ឈ្មោះសិស្ស/សមណសិស្ស</th>
                    <th class="py-3 px-4">ភេទ</th>
                    <th class="py-3 px-4">កម្រិតថ្នាក់</th>
                    <th class="py-3 px-4">ស្ថានភាព</th>
                    <th class="py-3 px-4">លេខទូរស័ព្ទ</th>
                    <th class="py-3 px-4">អាសយដ្ឋាន</th>
                    <th class="py-3 px-4">កាលបរិច្ឆេទ</th>
                    <th class="py-3 px-4 text-center">សកម្មភាព</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($admissions as $adm)
                    <tr class="hover:bg-amber-50/40">
                        <td class="py-3.5 px-4 font-bold text-gray-900">
                            {{ $adm->applicant_name }}
                            @if($adm->dharma_name)
                                <span class="block text-[11px] text-amber-800 font-normal">ឆាយា៖ {{ $adm->dharma_name }}</span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4">{{ $adm->gender }}</td>
                        <td class="py-3.5 px-4 font-semibold text-red-900">{{ $adm->applied_grade }}</td>
                        <td class="py-3.5 px-4">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold {{ $adm->status == 'approved' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                                {{ $adm->status == 'approved' ? 'យល់ព្រម' : 'រង់ចាំពិនិត្យ' }}
                            </span>
                        </td>
                        <td class="py-3.5 px-4 font-mono font-bold">{{ $adm->phone }}</td>
                        <td class="py-3.5 px-4 text-gray-500 max-w-xs truncate">{{ $adm->address ?? '-' }}</td>
                        <td class="py-3.5 px-4 text-gray-400 text-[11px]">{{ $adm->created_at->format('d/m/Y') }}</td>
                        <td class="py-3.5 px-4 text-center">
                            <form action="{{ route('admin.admissions.status', $adm->id) }}" method="POST" class="inline-flex gap-1">
                                @csrf
                                @if($adm->status !== 'approved')
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-2.5 py-1 rounded text-[11px] font-semibold transition" title="យល់ព្រម">
                                        <i class="fa-solid fa-check"></i> យល់ព្រម
                                    </button>
                                @else
                                    <input type="hidden" name="status" value="pending">
                                    <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white px-2.5 py-1 rounded text-[11px] font-semibold transition" title="ដាក់រង់ចាំ">
                                        <i class="fa-solid fa-clock-rotate-left"></i> រង់ចាំ
                                    </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-8 text-gray-400">មិនទាន់មានពាក្យសុំចូលរៀននៅឡើយទេ។</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pt-4">
        {{ $admissions->links() }}
    </div>

</div>

@endsection
