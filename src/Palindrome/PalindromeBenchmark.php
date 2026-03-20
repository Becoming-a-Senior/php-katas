<?php

declare(strict_types=1);

use Katas\Palindrome\Palindrome;

require_once __DIR__ . '/Palindrome.php';

$mode = $argv[1] ?? throw new \InvalidArgumentException("Missing mode");

/** @var array<int, string> $cases */
$cases = [
    'racecar',
    'hello',
    'a',
    '',
    'madam',
    'abcdefghijklmnopqrstuvwxyzzyxwvutsrqponmlkjihgfedcba',
    'abcdefghijklmnopqrstuvwxyz',
    'noon',
    'level',
    'world',
];

$iterations = 20_000;

$fn = match ($mode) {
    'reverse' => Palindrome::viaReverse(...),
    'recursion' => Palindrome::viaRecursion(...),
    default => throw new \InvalidArgumentException("Unknown mode: $mode"),
};

while ($iterations--) {
    foreach ($cases as $input) {
        $fn($input);
    }
}
