# Group Of People

> **Group people by their desired group size.**
> Given an array where each value represents the group size a person wants to be in, return a list of groups satisfying everyone's requirements.

## Steps

1. Iterate through the input array, recording each person's index under their desired group size
2. For each group size, chunk the collected indices into sub-arrays of that size
3. Flatten the chunks into a single result list

---

## Solutions

=== "Merge"
    Groups indices by size, chunks them, then flattens all chunks using `array_merge()`.
    ```php
    <?php

    --8<-- "GroupOfPeople/GroupOfPeople.php:viaMerge"
    ```

=== "Foreach"
    Groups indices by size, chunks them, then flattens with a nested `foreach`.
    ```php
    <?php

    --8<-- "GroupOfPeople/GroupOfPeople.php:viaForeach"
    ```

=== "Push"
    Groups indices by size, chunks them, then flattens using `array_push()` with spread.
    ```php
    <?php

    --8<-- "GroupOfPeople/GroupOfPeople.php:viaPush"
    ```

## Benchmark Results
By running the following:
```bash
hyperfine \
  --warmup 5 \
  --runs 25 \
  --command-name '{algo}' \
  --export-markdown BenchmarkResults.md \
  -L algo merge,foreach,push \
  'php -d opcache.enable_cli=1 -d opcache.enable=1 GroupOfPeopleBenchmark.php {algo}'
```

## Fastest
The `foreach` Solution is the fastest.

```bash
Summary
  foreach ran
    1.02 ± 0.03 times faster than merge
    1.08 ± 0.04 times faster than push
```


=== "Results"

    --8<-- "GroupOfPeople/BenchmarkResults.md"
---


## Tests

=== "Tests"
```php
    <?php

    --8<-- "GroupOfPeople/GroupOfPeopleTest.php"
```
