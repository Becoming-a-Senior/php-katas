<?php

declare(strict_types=1);

namespace Katas\Palindrome;

final class Palindrome
{
    // --8<-- [start:viaReverse]
    public static function viaReverse(string $input): bool
    {
        $arr = str_split($input);
        return $arr === array_reverse($arr);
    }
    // --8<-- [end:viaReverse]

    // --8<-- [start:viaRecursion]
    public static function viaRecursion(string $input): bool
    {
        if ($input === '' || \strlen($input) === 1) {
            return true;
        }

        if ($input[0] !== substr($input, -1)) {
            return false;
        }

        return Palindrome::viaRecursion(substr($input, 1, -1));
    }
    // --8<-- [end:viaRecursion]
}
