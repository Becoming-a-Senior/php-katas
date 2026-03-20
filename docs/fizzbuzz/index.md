# FizzBuzz

> **Replace multiples of 3 with "Fizz", multiples of 5 with "Buzz", and multiples of both with "FizzBuzz".**

---

```bash
fizzBuzz(5)  → "12Fizz4Buzz"
fizzBuzz(15) → "12Fizz4BuzzFizz78FizzBuzz11Fizz1314FizzBuzz"
```

## Steps

1. Loop from `1` to `n`
2. Check divisibility by 3 and 5 independently,append `"Fizz"` and/or `"Buzz"` to a temporary string
3. If neither matched, use the number itself
4. Concatenate each token to the result

---

## Solution

```php title="FizzBuzz.php"
<?php

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
```

---


## Tests

=== "Tests"
```php
    <?php

    --8<-- "FizzBuzz/FizzBuzzTest.php"
```
