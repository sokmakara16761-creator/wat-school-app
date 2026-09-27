<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\KhmerLunarService;
use Carbon\Carbon;

class DonationController extends Controller
{
    public function index()
    {
        $projects = [
            [
                'id' => 1,
                'title' => 'មូលនិធិកសាងអគារសាលាឆាន់ និងកុដិស្នាក់នៅ',
                'target' => 25000,
                'raised' => 19850,
                'progress' => 79,
                'description' => 'ចូលរួមជាបច្ច័យសាងសង់សាលាឆាន់កម្ពស់ ២ ជាន់ និងកុដិស្នាក់នៅសម្រាប់ព្រះសង្ឃ និងសមណសិស្ស។',
                'image' => 'https://images.unsplash.com/photo-1590073242678-70ee3fc28e8e?w=800&auto=format&fit=crop&q=80',
            ],
            [
                'id' => 2,
                'title' => 'អាហារូបករណ៍ និងសម្ភារសិក្សាសមណសិស្សក្រីក្រ',
                'target' => 5000,
                'raised' => 3700,
                'progress' => 74,
                'description' => 'ជួយឧបត្ថម្ភសៀវភៅ គម្ពីរដីកា ប៊ិច កុំព្យូទ័រ និងថ្លៃព្យាបាលជំងឺដល់សមណសិស្សមកពីតំបន់ឆ្ងាយៗ។',
                'image' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=800&auto=format&fit=crop&q=80',
            ],
            [
                'id' => 3,
                'title' => 'ចង្ហាន់ប្រចាំថ្ងៃ និងទឹកភ្លើងវត្តអារាម',
                'target' => 3000,
                'raised' => 2450,
                'progress' => 81,
                'description' => 'ចូលរួមបច្ច័យផ្គត់ផ្គង់ចង្ហាន់ព្រឹក-ថ្ងៃត្រង់ ដល់ព្រះសង្ឃជាង ៤០ អង្គ និងសមណសិស្ស។',
                'image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800&auto=format&fit=crop&q=80',
            ],
        ];

        $bankAccounts = [
            [
                'bank_name' => 'ABA Bank (USD)',
                'account_name' => 'WAT PREY SDEI PAGODA',
                'account_number' => '001 234 567',
                'currency' => 'USD ($)',
                'qr_code' => 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=ABA_BANK_001234567_WAT_PREY_SDEI',
            ],
            [
                'bank_name' => 'ABA Bank (KHR)',
                'account_name' => 'WAT PREY SDEI PAGODA',
                'account_number' => '001 234 568',
                'currency' => 'KHR (៛)',
                'qr_code' => 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=ABA_BANK_001234568_KHR_WAT_PREY_SDEI',
            ],
            [
                'bank_name' => 'Bakong KHQR (All Banks)',
                'account_name' => 'WAT PREY SDEI BUDDHIST SCHOOL',
                'account_number' => 'wat_preysdei@aclb',
                'currency' => 'KHR / USD',
                'qr_code' => 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=BAKONG_KHQR_WAT_PREY_SDEI',
            ],
        ];

        return view('donation.index', compact('projects', 'bankAccounts'));
    }

    /**
     * Generate / View E-Certificate for donor
     */
    public function generateCertificate(Request $request)
    {
        $validated = $request->validate([
            'donor_name' => 'required|string|max:150',
            'amount' => 'required|string|max:50',
            'currency' => 'nullable|string|in:USD,KHR',
            'purpose' => 'nullable|string|max:200',
            'donor_title' => 'nullable|string|max:50', // ឧបាសក, ឧបាសិកា, សប្បុរសជន
            'transaction_id' => 'nullable|string|max:100',
        ]);

        $donorTitle = $validated['donor_title'] ?? 'សប្បុរសជន';
        $donorName = $validated['donor_name'];
        $amount = $validated['amount'];
        $currency = $validated['currency'] ?? 'USD';
        $purpose = $validated['purpose'] ?? 'ចូលរួមកសាងសមិទ្ធផលក្នុងវត្តអារាម និងទ្រទ្រង់ពុទ្ធិកសិក្សា';
        
        $certificateNo = 'WPSD-' . date('Ymd') . '-' . strtoupper(substr(md5($donorName . time()), 0, 4));
        $issueDate = Carbon::now('Asia/Phnom_Penh');
        $lunarInfo = KhmerLunarService::getLunarDateInfo($issueDate);

        return view('donation.certificate', compact(
            'donorTitle',
            'donorName',
            'amount',
            'currency',
            'purpose',
            'certificateNo',
            'issueDate',
            'lunarInfo'
        ));
    }
}
