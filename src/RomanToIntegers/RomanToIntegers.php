<?php

declare(strict_types=1);

namespace Katas\RomanToIntegers;

final class RomanToIntegers
{
    /** @var array<string, int> */
    private const array MAP = [
        'I' => 1, 'V' => 5, 'X' => 10, 'L' => 50,
        'C' => 100, 'D' => 500, 'M' => 1000,
    ];

    public static function viaSubtraction(string $input): int
    {
        $sum = 0;
        $prev = 0;
        foreach (str_split($input) as $char) {
            $current = self::MAP[$char];
            $sum += $current - (($current > $prev) ? $prev * 2 : 0);
            $prev = $current;
        }

        return $sum;
    }

    public static function viaReversePass(string $input): int
    {
        $sum = 0;
        $prev = 0;
        for ($i = \strlen($input) - 1; $i >= 0; $i--) {
            $current = self::MAP[$input[$i]];
            if ($current >= $prev) {
                $sum += $current;
            } else {
                $sum -= $current;
            }
            $prev = $current;
        }
        return $sum;
    }

    public static function viaStrReplace(string $input): int
    {
        static $pairs = [
            'M' => '1000,', 'CM' => '900,', 'D' => '500,', 'CD' => '400,',
            'C' => '100,',  'XC' => '90,',  'L' => '50,',  'XL' => '40,',
            'X' => '10,',   'IX' => '9,',   'V' => '5,',   'IV' => '4,',
            'I' => '1,',
        ];

        return array_reduce(
            \explode(',', strtr($input, $pairs)),
            fn($carry, $item) => $carry + (int)$item,
            0
        );
    }
}
