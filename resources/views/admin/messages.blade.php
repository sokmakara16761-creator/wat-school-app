@extends('layouts.admin')

@section('title', 'គ្រប់គ្រងសារទំនាក់ទំនង - Admin')
@section('page_title', 'សារទំនាក់ទំនង និងសំណូមពរ')

@section('content')

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 space-y-6">
    
    <div class="flex justify-between items-center">
        <h2 class="font-moul text-base text-red-950">សារទំនាក់ទំនងសរុប ({{ $messages->total() }})</h2>
    </div>

    <div class="space-y-4">
        @forelse($messages as $msg)
            <div class="p-5 rounded-xl border {{ $msg->is_read ? 'bg-gray-50/70 border-gray-200' : 'bg-amber-50/50 border-amber-300 shadow-sm' }} transition space-y-3">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-gray-200/60 pb-2">
                    <div class="flex items-center gap-2">
                        <span class="font-bold text-sm text-gray-900">{{ $msg->name }}</span>
                        @if(!$msg->is_read)
                            <span class="bg-red-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">ថ្មី</span>
                        @endif
                        @if($msg->phone)
                            <span class="text-xs text-amber-800 font-mono"><i class="fa-solid fa-phone text-amber-600 ml-2 mr-1"></i> {{ $msg->phone }}</span>
                        @endif
                        @if($msg->email)
                            <span class="text-xs text-gray-500"><i class="fa-regular fa-envelope ml-2 mr-1"></i> {{ $msg->email }}</span>
                        @endif
                    </div>
                    <div class="text-[11px] text-gray-400">
                        {{ $msg->created_at->format('d/m/Y H:i') }} ({{ $msg->created_at->diffForHumans() }})
                    </div>
                </div>

                @if($msg->subject)
                    <div class="text-xs font-bold text-red-950">ប្រធានបទ៖ {{ $msg->subject }}</div>
                @endif

                <p class="text-xs text-gray-700 leading-relaxed bg-white p-3 rounded-lg border border-gray-100">
                    {{ $msg->message }}
                </p>

                <div class="flex justify-end gap-2 pt-1">
                    @if(!$msg->is_read)
                        <form action="{{ route('admin.messages.read', $msg->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white text-xs font-semibold px-3 py-1 rounded-lg transition">
                                <i class="fa-solid fa-check mr-1"></i> សម្គាល់ថាបានអាន
                            </button>
                        </form>
                    @endif
                    @if($msg->phone)
                        <a href="tel:{{ $msg->phone }}" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-3 py-1 rounded-lg transition">
                            <i class="fa-solid fa-phone mr-1"></i> ទូរស័ព្ទទៅវិញ
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div class="text-center py-12 text-gray-400 text-xs">មិនទាន់មានសារទំនាក់ទំនងនៅឡើយទេ។</div>
        @endforelse
    </div>

    <div class="pt-4">
        {{ $messages->links() }}
    </div>

</div>

@endsection
