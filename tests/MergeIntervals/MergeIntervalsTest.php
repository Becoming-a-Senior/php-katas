<?php

declare(strict_types=1);

namespace Tests\MergeIntervals;

use Katas\MergeIntervals\MergeIntervals;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(MergeIntervals::class)]
class MergeIntervalsTest extends TestCase
{
    /**
     * @return array<string, array{0:array<int,array{0:int,1:int}>,1:array<int,array{0:int,1:int}>}>
     */
    public static function intervalProvider(): array
    {
        return [
            'simple overlap' => [
                [[1,3],[2,6],[8,10],[15,18]],
                [[1,6],[8,10],[15,18]]
            ],

            'touching intervals' => [
                [[1,4],[4,5]],
                [[1,5]]
            ],

            'no overlap' => [
                [[1,2],[3,4],[5,6]],
                [[1,2],[3,4],[5,6]]
            ],

            'single interval' => [
                [[4,7],[1,4]],
                [[1,7]]
            ],

            'nested intervals' => [
                [[1,10],[2,3],[4,8]],
                [[1,10]]
            ],
            'random intervals' => [
                [[15,18],[6,10],[2,11]],
                [[2,11],[15,18]]
            ],
        ];
    }

    /**
     * @param array<int,array{0:int,1:int}> $input
     * @param array<int,array{0:int,1:int}> $expected
     */
    #[DataProvider('intervalProvider')]
    public function testMerge(
        array $input,
        array $expected
    ): void {
        self::assertEquals($expected, MergeIntervals::merge($input));
    }
}
