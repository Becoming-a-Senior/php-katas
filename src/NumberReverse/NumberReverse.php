<?php

declare(strict_types=1);

namespace Katas\NumberReverse;

final class NumberReverse
{
    public static function shortcut(int $number): int
    {
        $sign = $number <=> 0;
        return $sign * (int) strrev((string) $number);
    }

    public static function get(int $number): int
    {
        $sign = $number <=> 0;
        if ($number > -10 && $number < 10) {
            return $number;
        }
        $reverse = '';
        $absNumber = \abs($number);

        do {
            $rest = $absNumber % 10;
            $reverse .= $rest;
            $absNumber = (int)($absNumber / 10);
        } while ($absNumber !== 0);

        return (int) $reverse * $sign;
    }
}
