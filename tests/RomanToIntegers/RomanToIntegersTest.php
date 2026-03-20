<?php

declare(strict_types=1);

namespace Tests\RomanToIntegers;

use Katas\RomanToIntegers\RomanToIntegers;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(RomanToIntegers::class)]
class RomanToIntegersTest extends TestCase
{
    /**
     * @return array<string, array<string|int>>
     */
    public static function arrayDataProvider(): array
    {
        return [
            'XLIX -> 49' => ['XLIX', 49],
            'XXXV -> 35' => ['XXXV', 35],
            'XXXIX -> 39' => ['XXXIX', 39],
            'XL -> 40' => ['XL', 40],
            'I -> 1' => ['I', 1],
            'V -> 5' => ['V', 5],
            'X -> 10' => ['X', 10],
            'L -> 50' => ['L', 50],
            'C -> 100' => ['C', 100],
            'IV -> 4' => ['IV', 4],
            'VI -> 6' => ['VI', 6],
            'LVII -> 57' => ['LVII', 57],
            'LIV -> 54' => ['LIV', 54],
            'CXI -> 111' => ['CXI', 111],
            'CXIV -> 114' => ['CXIV', 114],
            'CLXXXVIII -> 188' => ['CLXXXVIII', 188],
        ];
    }

    /**
     * @param string $input
     * @param int $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaSubtraction(
        string $input,
        int $expected
    ): void {
        self::assertEquals($expected, RomanToIntegers::viaSubtraction($input));
    }

    /**
     * @param string $input
     * @param int $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaReversePass(
        string $input,
        int $expected
    ): void {
        self::assertEquals($expected, RomanToIntegers::viaReversePass($input));
    }

    /**
     * @param string $input
     * @param int $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaStrReplace(
        string $input,
        int $expected
    ): void {
        self::assertEquals($expected, RomanToIntegers::viaStrReplace($input));
    }
}
