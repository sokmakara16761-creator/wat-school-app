@extends('layouts.admin')

@section('title', 'Admin Dashboard - វត្តព្រៃស្ដី')
@section('page_title', 'ទិដ្ឋភាពទូទៅ (Dashboard Overview)')

@section('content')

<div class="space-y-8">
    
    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-sm flex items-center justify-between">
            <div>
                <div class="text-xs text-gray-500 font-semibold">ពាក្យសុំចូលរៀនសរុប</div>
                <div class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['admissions'] }}</div>
                <div class="text-[11px] text-amber-600 font-medium mt-1">រង់ចាំពិនិត្យ៖ {{ $stats['pending_admissions'] }}</div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center text-xl">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-sm flex items-center justify-between">
            <div>
                <div class="text-xs text-gray-500 font-semibold">អត្ថបទព័ត៌មាន</div>
                <div class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['posts'] }}</div>
                <div class="text-[11px] text-emerald-600 font-medium mt-1">បានផ្សព្វផ្សាយ</div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-800 flex items-center justify-center text-xl">
                <i class="fa-regular fa-newspaper"></i>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-sm flex items-center justify-between">
            <div>
                <div class="text-xs text-gray-500 font-semibold">កម្មវិធីបុណ្យទាន</div>
                <div class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['events'] }}</div>
                <div class="text-[11px] text-red-600 font-medium mt-1">ពិធីបុណ្យជាតិ-សាសនា</div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-red-100 text-red-800 flex items-center justify-center text-xl">
                <i class="fa-regular fa-calendar-check"></i>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-sm flex items-center justify-between">
            <div>
                <div class="text-xs text-gray-500 font-semibold">សារទំនាក់ទំនង</div>
                <div class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['messages'] }}</div>
                <div class="text-[11px] text-amber-600 font-medium mt-1">មិនទាន់អាន៖ {{ $stats['unread_messages'] }}</div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-800 flex items-center justify-center text-xl">
                <i class="fa-regular fa-envelope"></i>
            </div>
        </div>

    </div>

    <!-- Two Columns: Recent Admissions & Recent Messages -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Recent Admissions -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-moul text-sm text-red-950">ពាក្យសុំចូលរៀនថ្មីៗ</h3>
                <a href="{{ route('admin.admissions') }}" class="text-xs font-bold text-amber-700 hover:underline">មើលទាំងអស់</a>
            </div>
            <div class="space-y-3">
                @forelse($recentAdmissions as $adm)
                    <div class="p-3 bg-gray-50 rounded-xl border border-gray-100 flex items-center justify-between text-xs">
                        <div>
                            <div class="font-bold text-gray-900">{{ $adm->applicant_name }}</div>
                            <div class="text-[11px] text-gray-500">{{ $adm->applied_grade }} • {{ $adm->phone }}</div>
                        </div>
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold {{ $adm->status == 'approved' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                            {{ $adm->status == 'approved' ? 'យល់ព្រម' : 'រង់ចាំពិនិត្យ' }}
                        </span>
                    </div>
                @empty
                    <div class="text-center py-6 text-xs text-gray-400">មិនទាន់មានពាក្យសុំចូលរៀននៅឡើយទេ។</div>
                @endforelse
            </div>
        </div>

        <!-- Recent Contact Messages -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-moul text-sm text-red-950">សារទំនាក់ទំនងថ្មីៗ</h3>
                <a href="{{ route('admin.messages') }}" class="text-xs font-bold text-amber-700 hover:underline">មើលទាំងអស់</a>
            </div>
            <div class="space-y-3">
                @forelse($recentMessages as $msg)
                    <div class="p-3 bg-gray-50 rounded-xl border border-gray-100 text-xs">
                        <div class="flex justify-between items-center mb-1">
                            <span class="font-bold text-gray-900">{{ $msg->name }}</span>
                            <span class="text-[10px] text-gray-400">{{ $msg->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-[11px] text-gray-600 line-clamp-2">{{ $msg->message }}</p>
                    </div>
                @empty
                    <div class="text-center py-6 text-xs text-gray-400">មិនទាន់មានសារទំនាក់ទំនងនៅឡើយទេ។</div>
                @endforelse
            </div>
        </div>

    </div>

</div>

@endsection
