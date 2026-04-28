<?php

if (!function_exists('currency')) {
    function currency($value = null, bool $toDatabase = false): string
    {
        if ($toDatabase) {
            return str_replace(',', '.', str_replace('.', '', $value));
        }

        return number_format((float) $value, 2, ',', '.');
    }
}

if (!function_exists('formatDate')) {
    function formatDate(?string $date = null, string $format = 'd/m/Y'): string
    {
        if (empty($date)) {
            return now()->setTimezone('America/Fortaleza')->format($format);
        }

        return \Carbon\Carbon::parse($date)->setTimezone('America/Fortaleza')->format($format);
    }
}

if (!function_exists('product_value')) {
    function product_value(int|float $value): int
    {
        if (!is_numeric($value) || $value <= 0) {
            return 0;
        }

        $min = max(1, (int) floor($value * 0.8));
        $max = (int) ceil($value * 1.2);

        return rand($min, $max);
    }
}

if (!function_exists('isArrayOfArrays')) {
    function isArrayOfArrays(array $array): bool
    {
        return count($array) !== count($array, COUNT_RECURSIVE);
    }
}

if (!function_exists('transformArray')) {
    function transformArray(array $array): array
    {
        if (empty($array)) {
            return [];
        }

        return array_map(fn ($item) => (object) $item, $array);
    }
}
