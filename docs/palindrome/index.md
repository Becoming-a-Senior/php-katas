# Palindrome

> **Check whether a string reads the same forwards and backwards.**
> Returns `true` if the input is a palindrome, `false` otherwise.

## Steps

1. Compare the string to its reverse
2. Return whether they are equal

---

## Solutions

=== "Reverse"
    Splits the string into an array of characters, reverses it, and compares to the original.
    ```php
    <?php

    --8<-- "Palindrome/Palindrome.php:viaReverse"
    ```

=== "Recursion"
    Recursively compares the first and last characters, narrowing inward until the string is exhausted.
    ```php
    <?php

    --8<-- "Palindrome/Palindrome.php:viaRecursion"
    ```

## Benchmark Results
By running the following:
```bash
hyperfine \
  --warmup 5 \
  --runs 25 \
  --command-name '{algo}' \
  --export-markdown BenchmarkResults.md \
  -L algo reverse,recursion \
  'php -d opcache.enable_cli=1 -d opcache.enable=1 PalindromeBenchmark.php {algo}'
```
## Fastest
The `reverse` Solution is the fastest.

```bash
Summary
  reverse ran
    2.65 ± 0.04 times faster than recursion
```

=== "Results"

    --8<-- "Palindrome/BenchmarkResults.md"
---


## Tests

=== "Tests"
```php
    <?php

    --8<-- "Palindrome/PalindromeTest.php"
```