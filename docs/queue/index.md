# Queue

> **A FIFO (First In, First Out) data structure.**
> Elements are added to the back and removed from the front.

## Operations

- **enqueue** — add an element to the back
- **dequeue** — remove and return the element at the front
- **peek** — inspect the front element without removing it
- **isEmpty** — check whether the queue has no elements
- **count** — return the number of elements
- **toArray** / **fromArray** — convert to and from a plain array
- **zip** — interleave two queues into one

---

## Implementation

=== "LinkedList"
    ```php
    <?php

    --8<-- "Queue/Queue.php"
    ```

=== "Tests"
    ```php
    <?php

    --8<-- "Queue/QueueTest.php"
    ```