# Anagram

> **Two strings are anagrams if they contain the same characters in the same frequency,
> regardless of order.**

## Goal
- Check if two strings are anagram
- strings can contain Unicode characters
- ignore whitespaces, capital letters and punctuations

---

## Shared Logic

All solutions use the same `clean()` method before any comparison:
```php
<?php

--8<-- "Anagram/Anagram.php:clean"
```

## Solutions

=== "Count"
    Uses `count_chars()`, a single native C call. No helper needed.
    ```php
    <?php
    
    --8<-- "Anagram/Anagram.php:viaCount"
    ```
=== "Sort"
    Split into characters, sort, and compare as strings.
    ```php
    <?php
    
    --8<-- "Anagram/Anagram.php:viaSort"
    ```
=== "Frequency Map"
    Build a frequency table using `array_map` and compare.
    ```php
    <?php
    
    --8<-- "Anagram/Anagram.php:viaFreq"
    ```
=== "Foreach"
    Same as Frequency Map, using `foreach` instead of `array_map`.
    ```php
    <?php
    
    --8<-- "Anagram/Anagram.php:viaForeach"
    ```
=== "Loop"
    Builds the frequency table with a `for` loop, then compares key by key.
    ```php
    <?php
    
    --8<-- "Anagram/Anagram.php:viaLoop"
    ```
## Benchmark Results
By running the following:
```bash
hyperfine \
  --warmup 5 \
  --runs 25 \
  --command-name '{algo}' \
  --export-markdown BenchmarkResults.md \
  -L algo sort,freq,foreach,count,loop \
  'php -d opcache.enable_cli=1 -d opcache.enable=1 AnagramBenchmark.php {algo}'
```

## Fastest
The `Count` Solution is the fastest.

```bash
Summary
  count ran
    2.59 ± 0.04 times faster than foreach
    3.08 ± 0.05 times faster than loop
    3.38 ± 0.06 times faster than sort
    8.00 ± 0.20 times faster than freq
```

=== "Results"

    --8<-- "Anagram/BenchmarkResults.md"
---


## Tests

=== "Tests"
```php
    <?php

    --8<-- "Anagram/AnagramTest.php"
```