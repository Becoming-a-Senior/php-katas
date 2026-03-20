<?php

declare(strict_types=1);

use Katas\TwoSum\TwoSum;

require_once __DIR__ . '/TwoSum.php';

$mode = $argv[1] ?? throw new \InvalidArgumentException("Missing mode");

/** @var array<int, array{0: array<int,int>, 1: int}> $cases */
$cases = [
    [[2, 7, 11, 15], 9],
    [[3, 2, 4], 6],
    [[3, 3], 6],
    [[1, 2, 3, 4, 5, 6, 7, 8, 9, 10], 19],
    [[-1, -2, -3, -4, -5], -8],
    [[0, 4, 3, 0], 0],
    [[1, 5, 8, 3, 9, 2], 11],
];

$iterations = 20_000;

$fn = match ($mode) {
    'brute-force' => TwoSum::viaBruteForce(...),
    'filter-reverse' => TwoSum::viaFilterReverse(...),
    default => throw new \InvalidArgumentException("Unknown mode: $mode"),
};

while ($iterations--) {
    foreach ($cases as [$numbers, $sum]) {
        $fn($numbers, $sum);
    }
}
