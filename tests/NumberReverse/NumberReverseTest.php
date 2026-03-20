<?php

declare(strict_types=1);

namespace Tests\NumberReverse;

use Katas\NumberReverse\NumberReverse;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(NumberReverse::class)]
class NumberReverseTest extends TestCase
{
    /**
     * @return array<string, array<int, int>>
     */
    public static function arrayDataProvider(): array
    {
        return [
            'reverse 123' => [123, 321],
            'reverse number with trailing zeros' => [1000, 1],
            'single digit number' => [5, 5],
        ];
    }

    /**
     * @param int $input
     * @param int $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testReverseNumber(
        int $input,
        int $expected
    ): void {
        self::assertEquals($expected, NumberReverse::shortcut($input));
        self::assertEquals($expected, NumberReverse::get($input));
    }
}
