<?php

declare(strict_types=1);

namespace Tests\FizzBuzz;

use Katas\FizzBuzz\FizzBuzz;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(FizzBuzz::class)]
class FizzBuzzTest extends TestCase
{
    /**
     * @return array<string, list<int|string>>
     */
    public static function arrayDataProvider(): array
    {
        return [
            'fizzbuzz up to 10' => [10, '12Fizz4BuzzFizz78FizzBuzz'],
            'fizzbuzz up to 20' => [20, '12Fizz4BuzzFizz78FizzBuzz11Fizz1314FizzBuzz1617Fizz19Buzz'],
        ];
    }

    /**
     * @param int $input
     * @param string $expected
     * @return void
     */
    #[DataProvider('arrayDataProvider')]
    public function testFizzBuzz(
        int $input,
        string $expected
    ): void {
        self::assertEquals($expected, FizzBuzz::printFizzBuzz($input));
    }
}
