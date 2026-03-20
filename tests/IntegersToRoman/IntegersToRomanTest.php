<?php

declare(strict_types=1);

namespace Tests\IntegersToRoman;

use Katas\IntegersToRoman\IntegersToRoman;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(IntegersToRoman::class)]
class IntegersToRomanTest extends TestCase
{
    /**
     * @return array<string, list<int|string>>
     */
    public static function arrayDataProvider(): array
    {
        return [
            '1 -> I' => [1, 'I'],
            '3 -> III' => [3, 'III'],
            '4 -> IV' => [4, 'IV'],
            '5 -> V' => [5, 'V'],
            '9 -> IX' => [9, 'IX'],
            '10 -> X' => [10, 'X'],
            '40 -> XL' => [40, 'XL'],
            '50 -> L' => [50, 'L'],
            '90 -> XC' => [90, 'XC'],
            '100 -> C' => [100, 'C'],
            '400 -> CD' => [400, 'CD'],
            '500 -> D' => [500, 'D'],
            '44 -> XLIV' => [44, 'XLIV'],
            '95 -> XCV' => [95, 'XCV'],
            '388 -> CCCLXXXVIII' => [388, 'CCCLXXXVIII'],
        ];
    }

    /**
     * @param int $input
     * @param string $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testConvertIntegerToRomanNumeral(
        int $input,
        string $expected
    ): void {
        self::assertEquals($expected, IntegersToRoman::toRoman($input));
    }
}
