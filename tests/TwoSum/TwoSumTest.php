<?php

declare(strict_types=1);

namespace Tests\TwoSum;

use Katas\TwoSum\TwoSum;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(TwoSum::class)]
class TwoSumTest extends TestCase
{
    /**
     * @return array<string, array<array<int, int>|int>>
     */
    public static function arrayDataProvider(): array
    {
        return [
            'find 2 + 7 in mixed set' => [[13,2,7,11,15,4], 9, [1,2]],
            'find 2 + 7 in mixed set, different keys' => [[2,7,11,15], 9, [0,1]],
            'find 2 + 4' => [[3,2,4], 6, [1,2]],
            'duplicate numbers' => [[3,3], 6, [0,1]],
            'unordered array match' => [[1,5,3,7], 8, [0,3]],
            'zero target with zeros' => [[0,4,3,0], 0, [0,3]],
            'negative numbers sum' => [[-1,-2,-3,-4,-5], -8, [2,4]],
        ];
    }

    /**
     * @param array<int, int> $numbers
     * @param int $sum
     * @param array<int, int> $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaBruteForce(
        array $numbers,
        int $sum,
        array $expected
    ): void {
        self::assertEquals($expected, TwoSum::viaBruteForce($numbers, $sum));
    }

    /**
     * @param array<int, int> $numbers
     * @param int $sum
     * @param array<int, int> $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaFilterReverse(
        array $numbers,
        int $sum,
        array $expected
    ): void {
        self::assertEquals($expected, TwoSum::viaFilterReverse($numbers, $sum));
    }
}
