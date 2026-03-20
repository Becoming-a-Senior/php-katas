# Stack

> **A LIFO (Last In, First Out) data structure.**
> Elements are added to and removed from the top.

## Operations

- **push** — add an element to the top
- **pop** — remove and return the element at the top
- **peek** — inspect the top element without removing it
- **isEmpty** — check whether the stack has no elements
- **count** — return the number of elements
- **toArray** / **fromArray** — convert to and from a plain array
- **zip** — interleave two stacks into one

---

## Implementation

A single array backs the stack. `push` appends with `[]`, while `pop` removes from the end via `array_pop()`.

=== "Stack"
    ```php
    <?php

    --8<-- "Stack/Stack.php"
    ```
    
=== "Tests"
    ```php
    <?php

    --8<-- "Stack/StackTest.php"
    ```



