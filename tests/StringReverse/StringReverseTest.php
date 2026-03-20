<?php

declare(strict_types=1);

namespace Tests\StringReverse;

use Katas\StringReverse\StringReverse;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(StringReverse::class)]
class StringReverseTest extends TestCase
{
    /**
     * @return array<string, array<int, string>>
     */
    public static function arrayDataProvider(): array
    {
        return [
            'reverse hello' => ['hello', 'olleh'],
            'reverse world' => ['world', 'dlrow'],
            'palindrome php' => ['php', 'php'],
            'reverse OpenAI' => ['OpenAI', 'IAnepO'],
            'reverse ChatGPT' => ['ChatGPT', 'TPGtahC'],
            'reverse alphabet sequence' => ['abcdef', 'fedcba'],
            'reverse numeric string' => ['12345', '54321'],
            'palindrome racecar' => ['racecar', 'racecar'],
            'single character' => ['a', 'a'],
            'reverse Reverse' => ['Reverse', 'esreveR'],
        ];
    }

    /**
     * @param string $input
     * @param string $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaBuiltIn(
        string $input,
        string $expected
    ): void {
        self::assertEquals($expected, StringReverse::viaBuiltIn($input));
    }

    /**
     * @param string $input
     * @param string $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testViaSplit(
        string $input,
        string $expected
    ): void {
        self::assertEquals($expected, StringReverse::viaSplit($input));
    }
}
