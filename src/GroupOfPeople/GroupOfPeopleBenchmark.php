<?php

declare(strict_types=1);

use Katas\GroupOfPeople\GroupOfPeople;

require_once __DIR__ . '/GroupOfPeople.php';

$mode = $argv[1] ?? throw new \InvalidArgumentException("Missing mode");

/** @var array<int, array<int, int>> $cases */
$cases = [
    [3, 3, 3, 3, 3, 1, 3],
    [2, 1, 3, 3, 3, 2],
    [1, 1, 1, 1, 1],
    [5, 5, 5, 5, 5, 5, 5, 5, 5, 5],
    [2, 2, 2, 2, 4, 4, 4, 4],
    [1, 2, 3, 1, 2, 3, 1, 2, 3],
    [4, 4, 4, 4],
];

$iterations = 20_000;

$fn = match ($mode) {
    'merge' => GroupOfPeople::viaMerge(...),
    'foreach' => GroupOfPeople::viaForeach(...),
    'push' => GroupOfPeople::viaPush(...),
    default => throw new \InvalidArgumentException("Unknown mode: $mode"),
};

while ($iterations--) {
    foreach ($cases as $input) {
        $fn($input);
    }
}
