<?php

declare(strict_types=1);

namespace Katas\GroupOfPeople;

final class GroupOfPeople
{
    // --8<-- [start:viaMerge]
    /**
     * @param array<int, int> $input
     * @return list<list<int>>
     */
    public static function viaMerge(array $input): array
    {
        $char = [];
        $result = [];
        foreach ($input as $key => $value) {
            $char[$value][] = $key;
        }
        foreach ($char as $size => $arr) {
            if ($size <= 0) {
                continue;
            }
            $result[] = array_chunk($arr, $size);
        }
        return array_merge(...$result);
    }
    // --8<-- [end:viaMerge]


    // --8<-- [start:viaForeach]
    /**
     * @param array<int, int> $input
     * @return list<list<int>>
     */
    public static function viaForeach(array $input): array
    {
        $char = [];
        $result = [];
        foreach ($input as $key => $value) {
            $char[$value][] = $key;
        }
        foreach ($char as $size => $arr) {
            if ($size <= 0) {
                continue;
            }
            foreach (array_chunk($arr, $size) as $chunk) {
                $result[] = $chunk;
            }
        }
        return $result;
    }
    // --8<-- [end:viaForeach]


    // --8<-- [start:viaPush]
    /**
     * @param array<int, int> $input
     * @return list<list<int>>
     */
    public static function viaPush(array $input): array
    {
        $char = [];
        $result = [];
        foreach ($input as $key => $value) {
            $char[$value][] = $key;
        }
        foreach ($char as $size => $arr) {
            if ($size <= 0) {
                continue;
            }
            array_push($result, ...array_chunk($arr, $size));
        }
        return $result;
    }
    // --8<-- [end:viaPush]
}
