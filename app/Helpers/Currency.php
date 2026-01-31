<?php

namespace App\Helpers;

class Currency
{
    public static function rupiah($value): string
    {
        if (!$value) return 'Rp 0';

        return 'Rp ' . number_format($value, 0, ',', '.');
    }

    public static function plain($value): int
    {
        return (int) preg_replace('/[^0-9]/', '', $value);
    }
}
