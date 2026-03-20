# Vowels

> **Count the number of vowels in a string.**
> Both uppercase and lowercase vowels (a, e, i, o, u) are counted.

## Steps

1. Iterate through each character of the input string
2. Check whether the character is a vowel
3. Return the total count

---

## Shared Logic

All solutions use the `VOWELS` constant:
```php
<?php

--8<-- "Vowels/Vowels.php:vowels"
```

## Solutions

=== "Regex"
    Strips all non-vowel characters with a regex substitution and measures what remains.
    ```php
    <?php

    --8<-- "Vowels/Vowels.php:viaRegex"
    ```

=== "Iteration"
    Splits the string into characters and checks each one against a vowel list.
    ```php
    <?php

    --8<-- "Vowels/Vowels.php:viaIteration"
    ```

## Benchmark Results
By running the following:
```bash
hyperfine \
  --warmup 5 \
  --runs 25 \
  --command-name '{algo}' \
  --export-markdown BenchmarkResults.md \
  -L algo regex,iteration \
  'php -d opcache.enable_cli=1 -d opcache.enable=1 VowelsBenchmark.php {algo}'
```

## Fastest
The `regex` Solution is the fastest.

```bash
Summary
  regex ran
    4.47 ± 0.09 times faster than iteration
```

=== "Results"

    --8<-- "Vowels/BenchmarkResults.md"
---


## Tests

=== "Tests"
```php
    <?php

    --8<-- "Vowels/VowelsTest.php"
```