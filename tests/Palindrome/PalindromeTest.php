<?php

declare(strict_types=1);

namespace Tests\Palindrome;

use Katas\Palindrome\Palindrome;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(Palindrome::class)]
class PalindromeTest extends TestCase
{
    /**
     * @return array<string, array<string | bool>>
     */
    public static function arrayDataProvider(): array
    {
        return [
            'anna' => ['anna', true],
            'racecar' => ['racecar', true],
            'level' => ['level', true],
            'radar' => ['radar', true],
            'civic' => ['civic', true],
            'madam' => ['madam', true],
            'noon' => ['noon', true],
            'deified' => ['deified', true],
            'refer' => ['refer', true],
            'rotor' => ['rotor', true],
            'empty' => ['', true],
        ];
    }

    /**
     * @param string $input
     * @param bool $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaReverse(
        string $input,
        bool $expected
    ): void {
        self::assertEquals($expected, Palindrome::viaReverse($input));
    }

    /**
     * @param string $input
     * @param bool $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaRecursion(
        string $input,
        bool $expected
    ): void {
        self::assertEquals($expected, Palindrome::viaRecursion($input));
    }
}
