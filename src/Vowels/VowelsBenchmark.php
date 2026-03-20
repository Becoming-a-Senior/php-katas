<?php

declare(strict_types=1);

use Katas\Vowels\Vowels;

require_once __DIR__ . '/Vowels.php';

$mode = $argv[1] ?? throw new \InvalidArgumentException("Missing mode");

/** @var array<int, string> $cases */
$cases = [
    'Hello World',
    'aeiouAEIOU',
    'bcdfghjklmnpqrstvwxyz',
    'The quick brown fox jumps over the lazy dog',
    'PHP is a great language',
    '',
    'aaaaaaaaaaaaaaaaaaaaa',
    'BCDFGHJKLMNPQRSTVWXYZ',
];

$iterations = 20_000;

$fn = match ($mode) {
    'regex' => Vowels::viaRegex(...),
    'iteration' => Vowels::viaIteration(...),
    default => throw new \InvalidArgumentException("Unknown mode: $mode"),
};

while ($iterations--) {
    foreach ($cases as $input) {
        $fn($input);
    }
}
