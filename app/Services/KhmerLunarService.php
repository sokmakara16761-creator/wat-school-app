<?php

namespace App\Services;

use Carbon\Carbon;

class KhmerLunarService
{
    protected static array $khmerNumbers = ['០', '១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩'];
    
    protected static array $khmerDays = [
        0 => 'អាទិត្យ',
        1 => 'ច័ន្ទ',
        2 => 'អង្គារ',
        3 => 'ពុធ',
        4 => 'ព្រហស្បតិ៍',
        5 => 'សុក្រ',
        6 => 'សៅរ៍',
    ];

    protected static array $khmerMonths = [
        1 => 'មករា',
        2 => 'កុម្ភៈ',
        3 => 'មីនា',
        4 => 'មេសា',
        5 => 'ឧសភា',
        6 => 'មិថុនា',
        7 => 'កក្កដា',
        8 => 'សីហា',
        9 => 'កញ្ញា',
        10 => 'តុលា',
        11 => 'វិច្ឆិកា',
        12 => 'ធ្នូ',
    ];

    protected static array $lunarMonths = [
        1 => 'មិគសិរ',
        2 => 'បុស្ស',
        3 => 'មាឃ',
        4 => 'ផល្គុន',
        5 => 'ចេត្រ',
        6 => 'ពិសាខ',
        7 => 'ជេស្ឋ',
        8 => 'អាសាឍ',
        9 => 'ស្រាពណ៍',
        10 => 'ភទ្របទ',
        11 => 'អស្សុជ',
        12 => 'កត្តិក',
    ];

    protected static array $zodiacYears = [
        0 => 'ជូត (កណ្ដុរ)',
        1 => 'ឆ្លូវ (គោ)',
        2 => 'ខាល (ខ្លា)',
        3 => 'ថោះ (ទន្សាយ)',
        4 => 'រោង (នាគ)',
        5 => 'ម្សាញ់ (ពស់)',
        6 => 'មមី (សេះ)',
        7 => 'មមែ (ពពែ)',
        8 => 'វក (ស្វា)',
        9 => 'រកា (មាន់)',
        10 => 'ច (ឆ្កែ)',
        11 => 'កុរ (ជ្រូក)',
    ];

    protected static array $saks = [
        1 => 'ឯកស័ក',
        2 => 'ទោស័ក',
        3 => 'ត្រីស័ក',
        4 => 'ចត្វាស័ក',
        5 => 'បញ្ចស័ក',
        6 => 'ឆស័ក',
        7 => 'សប្តស័ក',
        8 => 'អដ្ឋស័ក',
        9 => 'នព្វស័ក',
        10 => 'សំរឹទ្ធិស័ក',
    ];

    /**
     * Convert Arabic number to Khmer numeral string
     */
    public static function toKhmerNumber(int|string $number): string
    {
        $numStr = (string)$number;
        $result = '';
        for ($i = 0; $i < strlen($numStr); $i++) {
            $char = $numStr[$i];
            if (is_numeric($char)) {
                $result .= self::$khmerNumbers[(int)$char];
            } else {
                $result .= $char;
            }
        }
        return $result;
    }

    /**
     * Get Buddhist Era (ពុទ្ធសករាជ)
     * Buddhist era is Gregorian Year + 544 (or +543 depending on Visakha Bochea).
     */
    public static function getBuddhistEra(?Carbon $date = null): int
    {
        $date = $date ?? Carbon::now('Asia/Phnom_Penh');
        // Visakha Bochea usually falls in May. After Visakha, BE advances.
        if ($date->month >= 5) {
            return $date->year + 544;
        }
        return $date->year + 543;
    }

    /**
     * Calculate approximate Khmer Lunar Date for a given date
     */
    public static function getLunarDateInfo(?Carbon $date = null): array
    {
        $date = $date ?? Carbon::now('Asia/Phnom_Penh');
        
        // Base known epoch: New Moon of Phalkun (start of month)
        // Average synodic month = 29.53058867 days
        // Reference: Jan 11, 2024 was approx 1st day of Boh waxing moon
        $refEpoch = Carbon::create(2024, 1, 11, 0, 0, 0, 'Asia/Phnom_Penh');
        $daysDiff = $refEpoch->floatDiffInDays($date, false);
        
        $synodicMonth = 29.53058867;
        $lunarAge = fmod(($daysDiff % $synodicMonth + $synodicMonth), $synodicMonth);
        
        $dayInLunarMonth = (int)floor($lunarAge) + 1; // 1 to 30
        
        $isWaxing = $dayInLunarMonth <= 15;
        $phaseDay = $isWaxing ? $dayInLunarMonth : ($dayInLunarMonth - 15);
        $phaseName = $isWaxing ? 'កើត' : 'រោច';
        
        // Month index estimation (1: Mikhase, ..., 6: Visakh, ..., 12: Kattik)
        $monthOffset = (int)floor($daysDiff / $synodicMonth);
        $lunarMonthIndex = (($monthOffset + 1) % 12 + 12) % 12;
        if ($lunarMonthIndex === 0) $lunarMonthIndex = 12;
        $lunarMonthName = self::$lunarMonths[$lunarMonthIndex] ?? 'ពិសាខ';

        // Zodiac year calculation (Base: 2024 is Year of the Dragon - រោង)
        $zodiacIndex = ($date->year - 4) % 12;
        $zodiacName = self::$zodiacYears[$zodiacIndex] ?? 'រោង (នាគ)';

        // Sak calculation (Base: 2024 is Chhasak ឆស័ក, 2025 is Sabtasak សប្តស័ក, 2026 is Atthasak អដ្ឋស័ក)
        $sakIndex = ($date->year - 1983) % 10;
        if ($sakIndex <= 0) $sakIndex += 10;
        $sakName = self::$saks[$sakIndex] ?? 'ឆស័ក';

        $be = self::getBuddhistEra($date);
        $beKh = self::toKhmerNumber($be);

        $dayOfWeek = self::$khmerDays[$date->dayOfWeek] ?? 'ច័ន្ទ';
        $solarDayKh = self::toKhmerNumber($date->day);
        $solarMonthKh = self::$khmerMonths[$date->month] ?? 'មករា';
        $solarYearKh = self::toKhmerNumber($date->year);

        // Check if today is a Sil day (ថ្ងៃសីល)
        // Sil days: 8 កើត, 15 កើត, 8 រោច, 14/15 រោច
        $isSilDay = false;
        $silDayType = null;
        if ($isWaxing && $phaseDay === 8) {
            $isSilDay = true;
            $silDayType = 'សីល ៨ កើត';
        } elseif ($isWaxing && $phaseDay === 15) {
            $isSilDay = true;
            $silDayType = 'សីល ១៥ កើត (ពេញបូណ៌មី 🌕)';
        } elseif (!$isWaxing && $phaseDay === 8) {
            $isSilDay = true;
            $silDayType = 'សីល ៨ រោច';
        } elseif (!$isWaxing && ($phaseDay === 14 || $phaseDay === 15)) {
            $isSilDay = true;
            $silDayType = 'សីល ដាច់ខែ (អាមាវាសី 🌑)';
        }

        // Calculate next upcoming Sil day
        $nextSil = self::calculateNextSilDay($date, $isWaxing, $phaseDay);

        $fullKhmerDate = "ថ្ងៃ{$dayOfWeek} {$solarDayKh} {$solarMonthKh} ឆ្នាំ{$solarYearKh}";
        $fullLunarDate = "ថ្ងៃ{$dayOfWeek} " . self::toKhmerNumber($phaseDay) . "{$phaseName} ខែ{$lunarMonthName} ឆ្នាំ{$zodiacName} {$sakName} ពុទ្ធសករាជ {$beKh}";

        return [
            'solar_date_kh' => $fullKhmerDate,
            'lunar_date_kh' => $fullLunarDate,
            'day_of_week' => $dayOfWeek,
            'buddhist_era' => $be,
            'buddhist_era_kh' => $beKh,
            'zodiac_year' => $zodiacName,
            'sak' => $sakName,
            'lunar_month' => $lunarMonthName,
            'phase_name' => $phaseName,
            'phase_day' => $phaseDay,
            'phase_day_kh' => self::toKhmerNumber($phaseDay),
            'is_waxing' => $isWaxing,
            'is_sil_day' => $isSilDay,
            'sil_day_type' => $silDayType,
            'next_sil' => $nextSil,
        ];
    }

    /**
     * Calculate next Sil Day and remaining days countdown
     */
    protected static function calculateNextSilDay(Carbon $today, bool $isWaxing, int $phaseDay): array
    {
        // Sil milestones in month: [8 (wax), 15 (wax), 23 (8 wane), 29/30 (14/15 wane)]
        $currentDay = $isWaxing ? $phaseDay : ($phaseDay + 15);
        $milestones = [
            8 => ['name' => 'សីល ៨ កើត', 'phase' => '៨ កើត'],
            15 => ['name' => 'សីល ១៥ កើត (ពេញបូណ៌មី 🌕)', 'phase' => '១៥ កើត'],
            23 => ['name' => 'សីល ៨ រោច', 'phase' => '៨ រោច'],
            30 => ['name' => 'សីល ១៥ រោច (ដាច់ខែ 🌑)', 'phase' => '១៥ រោច'],
        ];

        $daysRemaining = 0;
        $targetName = '';
        $targetPhase = '';

        foreach ($milestones as $milestoneDay => $info) {
            if ($milestoneDay > $currentDay) {
                $daysRemaining = $milestoneDay - $currentDay;
                $targetName = $info['name'];
                $targetPhase = $info['phase'];
                break;
            }
        }

        if ($daysRemaining === 0) {
            // It wraps around to next month's 8 waxing (day 8)
            $daysRemaining = (30 - $currentDay) + 8;
            $targetName = 'សីល ៨ កើត';
            $targetPhase = '៨ កើត';
        }

        $nextDate = $today->copy()->addDays($daysRemaining);
        $nextDayOfWeek = self::$khmerDays[$nextDate->dayOfWeek] ?? 'ច័ន្ទ';
        $nextDateKh = "ថ្ងៃ{$nextDayOfWeek} ទី" . self::toKhmerNumber($nextDate->day) . " " . self::$khmerMonths[$nextDate->month];

        return [
            'days_remaining' => $daysRemaining,
            'days_remaining_kh' => self::toKhmerNumber($daysRemaining),
            'sil_name' => $targetName,
            'phase' => $targetPhase,
            'target_date_kh' => $nextDateKh,
            'target_iso' => $nextDate->toDateString(),
        ];
    }
}
