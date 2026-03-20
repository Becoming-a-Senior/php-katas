<?php

declare(strict_types=1);

namespace Tests\ArrayChunk;

use Katas\ArrayChunk\ArrayChunk;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ArrayChunk::class)]
class ArrayChunkTest extends TestCase
{
    /**
     * @return array<string, array{0: array<int, int>, 1: positive-int, 2: array<int, array<int, int>>}>
     */
    public static function arrayDataProvider(): array
    {
        return [
            'given 15 elements when chunked by 5 then returns 5,5,5' => [
                [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
                5,
                [[1, 2, 3, 4, 5], [6, 7, 8, 9, 10], [11, 12, 13, 14, 15]]
            ],

            'given 5 elements when chunked by 3 then returns 3 and 2' =>
                [[1, 2, 3, 4, 5], 3, [[1, 2, 3], [4, 5]]],

            'given 5 elements when chunked by 2 then returns 2,2,1' =>
                [[1, 2, 3, 4, 5], 2, [[1, 2], [3, 4], [5]]],

            'given 6 elements when chunked by 2 then returns 2,2,2' =>
                [[1, 2, 3, 4, 5, 6], 2, [[1, 2], [3, 4], [5, 6]]],

            'given 4 elements when chunked by 2 then returns 2 and 2' =>
                [[1, 2, 3, 4], 2, [[1, 2], [3, 4]]],

            'given 5 elements when chunked by 6 then returns 5' =>
                [[1, 2, 3, 4, 5], 6, [[1, 2, 3, 4, 5]]],

            'given 5 elements when chunked by 5 then returns 5' =>
                [[1, 2, 3, 4, 5], 5, [[1, 2, 3, 4, 5]]]
        ];
    }

    /**
     * @param array<int, int> $array
     * @param positive-int $size
     * @param array<int, array<int, int>> $expected
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaBuiltin(
        array $array,
        int $size,
        array $expected
    ): void {
        self::assertEquals($expected, ArrayChunk::viaBuiltin($array, $size));
    }

    /**
     * @param array<int, int> $array
     * @param positive-int $size
     * @param array<int, array<int, int>> $expected
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaForeach(
        array $array,
        int $size,
        array $expected
    ): void {
        self::assertEquals($expected, ArrayChunk::viaForeach($array, $size));
    }

    /**
     * @param array<int, int> $array
     * @param positive-int $size
     * @param array<int, array<int, int>> $expected
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaNestedLoop(
        array $array,
        int $size,
        array $expected
    ): void {
        self::assertEquals($expected, ArrayChunk::viaRecursion($array, $size));
    }

    /**
     * @param array<int, int> $array
     * @param positive-int $size
     * @param array<int, array<int, int>> $expected
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaSlice(
        array $array,
        int $size,
        array $expected
    ): void {
        self::assertEquals($expected, ArrayChunk::viaSlice($array, $size));
    }
}
