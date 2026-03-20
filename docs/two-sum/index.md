# Two Sum

> **Find two numbers in an array that add up to a target sum.**
> Return the indices of the two numbers such that they add up to the given target.

## Steps

1. Iterate through the array
2. For each element, check whether a complement exists that adds up to the target
3. Return the indices of the matching pair

---

## Solutions

=== "Brute Force"
    Nested loops comparing every pair of elements until a match is found.
    ```php
    <?php

    --8<-- "TwoSum/TwoSum.php:viaBruteForce"
    ```

=== "Filter Reverse"
    Filters out values that cannot contribute to the target, then searches the reversed remainder.
    ```php
    <?php

    --8<-- "TwoSum/TwoSum.php:viaFilterReverse"
    ```

## Benchmark Results
By running the following:
```bash
hyperfine \
  --warmup 5 \
  --runs 25 \
  --command-name '{algo}' \
  --export-markdown BenchmarkResults.md \
  -L algo brute-force,filter-reverse \
  'php -d opcache.enable_cli=1 -d opcache.enable=1 TwoSumBenchmark.php {algo}'
```

## Fastest
The `brute-force` Solution is the fastest.

```bash
Summary
  brute-force ran
    1.16 ± 0.02 times faster than filter-reverse
```

=== "Results"

    --8<-- "TwoSum/BenchmarkResults.md"
---


## Tests

=== "Tests"
```php
    <?php

    --8<-- "TwoSum/TwoSumTest.php"
```
