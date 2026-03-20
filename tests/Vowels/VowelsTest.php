<?php

declare(strict_types=1);

namespace Tests\Vowels;

use Katas\Vowels\Vowels;
use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversMethod(Vowels::class, 'vowelsCount')]
#[UsesClass(Vowels::class)]
class VowelsTest extends TestCase
{
    /**
     * @return array<string, array<int, string|int>>
     */
    public static function arrayDataProvider(): array
    {
        return [
            'given 6 then they are 5' => ['HEEELLOOO', 6],
            'given 2s then they are 2' => ['hello', 2],
            'given 0 strings then they 0' => ['TZRZHGTZ', 0],
            'given 3 then they are 3' => ['abc def ghi', 3],
            'given 6 letter vs empty  6' => ['abc def ghi ABC DEF GHI', 6],
        ];
    }

    /**
     * @param string $input
     * @param int $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaRegex(
        string $input,
        int $expected
    ): void {
        self::assertEquals($expected, Vowels::viaRegex($input));
    }

    /**
     * @param string $input
     * @param int $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaIteration(
        string $input,
        int $expected
    ): void {
        self::assertEquals($expected, Vowels::viaIteration($input));
    }
}
