<?php

declare(strict_types=1);

namespace Katas\FizzBuzz;

final class FizzBuzz
{
    /**
     * @param int $number
     * @return string
     */
    public static function printFizzBuzz(int $number): string
    {
        $str = '';

        for ($i = 1; $i <= $number; $i++) {
            $tmp = '';
            if ($i % 3 === 0) {
                $tmp .= 'Fizz';
            }

            if ($i % 5 === 0) {
                $tmp .= 'Buzz';
            }
            $str .= ($tmp !== '') ? $tmp : (string) $i;
        }

        return $str;
    }
}
