<?php

declare(strict_types=1);

namespace Katas\MergeIntervals;

final class MergeIntervals
{
    /**
     * @param array<int, array{0:int,1:int}> $intervals
     * @return array<int, array{0:int,1:int}>
     */
    public static function merge(array $intervals): array
    {
        if (\count($intervals) <= 1) {
            return $intervals;
        }

        usort($intervals, static fn ($a, $b) => $a[0] <=> $b[0]);

        $merged = [];
        $current = $intervals[0];

        foreach ($intervals as $interval) {
            if ($interval[0] <= $current[1]) {
                $current[1] = max($current[1], $interval[1]);
            } else {
                $merged[] = $current;
                $current = $interval;
            }
        }

        $merged[] = $current;

        return $merged;
    }
}
