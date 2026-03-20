# String Reverse

> **Reverse a string.**
> Returns the input string with its characters in reverse order.

## Steps

1. Take the input string
2. Reverse the order of its characters
3. Return the result

---

## Solutions

=== "Built-in"
    Uses `strrev()`, a single native C call. No helpers needed.
    ```php
    <?php

    --8<-- "StringReverse/StringReverse.php:viaBuiltIn"
    ```

=== "Split"
    Splits the string into a character array, reverses it with `array_reverse()`, then joins it back with `implode()`.
    ```php
    <?php

    --8<-- "StringReverse/StringReverse.php:viaSplit"
    ```

## Benchmark Results
By running the following:
```bash
hyperfine \
  --warmup 5 \
  --runs 25 \
  --command-name '{algo}' \
  --export-markdown BenchmarkResults.md \
  -L algo built-in,split \
  'php -d opcache.enable_cli=1 -d opcache.enable=1 StringReverseBenchmark.php {algo}'
```

=== "Results"

    --8<-- "StringReverse/BenchmarkResults.md"
---


## Tests

=== "Tests"
```php
    <?php

    --8<-- "StringReverse/StringReverseTest.php"
```
