<?php

declare(strict_types=1);

namespace Katas\Vowels;

final class Vowels
{
    // --8<-- [start:vowels]
    private const array VOWELS = ['a','e','i','o','u','A','E','I','O','U'];
    // --8<-- [end:vowels]

    // --8<-- [start:viaRegex]
    public static function viaRegex(string $input): int
    {
        return mb_strlen(preg_replace('/[^aeiou]/i', '', $input) ?? '');
    }
    // --8<-- [end:viaRegex]

    // --8<-- [start:viaIteration]
    public static function viaIteration(string $input): int
    {
        $count = 0;
        foreach (mb_str_split($input) as $char) {
            if (\in_array($char, self::VOWELS, strict: true)) {
                $count++;
            }
        }
        return $count;
    }
    // --8<-- [end:viaIteration]
}
