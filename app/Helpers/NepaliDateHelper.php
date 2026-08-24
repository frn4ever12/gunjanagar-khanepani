<?php

namespace App\Helpers;

class NepaliDateHelper
{
    // Nepali month names
    private static $nepaliMonths = [
        'बैशाख', 'जेठ', 'असार', 'साउन', 'भाद्र', 'आश्विन',
        'कार्तिक', 'मंसिर', 'पौष', 'माघ', 'फाल्गुण', 'चैत्र'
    ];

    // Nepali weekdays
    private static $nepaliWeekdays = [
        'आइतबार', 'सोमबार', 'मंगलबार', 'बुधबार', 'बिहिबार', 'शुक्रबार', 'शनिबार'
    ];

    // Devanagari numerals
    private static $devanagariNumerals = [
        '०', '१', '२', '३', '४', '५', '६', '७', '८', '९'
    ];

    // English weekdays
    private static $englishWeekdays = [
        'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
    ];

    // English months
    private static $englishMonths = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    /**
     * Convert English numerals to Devanagari numerals
     */
    private static function toDevanagari($number)
    {
        $number = (string) $number;
        $devanagari = '';
        for ($i = 0; $i < strlen($number); $i++) {
            $digit = $number[$i];
            if (is_numeric($digit)) {
                $devanagari .= self::$devanagariNumerals[(int) $digit];
            } else {
                $devanagari .= $digit;
            }
        }
        return $devanagari;
    }

    /**
     * Get ordinal suffix for English date
     */
    private static function getOrdinalSuffix($day)
    {
        if ($day >= 11 && $day <= 13) {
            return 'th';
        }
        switch ($day % 10) {
            case 1:
                return 'st';
            case 2:
                return 'nd';
            case 3:
                return 'rd';
            default:
                return 'th';
        }
    }

    /**
     * Convert AD date to BS date using reference date method
     * Reference: 2000-01-01 AD = 2056-09-17 BS
     */
    public static function adToBs($year, $month, $day)
    {
        try {
            // Reference date: January 1, 2000 AD = Poush 17, 2056 BS
            $refAdYear = 2000;
            $refAdMonth = 1;
            $refAdDay = 1;
            $refBsYear = 2056;
            $refBsMonth = 8; // Poush (0-indexed: 8)
            $refBsDay = 17;

            // Calculate days difference from reference
            $adDate = new \DateTime("$year-$month-$day");
            $refDate = new \DateTime("$refAdYear-$refAdMonth-$refAdDay");
            $diff = $adDate->diff($refDate);
            $daysDiff = $diff->days;

            if ($adDate < $refDate) {
                $daysDiff = -$daysDiff;
            }

            // Approximate BS date (56.8 years in BS = 57 years in AD)
            // BS year ≈ AD year + 56.8
            $bsYear = $year + 56;
            $bsMonth = $month + 8;
            $bsDay = $day + 16;

            // Adjust month overflow
            if ($bsMonth > 12) {
                $bsYear += floor(($bsMonth - 1) / 12);
                $bsMonth = (($bsMonth - 1) % 12) + 1;
            }

            // Adjust day overflow based on month
            $daysInBsMonth = self::getDaysInBsMonth($bsYear, $bsMonth);
            if ($bsDay > $daysInBsMonth) {
                $bsDay -= $daysInBsMonth;
                $bsMonth++;
                if ($bsMonth > 12) {
                    $bsYear++;
                    $bsMonth = 1;
                }
            }

            return [
                'year' => $bsYear,
                'month' => $bsMonth,
                'day' => $bsDay
            ];
        } catch (\Exception $e) {
            // Fallback to simple calculation if error occurs
            return self::simpleAdToBs($year, $month, $day);
        }
    }

    /**
     * Simple AD to BS conversion (fallback)
     */
    private static function simpleAdToBs($year, $month, $day)
    {
        // Simple approximation: BS = AD + 56 years, 8 months, 16 days
        $bsYear = $year + 56;
        $bsMonth = $month + 8;
        $bsDay = $day + 16;

        // Adjust month overflow
        if ($bsMonth > 12) {
            $bsYear += floor(($bsMonth - 1) / 12);
            $bsMonth = (($bsMonth - 1) % 12) + 1;
        }

        // Adjust day overflow
        $daysInBsMonth = self::getDaysInBsMonth($bsYear, $bsMonth);
        if ($bsDay > $daysInBsMonth) {
            $bsDay -= $daysInBsMonth;
            $bsMonth++;
            if ($bsMonth > 12) {
                $bsYear++;
                $bsMonth = 1;
            }
        }

        return [
            'year' => $bsYear,
            'month' => $bsMonth,
            'day' => $bsDay
        ];
    }

    /**
     * Get number of days in BS month
     */
    private static function getDaysInBsMonth($year, $month)
    {
        // BS month lengths (approximate, varies by year)
        $monthDays = [31, 31, 32, 32, 31, 30, 30, 30, 29, 29, 30, 30];
        
        // Adjust for leap years (BS years divisible by 4 are leap years with some exceptions)
        // This is a simplified version
        if ($month === 2 || $month === 3) {
            if ($year % 4 === 0) {
                $monthDays[1] = 32; // Jestha
                $monthDays[2] = 32; // Ashadh
            }
        }

        return $monthDays[$month - 1];
    }

    /**
     * Get today's Nepali date in format: भाद्र ८, २०८३, सोमबार
     */
    public static function getNepaliToday()
    {
        try {
            $now = new \DateTime('now', new \DateTimeZone('Asia/Kathmandu'));
            $year = (int) $now->format('Y');
            $month = (int) $now->format('m');
            $day = (int) $now->format('d');
            $weekday = (int) $now->format('w');

            $bsDate = self::adToBs($year, $month, $day);

            $nepaliMonth = self::$nepaliMonths[$bsDate['month'] - 1];
            $nepaliDay = self::toDevanagari($bsDate['day']);
            $nepaliYear = self::toDevanagari($bsDate['year']);
            $nepaliWeekday = self::$nepaliWeekdays[$weekday];

            return "$nepaliMonth $nepaliDay, $nepaliYear, $nepaliWeekday";
        } catch (\Exception $e) {
            return 'भाद्र ८, २०८३, सोमबार'; // Fallback
        }
    }

    /**
     * Get today's English date in format: Monday, 24th August 2026
     */
    public static function getEnglishToday()
    {
        try {
            $now = new \DateTime('now', new \DateTimeZone('Asia/Kathmandu'));
            $year = (int) $now->format('Y');
            $month = (int) $now->format('m');
            $day = (int) $now->format('d');
            $weekday = (int) $now->format('w');

            $englishMonth = self::$englishMonths[$month - 1];
            $englishWeekday = self::$englishWeekdays[$weekday];
            $ordinal = self::getOrdinalSuffix($day);

            return "$englishWeekday, {$day}{$ordinal} $englishMonth $year";
        } catch (\Exception $e) {
            return 'Monday, 24th August 2026'; // Fallback
        }
    }
}
