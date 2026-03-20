<?php

declare(strict_types=1);

namespace Katas\ArrayChunk;

final class ArrayChunk
{
    // --8<-- [start:viaBuiltin]
    /**
     * @param array<int, int> $array
     * @param positive-int $size
     * @return array<int, array<int, int>>
     */
    public static function viaBuiltin(array $array, int $size): array
    {
        return array_chunk($array, $size);
    }
    // --8<-- [end:viaBuiltin]

    // --8<-- [start:viaForeach]
    /**
     * @param array<int, int> $array
     * @param positive-int $size
     * @return array<int, array<int, int>>
     */
    public static function viaForeach(array $array, int $size): array
    {
        $result = [];
        foreach ($array as $index => $value) {
            $result[(int) floor($index / $size)][] = $value;
        }
        return $result;
    }
    // --8<-- [end:viaForeach]

    // --8<-- [start:viaRecursion]
    /**
     * @param array<int, int> $array
     * @param positive-int $size
     * @return array<int, array<int, int>>
     */
    public static function viaRecursion(array $array, int $size): array
    {
        if (!$array) {
            return [];
        }
        return [array_slice($array, 0, $size), ...self::viaRecursion(array_slice($array, $size), $size)];
    }
    // --8<-- [end:viaRecursion]

    // --8<-- [start:viaSlice]
    /**
     * @param array<int, int> $array
     * @param positive-int $size
     * @return array<int, array<int, int>>
     */
    public static function viaSlice(array $array, int $size): array
    {
        $arr = [];
        for ($i = 0; $i < \count($array); $i += $size) {
            $arr[] = array_slice($array, $i, $size);
        }
        return $arr;
    }
    // --8<-- [end:viaSlice]
}
