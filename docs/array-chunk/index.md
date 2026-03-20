# Chunk Array

> **Split an array into groups of a given size.**
> If the array cannot be split evenly, the last chunk contains the remaining elements.

## Steps

1. Iterate through the input array
2. Group elements into sub-arrays of the given size
3. Start a new group once the current one is full
4. Return the array of chunks

---

## Solutions

=== "Builtin"
    Uses `array_chunk()`, a single native C call. No helper needed.
    ```php
    <?php
        
    --8<-- "ArrayChunk/ArrayChunk.php:viaBuiltin"
    ```

=== "Slice"
    Single loop, delegating the slicing to `array_slice()`.
    ```php
    <?php
    
    --8<-- "ArrayChunk/ArrayChunk.php:viaSlice"
    ```

=== "Foreach"
    Single loop, using `floor()` to calculate the chunk index.
    ```php
    <?php
    
    --8<-- "ArrayChunk/ArrayChunk.php:viaForeach"
    ```

=== "Recursion"
    Recursively slices the array until empty.
    ```php
    <?php
    
    --8<-- "ArrayChunk/ArrayChunk.php:viaRecursion"
    ```


## Benchmark Results
By running the following:
```bash
hyperfine \
  --warmup 5 \
  --runs 25 \
  --command-name '{algo}' \
  --export-markdown BenchmarkResults.md \
  -L algo built-in,recursion,foreach,slice \
  'php -d opcache.enable_cli=1 -d opcache.enable=1 ArrayChunkBenchmark.php {algo}'
```

## Fastest
The `built-in` Solution is the fastest.

```bash
Summary
  built-in ran
    1.70 ± 0.03 times faster than slice
    1.96 ± 0.05 times faster than recursion
    2.03 ± 0.04 times faster than foreach
```

=== "Results"

    --8<-- "ArrayChunk/BenchmarkResults.md"
---


## Tests

=== "Tests"
```php
    <?php

    --8<-- "ArrayChunk/ArrayChunkTest.php"
```