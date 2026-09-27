<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ប័ណ្ណថ្លែងអំណរគុណ - {{ $donorName }} | វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)</title>
    
    <!-- Google Khmer Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@400;700&family=Kantumruy+Pro:ital,wght@0,300;0,400;0,600;0,700;1,400&family=Moul&family=Siemreap&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- html2canvas for image saving -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @media print {
            body {
                background: white !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            .no-print {
                display: none !important;
            }
            .certificate-container {
                box-shadow: none !important;
                border: none !important;
                width: 100% !important;
                max-width: 100% !important;
                padding: 20px !important;
                page-break-inside: avoid;
            }
            @page {
                size: A4 landscape;
                margin: 8mm;
            }
        }
        .bg-certificate {
            background: radial-gradient(circle at 50% 50%, #fffdf9 0%, #fef8ee 100%);
        }
        .border-double-gold {
            border: 6px double #d97706;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen py-6 sm:py-10 px-2 sm:px-4 flex flex-col items-center justify-center font-sans selection:bg-amber-500 selection:text-white">

    <!-- Action Toolbar (No Print) -->
    <div class="no-print max-w-4xl w-full mb-6 flex flex-wrap items-center justify-between gap-3 bg-white p-4 rounded-2xl shadow-md border border-amber-200">
        <a href="{{ route('donation.index') }}" class="text-sm font-semibold text-gray-700 hover:text-red-900 flex items-center gap-2 transition">
            <i class="fa-solid fa-arrow-left"></i> ត្រឡប់ទៅទំព័របរិច្ចាគ
        </a>
        <div class="flex items-center gap-2">
            <button onclick="window.print()" class="bg-red-900 hover:bg-red-800 text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-xl shadow transition flex items-center gap-2">
                <i class="fa-solid fa-print text-amber-300"></i> បោះពុម្ពប័ណ្ណ (Print)
            </button>
            <button id="downloadBtn" onclick="downloadCertificate()" class="bg-amber-600 hover:bg-amber-500 text-white text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-xl shadow transition flex items-center gap-2">
                <i class="fa-solid fa-download"></i> រក្សាទុកជារូបភាព (Save Image)
            </button>
        </div>
    </div>

    <!-- Certificate Card Container -->
    <div id="certificateWrapper" class="certificate-container max-w-4xl w-full bg-certificate rounded-2xl shadow-2xl p-6 sm:p-10 border-double-gold relative overflow-hidden text-gray-900">
        
        <!-- Corner Ornaments (CSS styled) -->
        <div class="absolute top-2 left-2 text-amber-600/40 text-2xl"><i class="fa-solid fa-dharmachakra"></i></div>
        <div class="absolute top-2 right-2 text-amber-600/40 text-2xl"><i class="fa-solid fa-dharmachakra"></i></div>
        <div class="absolute bottom-2 left-2 text-amber-600/40 text-2xl"><i class="fa-solid fa-dharmachakra"></i></div>
        <div class="absolute bottom-2 right-2 text-amber-600/40 text-2xl"><i class="fa-solid fa-dharmachakra"></i></div>

        <!-- Watermark Background Seal -->
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none opacity-5">
            <img src="{{ asset('images/wat-logo.png') }}" class="w-96 h-96 object-contain" alt="Watermark Seal">
        </div>

        <div class="relative z-10 space-y-6">
            
            <!-- Header: National / Buddhist Motto -->
            <div class="text-center space-y-1">
                <div class="font-moul text-sm sm:text-base text-red-950 tracking-wider">
                    ព្រះរាជាណាចក្រកម្ពុជា
                </div>
                <div class="font-moul text-xs sm:text-sm text-amber-800">
                    ជាតិ សាសនា ព្រះមហាក្សត្រ
                </div>
                <div class="text-xs text-amber-700 tracking-widest">
                    ❖ ❖ ❖
                </div>
            </div>

            <!-- Wat & School Branding Header -->
            <div class="flex items-center justify-between border-b-2 border-amber-500/40 pb-4">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/wat-logo.png') }}" alt="Logo វត្ត" class="w-14 h-14 sm:w-16 sm:h-16 object-contain drop-shadow">
                    <div>
                        <h2 class="font-moul text-red-950 text-xs sm:text-sm leading-tight">វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)</h2>
                        <p class="text-[10px] sm:text-xs text-amber-800 font-semibold mt-0.5">ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី</p>
                        <p class="text-[9px] text-gray-500">សង្កាត់ចោមចៅ២ ខណ្ឌពោធិ៍សែនជ័យ រាជធានីភ្នំពេញ</p>
                    </div>
                </div>
                <div class="text-right">
                    <span class="inline-block bg-amber-100 text-red-950 border border-amber-300 text-[10px] sm:text-xs font-mono font-bold px-2.5 py-1 rounded-md">
                        លេខកូដ៖ {{ $certificateNo }}
                    </span>
                    <p class="text-[10px] text-gray-500 mt-1">ពុទ្ធសករាជ៖ {{ $lunarInfo['buddhist_era_kh'] }}</p>
                </div>
            </div>

            <!-- Main Certificate Heading -->
            <div class="text-center py-2 space-y-1">
                <h1 class="font-moul text-lg sm:text-2xl text-red-900 tracking-wide">
                    វិញ្ញាបនបត្រថ្លែងអំណរគុណ
                </h1>
                <p class="font-moul text-xs sm:text-sm text-amber-700">
                    និងលិខិតអនុមោទនាកុសលចេតនា
                </p>
            </div>

            <!-- Certificate Body Statement -->
            <div class="text-center space-y-4 max-w-2xl mx-auto text-xs sm:text-sm leading-relaxed text-gray-800">
                <p>
                    ព្រះចៅអធិការ គណៈសង្ឃ និងគណៈកម្មការវត្តធនរតនេសោភណារាម (ព្រៃស្ដី) ព្រមទាំងគណៈគ្រប់គ្រងពុទ្ធិកបឋមសិក្សា សូមថ្លែងនូវអំណរគុណ និងអនុមោទនាកុសលចេតនាដ៏ជ្រះថ្លា ជូនចំពោះ៖
                </p>

                <!-- Donor Name Highlight -->
                <div class="py-2">
                    <span class="text-sm sm:text-base text-gray-700 font-semibold">{{ $donorTitle }}</span>
                    <div class="font-moul text-xl sm:text-3xl text-red-950 my-1 text-amber-900">
                        {{ $donorName }}
                    </div>
                </div>

                <p>
                    ដែលបានចូលរួមបរិច្ចាគបច្ច័យចំនួន <strong class="font-bold text-red-900 text-sm sm:text-base bg-amber-100 px-3 py-1 rounded-md border border-amber-300 font-mono">{{ $amount }} {{ $currency == 'USD' ? 'ដុល្លារ ($)' : 'រៀល (៛)' }}</strong>
                    សម្រាប់ <strong class="text-gray-900 font-semibold">{{ $purpose }}</strong>។
                </p>

                <!-- Buddhist Blessings -->
                <div class="bg-gradient-to-r from-amber-50 via-amber-100/70 to-amber-50 p-4 rounded-xl border border-amber-200/80 my-4 text-center">
                    <p class="font-moul text-xs sm:text-sm text-red-950 mb-1">
                        ពុទ្ធពរទាំងបួនប្រការ
                    </p>
                    <p class="text-xs sm:text-sm font-semibold text-amber-900">
                        « អាយុ វណ្ណៈ សុខៈ ពលៈ »
                    </p>
                    <p class="text-[11px] sm:text-xs text-gray-700 mt-1.5 leading-normal">
                        សូមកុសលចេតនានេះ នាំមកនូវសេចក្តីសុខ សេចក្តីចម្រើន វិបុលសុខ សម្បូណ៌សប្បាយ និងជោគជ័យគ្រប់ភារកិច្ច កុំបីឃ្លៀងឃ្លាតឡើយ។
                    </p>
                </div>
            </div>

            <!-- Date and Signatures Section -->
            <div class="grid grid-cols-2 gap-6 pt-4 items-end text-center text-xs sm:text-sm">
                
                <!-- Left: Committee & Date -->
                <div class="space-y-1">
                    <p class="text-[11px] sm:text-xs text-gray-600 font-medium">
                        {{ $lunarInfo['lunar_date_kh'] }}
                    </p>
                    <p class="text-[10px] text-gray-500">
                        {{ $lunarInfo['solar_date_kh'] }}
                    </p>
                    <div class="pt-6 font-moul text-red-950 text-xs sm:text-sm">
                        គណៈកម្មការវត្តអារាម
                    </div>
                    <p class="text-[10px] text-gray-500">វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)</p>
                </div>

                <!-- Right: Abbot Stamp & Signature -->
                <div class="space-y-1">
                    <p class="text-[11px] sm:text-xs text-gray-600 font-medium">
                        រាជធានីភ្នំពេញ, ថ្ងៃទី {{ $issueDate->format('d/m/Y') }}
                    </p>
                    <p class="font-moul text-red-950 text-xs sm:text-sm">
                        ព្រះចៅអធិការវត្ត
                    </p>
                    
                    <!-- Abbot Signature / Seal graphic -->
                    <div class="relative py-2 flex justify-center items-center">
                        <!-- Red Stamp Circle -->
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full border-2 border-dashed border-red-700/60 p-1 flex items-center justify-center">
                            <img src="{{ asset('images/wat-logo.png') }}" class="w-full h-full object-contain opacity-80 filter saturate-150" alt="Seal">
                        </div>
                    </div>

                    <div class="font-moul text-amber-900 text-xs sm:text-sm">
                        ព្រះគ្រូសិរីធម្មវិជ្ជោ សេង ថៃ
                    </div>
                    <p class="text-[10px] text-gray-500">ព្រះចៅអធិការវត្តព្រៃស្ដី</p>
                </div>

            </div>

        </div>
    </div>

    <!-- Script to save certificate as Image -->
    <script>
        function downloadCertificate() {
            const btn = document.getElementById('downloadBtn');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fa-solid fa-spinner animate-spin"></i> កំពុងទាញយក...';
            btn.disabled = true;

            const target = document.getElementById('certificateWrapper');
            html2canvas(target, {
                scale: 2,
                useCORS: true,
                backgroundColor: '#ffffff'
            }).then(canvas => {
                const link = document.createElement('a');
                link.download = 'ប័ណ្ណថ្លែងអំណរគុណ_{{ preg_replace("/\s+/", "_", $donorName) }}.png';
                link.href = canvas.toDataURL('image/png');
                link.click();
                btn.innerHTML = originalText;
                btn.disabled = false;
            }).catch(err => {
                alert('មានបញ្ហាក្នុងការទាញយករូបភាព សូមសាកល្បងបោះពុម្ពជា PDF ជំនួសវិញ។');
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        }
    </script>

</body>
</html>
