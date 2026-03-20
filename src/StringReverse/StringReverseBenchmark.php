<?php

declare(strict_types=1);

use Katas\StringReverse\StringReverse;

require_once __DIR__ . '/StringReverse.php';

$mode = $argv[1] ?? throw new \InvalidArgumentException("Missing mode");

/** @var array<int, string> $cases */
$cases = [
    'Hello World',
    'The quick brown fox jumps over the lazy dog',
    'racecar',
    '',
    'a',
    'abcdefghijklmnopqrstuvwxyz',
    'PHP is a great language',
    'Was it a car or a cat I saw',
];

$iterations = 20_000;

$fn = match ($mode) {
    'built-in' => StringReverse::viaBuiltIn(...),
    'split' => StringReverse::viaSplit(...),
    default => throw new \InvalidArgumentException("Unknown mode: $mode"),
};

while ($iterations--) {
    foreach ($cases as $input) {
        $fn($input);
    }
}
