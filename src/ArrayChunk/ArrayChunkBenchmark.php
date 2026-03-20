<?php

declare(strict_types=1);

use Katas\ArrayChunk\ArrayChunk;

require_once __DIR__ . '/ArrayChunk.php';

$mode = $argv[1] ?? throw new \InvalidArgumentException("Missing mode");

/** @var array<int, array{0: array<int,int>, 1: positive-int}> $cases */
$cases = [
    [[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15], 5],
    [[1, 2, 3, 4, 5], 3],
    [[1, 2, 3, 4, 5], 2],
    [[1, 2, 3, 4, 5, 6], 2],
    [[1, 2, 3, 4], 2],
    [[1, 2, 3, 4, 5], 6],
    [[1, 2, 3, 4, 5], 5],
];

$iterations = 20_000;

$fn = match ($mode) {
    'built-in' => ArrayChunk::viaBuiltin(...),
    'recursion' => ArrayChunk::viaRecursion(...),
    'foreach' => ArrayChunk::viaForeach(...),
    'slice' => ArrayChunk::viaSlice(...),
    default => throw new \InvalidArgumentException("Unknown mode: $mode"),
};

while ($iterations--) {
    foreach ($cases as [$array, $size]) {
        /** @var array<int,int> $array */
        /** @var positive-int $size */
        $fn($array, $size);
    }
}
