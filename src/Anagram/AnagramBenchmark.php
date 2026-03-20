<?php

declare(strict_types=1);

use Katas\Anagram\Anagram;

require_once __DIR__ . '/Anagram.php';

$mode = $argv[1] ?? throw new \InvalidArgumentException("Missing mode");

srand(42);

// create long anagram
$longBase = str_repeat('abcdefghijklmnopqrstuvwxyz0123456789', 7);
$longShuffled = str_split($longBase);
shuffle($longShuffled);
$longAnagram = implode('', $longShuffled);

// long non anagram
$longNonAnagram = str_repeat('a', 126) . str_repeat('b', 126);

$cases = [
    ['', ''],
    ['backward', 'drawback'],
    ['Elvis', 'lives'],
    ['q', ''],
    ['Hello World!', 'Hello World!'],
    ['12 aabb', 'b a 1 a b 2'],
    ['eleven plus two', 'twelve plus one'],
    ['Hellooooo', 'Hello'],
    ['He ll o World!', 'Hel l o W o rld!'],
    ['word', 'word'],
    ['word', 'drow'],
    ['Lorem Ipsum', 'Lorem Ipsum'],
    ['Ipsum Lorem', 'Lorem Ipsum'],
    ['Hello World, Developer!', 'HelloWorld, Developer!'],
    ['WW!! World," "Dev!', '!!World .WW, ()( Dev!'],
    ['hello!', 'hello?'],
    ['äct', 'cät'],
    [$longBase, $longAnagram],
    [$longBase, $longNonAnagram]
];

$iterations = 20_000;

$fn = match ($mode) {
    'sort' => Anagram::viaSort(...),
    'freq' => Anagram::viaFreq(...),
    'foreach' => Anagram::viaForeach(...),
    'count' => Anagram::viaCount(...),
    'loop' => Anagram::viaLoop(...),
    default => throw new \InvalidArgumentException("Unknown mode: $mode"),
};

while ($iterations--) {
    foreach ($cases as [$word1, $word2]) {
        $fn($word1, $word2);
    }
}
