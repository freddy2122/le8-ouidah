<?php

namespace App\Support;

use Carbon\Carbon;

class Pricing
{
    public static function nights(Carbon|string $checkIn, Carbon|string $checkOut): int
    {
        $checkIn = Carbon::parse($checkIn)->startOfDay();
        $checkOut = Carbon::parse($checkOut)->startOfDay();

        return max(0, $checkIn->diffInDays($checkOut));
    }

    public static function breakdown(int $pricePerNightXof, int $nights): array
    {
        $total = $pricePerNightXof * $nights;
        $depositPercent = (int) config('le8.cancellation_policy.deposit_percent', 50);
        $deposit = (int) round($total * $depositPercent / 100);
        $balance = $total - $deposit;

        return [
            'price_per_night_xof' => $pricePerNightXof,
            'nights' => $nights,
            'total_xof' => $total,
            'deposit_percent' => $depositPercent,
            'deposit_xof' => $deposit,
            'balance_xof' => $balance,
        ];
    }

    public static function toEur(int $xof): float
    {
        return round($xof / (float) config('le8.currency.eur_rate_fixed'), 2);
    }

    public static function toNgn(int $xof): float
    {
        return round($xof * (float) config('le8.currency.ngn_rate_approx'), 0);
    }

    public static function formatXof(int $amount): string
    {
        return number_format($amount, 0, ',', ' ').' FCFA';
    }

    public static function formatEur(float $amount): string
    {
        return number_format($amount, 2, ',', ' ').' €';
    }

    public static function formatNgn(float $amount): string
    {
        return number_format($amount, 0, ',', ' ').' ₦';
    }
}
