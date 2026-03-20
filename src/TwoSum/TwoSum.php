<?php

declare(strict_types=1);

namespace Katas\TwoSum;

final class TwoSum
{
    // --8<-- [start:viaBruteForce]
    /**
     * @param array<int, int> $numbers
     * @param int $sum
     * @return array<int, int>
     */
    public static function viaBruteForce(array $numbers, int $sum): array
    {
        for ($i = 0; $i <= count($numbers) - 1; $i++) {
            for ($j = $i + 1; $j <= count($numbers) - 1; $j++) {
                if ($sum === $numbers[$i] + $numbers[$j]) {
                    return [$i, $j];
                }
            }
        }
        return [];
    }
    // --8<-- [end:viaBruteForce]

    // --8<-- [start:viaFilterReverse]
    /**
     * @param array<int, int> $numbers
     * @param int $sum
     * @return array<int, int>
     */
    public static function viaFilterReverse(array $numbers, int $sum): array
    {
        $filtered = array_filter($numbers, function ($number) use ($sum): bool {
            return ($sum > 0) ? $number <= $sum : $number >= $sum;
        });

        $reversed = array_reverse($filtered, true);

        foreach ($filtered as $key => $number) {
            \array_pop($reversed);
            foreach ($reversed as $nextKey => $nextVal) {
                if ($sum === $number + $nextVal) {
                    return [$key, $nextKey];
                }
            }
        }
        return [];
    }
    // --8<-- [end:viaFilterReverse]
}
