<?php

declare(strict_types=1);

namespace Katas\Anagram;

final class Anagram
{
    // --8<-- [start:viaSort]
    public static function viaSort(string $word1, string $word2): bool
    {
        $a = self::clean($word1);
        $b = self::clean($word2);

        if (\strlen($a) !== \strlen($b)) {
            return false;
        }

        return self::sorted($a) === self::sorted($b);
    }

    private static function sorted(string $str): string
    {
        $chars = mb_str_split($str);
        sort($chars);
        return \implode('', $chars);
    }
    // --8<-- [end:viaSort]

    // --8<-- [start:viaFreq]
    public static function viaFreq(string $word1, string $word2): bool
    {
        $a = self::clean($word1);
        $b = self::clean($word2);

        if (\strlen($a) !== \strlen($b)) {
            return false;
        }

        return self::freqMap($a) === self::freqMap($b);
    }

    /**
     * @return array<string, int>
     */
    private static function freqMap(string $str): array
    {
        $freq = [];
        \array_map(function ($char) use (&$freq) {
            $freq[$char] = ($freq[$char] ?? 0) + 1;
        }, mb_str_split($str));
        \ksort($freq);
        return $freq;
    }
    // --8<-- [end:viaFreq]

    // --8<-- [start:viaForeach]
    public static function viaForeach(string $word1, string $word2): bool
    {
        $a = self::clean($word1);
        $b = self::clean($word2);

        if (\strlen($a) !== \strlen($b)) {
            return false;
        }

        return self::foreachMap($a) === self::foreachMap($b);
    }

    /**
     * @return array<string, int>
     */
    private static function foreachMap(string $str): array
    {
        $freq = [];
        foreach (mb_str_split($str) as $char) {
            $freq[$char] = ($freq[$char] ?? 0) + 1;
        }
        \ksort($freq);
        return $freq;
    }
    // --8<-- [end:viaForeach]

    // --8<-- [start:viaCount]
    public static function viaCount(string $word1, string $word2): bool
    {
        $a = self::clean($word1);
        $b = self::clean($word2);

        if (\strlen($a) !== \strlen($b)) {
            return false;
        }

        return \count_chars($a, 1) === \count_chars($b, 1);
    }
    // --8<-- [end:viaCount]

    // --8<-- [start:viaLoop]
    public static function viaLoop(string $word1, string $word2): bool
    {
        $a = self::clean($word1);
        $b = self::clean($word2);

        if (\strlen($a) !== \strlen($b)) {
            return false;
        }

        $freq1 = self::loopMap($a);
        $freq2 = self::loopMap($b);

        foreach ($freq1 as $char => $count) {
            if (!isset($freq2[$char]) || $freq2[$char] !== $count) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return array<string, int>
     */
    private static function loopMap(string $str): array
    {
        $length = \strlen($str);
        $freq   = [];
        for ($i = 0; $i < $length; $i++) {
            $char        = $str[$i];
            $freq[$char] = ($freq[$char] ?? 0) + 1;
        }
        return $freq;
    }
    // --8<-- [end:viaLoop]

    // --8<-- [start:clean]
    private static function clean(string $str): string
    {
        return preg_replace('/[^a-z0-9]+/', '', mb_strtolower($str, 'UTF-8')) ?? '';
    }
    // --8<-- [end:clean]
}
