<?php

declare(strict_types=1);

namespace Tests\Anagram;

use Katas\Anagram\Anagram;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(Anagram::class)]
class AnagramTest extends TestCase
{
    /**
     * @return array<string, array{string, string, bool}>
     */
    public static function checkAnagramWordsProvider(): array
    {
        return [
            'given single letter vs empty string then not an anagram'             => ['q', '', false],
            'given same word then it is an anagram'                               => ['word', 'word', true],
            'given letters reordered then it is an anagram'                       => ['word', 'drow', true],
            'given different length words then not an anagram'                    => ['Hellooooo', 'Hello', false],
            'given mixed case letters reordered then it is an anagram'            => ['Elvis', 'lives', true],
            'given reversed word then it is an anagram'                           => ['backward', 'drawback', true],
            'given identical multi-word strings then they are anagrams'           => [
                'Lorem Ipsum', 'Lorem Ipsum', true
            ],
            'given multi-word strings with words swapped then it is an anagram'   => [
                'Ipsum Lorem', 'Lorem Ipsum', true
            ],
            'given sentence anagram then it is an anagram'                        => [
                'eleven plus two', 'twelve plus one', true
            ],
            'given numbers mixed with letters then it is an anagram'              => ['12 aabb', 'b a 1 a b 2', true],
            'given extra spaces between chars then spaces are ignored'            => [
                'He ll o World!', 'Hel l o W o rld!', true
            ],
            'given differing whitespace count then whitespace is ignored'         => [
                'Hello World, Developer!', 'HelloWorld, Developer!', true
            ],
            'given different punctuation then punctuation is ignored'             => [
                'hello!', 'hello?', true
            ],
            'given special characters reordered then it is an anagram'            => [
                'WW!! World," "Dev!', '!!World .WW, ()( Dev!', true
            ],
            'given unicode letters reordered then it is an anagram'               => ['äct', 'cät', true],
        ];
    }

    /**
     * @param string $word1
     * @param string $word2
     * @param bool $expected
     * @return void
     */
    #[DataProvider('checkAnagramWordsProvider')]
    public function testViaSort(
        string $word1,
        string $word2,
        bool $expected
    ): void {
        self::assertEquals($expected, Anagram::viaSort($word1, $word2));
    }

    /**
     * @param string $word1
     * @param string $word2
     * @param bool $expected
     * @return void
     */
    #[DataProvider('checkAnagramWordsProvider')]
    public function testViaFreq(
        string $word1,
        string $word2,
        bool $expected
    ): void {
        self::assertEquals($expected, Anagram::viaFreq($word1, $word2));
    }

    /**
     * @param string $word1
     * @param string $word2
     * @param bool $expected
     * @return void
     */
    #[DataProvider('checkAnagramWordsProvider')]
    public function testViaForeach(
        string $word1,
        string $word2,
        bool $expected
    ): void {
        self::assertEquals($expected, Anagram::viaForeach($word1, $word2));
    }

    /**
     * @param string $word1
     * @param string $word2
     * @param bool $expected
     * @return void
     */
    #[DataProvider('checkAnagramWordsProvider')]
    public function testViaCount(
        string $word1,
        string $word2,
        bool $expected
    ): void {
        self::assertEquals($expected, Anagram::viaCount($word1, $word2));
    }

    /**
     * @param string $word1
     * @param string $word2
     * @param bool $expected
     * @return void
     */
    #[DataProvider('checkAnagramWordsProvider')]
    public function testViaLoop(
        string $word1,
        string $word2,
        bool $expected
    ): void {
        self::assertEquals($expected, Anagram::viaLoop($word1, $word2));
    }
}
