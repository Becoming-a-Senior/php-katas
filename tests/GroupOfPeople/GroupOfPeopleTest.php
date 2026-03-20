<?php

declare(strict_types=1);

namespace Tests\GroupOfPeople;

use Katas\GroupOfPeople\GroupOfPeople;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(GroupOfPeople::class)]
class GroupOfPeopleTest extends TestCase
{
    /**
     * @return array<string, array{list<int>, list<list<int>>}>
     */
    public static function arrayDataProvider(): array
    {
        return [
            'given groupSizes [3,3,3,3,3,1,3] then returns groups of sizes 3,3,1'
            => [[3, 3, 3, 3, 3, 1, 3], [[0, 1, 2], [3, 4, 6], [5]]],
            'given groupSizes [2,1,3,3,3,2] then returns groups of sizes 1,2,3'
            => [[2, 1, 3, 3, 3, 2], [[0, 5],[1], [2, 3, 4]]],
            'given groupSizes [1,1,1,1] then returns four solo groups'
            => [[1, 1, 1, 1], [[0], [1], [2], [3]]],
            'given groupSizes [4,4,4,4,1,1,2,2] then returns groups of sizes 4,1,1,2'
            => [[4, 4, 4, 4, 1, 1, 2, 2], [[0, 1, 2, 3], [4], [5], [6, 7]]],
            'given groupSizes [2,2,1,1,2,2] then returns groups of sizes 2,2,1,1'
            => [[2, 2, 1, 1, 2, 2], [[0, 1], [4, 5], [2], [3]]],
            'given groupSizes [3,3,3,1,2,2] then returns groups of sizes 3,1,2'
            => [[3, 3, 3, 1, 2, 2], [[0, 1, 2], [3], [4, 5]]],
            'given groupSizes [1,2,2,1,3,3,3] then returns groups of sizes 1,1,2,3'
            => [[1, 2, 2, 1, 3, 3, 3], [[0],[3], [1, 2], [4, 5, 6]]],
            'given groupSizes [2,2,2,2] then returns two groups of size 2'
            => [[2, 2, 2, 2], [[0, 1], [2, 3]]],
            'given groupSizes [1] then returns one solo group'
            => [[1], [[0]]],
            'given groupSizes [3,3,3,2,2,1] then returns groups of sizes 3,2,1'
            => [[3, 3, 3, 2, 2, 1], [[0, 1, 2], [3, 4], [5]]],
        ];
    }

    /**
     * @param array<int, int> $input
     * @param array<int, int|array<int,int>> $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaMerge(
        array $input,
        array $expected
    ): void {
        self::assertEquals($expected, GroupOfPeople::viaMerge($input));
    }

    /**
     * @param array<int, int> $input
     * @param array<int, int|array<int,int>> $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaForeach(
        array $input,
        array $expected
    ): void {
        self::assertEquals($expected, GroupOfPeople::viaForeach($input));
    }

    /**
     * @param array<int, int> $input
     * @param array<int, int|array<int,int>> $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaPush(
        array $input,
        array $expected
    ): void {
        self::assertEquals($expected, GroupOfPeople::viaPush($input));
    }
}
