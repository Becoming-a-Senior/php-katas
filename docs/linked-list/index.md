# Linked List

> **A singly linked list where each node holds a value and a pointer to the next node.**
> Implements `Iterator` and `Countable` for native PHP interoperability.

## Operations

| Method | Description |
|---|---|
| `first()` | Return the head node |
| `last()` | Return the tail node |
| `get(int $index)` | Return the node at a given index |
| `count()` | Return the number of nodes |
| `isEmpty()` | Check whether the list is empty |
| `find(mixed $value)` | Return the first node matching a value |
| `contains(mixed $value)` | Check whether a value exists |
| `indexOf(mixed $value)` | Return the index of a value, or `-1` |
| `prepend(mixed $value)` | Insert at the front |
| `append(mixed $value)` | Insert at the back |
| `insertAfter(mixed $value, LinkedListNode $node)` | Insert after a given node |
| `insertAt(int $index, mixed $value)` | Insert at a given index |
| `removeFirst()` | Remove the head node |
| `removeLast()` | Remove the tail node |
| `removeAt(int $index)` | Remove the node at a given index |
| `remove(mixed $value)` | Remove the first node matching a value |
| `clear()` | Remove all nodes |
| `forEach(callable $fn)` | Iterate with a callback (value is passed by reference) |
| `map(callable $fn)` | Return a new list with transformed values |
| `filter(callable $fn)` | Return a new list with matching values |
| `reduce(callable $fn, mixed $initial)` | Reduce the list to a single value |
| `toArray()` | Convert to a plain array |
| `fromArray(array $values)` | Build a list from a plain array |
| `reverse()` | Reverse the list in place |

---

## Implementation

=== "LinkedList"
    ```php
    <?php

    --8<-- "LinkedList/LinkedList.php"
    ```

=== "Tests"
    ```php
    <?php

    --8<-- "LinkedList/LinkedListTest.php"
    ```
