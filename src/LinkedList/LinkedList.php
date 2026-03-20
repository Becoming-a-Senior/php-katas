<?php

declare(strict_types=1);

namespace Katas\LinkedList;

use Countable;

/**
 * @implements \Iterator<int, mixed>
 */
class LinkedList implements \Iterator, Countable
{
    private int $index = 0;
    /** @var LinkedListNode|null  */
    private ?LinkedListNode $current = null;

    public function __construct(
        public ?LinkedListNode $head = null
    ) {
    }

    /**
     * @return mixed
     */
    public function current(): mixed
    {
        return $this->current?->value;
    }

    /**
     * @return void
     */
    public function next(): void
    {
        $this->current = $this->current?->next;
        $this->index++;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->index;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return $this->current !== null;
    }

    /**
     * @return void
     */
    public function rewind(): void
    {
        $this->index = 0;
        $this->current = $this->head;
    }

    /**
     * @return LinkedListNode|null
     */
    public function first(): ?LinkedListNode
    {
        return $this->head;
    }

    /**
     * @return LinkedListNode|null
     */
    public function last(): ?LinkedListNode
    {
        $current = $this->head;

        while ($current?->next) {
            $current = $current->next;
        }

        return $current;
    }

    /**
     * @param int $index
     * @return LinkedListNode|null
     */
    public function get(int $index): ?LinkedListNode
    {
        if ($index < 0 || !$this->head) {
            return null;
        }

        $current = $this->head;

        for ($i = 0; $i < $index; $i++) {
            if (!$current->next) {
                return null;
            }
            $current = $current->next;
        }

        return $current;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        $count = 0;
        $current = $this->head;

        while ($current) {
            $count++;
            $current = $current->next;
        }

        return $count;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->head === null;
    }

    /**
     * @param mixed $value
     * @return LinkedListNode|null
     */
    public function find(mixed $value): ?LinkedListNode
    {
        $current = $this->head;

        while ($current) {
            if ($current->value === $value) {
                return $current;
            }
            $current = $current->next;
        }

        return null;
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public function contains(mixed $value): bool
    {
        return $this->find($value) !== null;
    }

    /**
     * @param mixed $value
     * @return int
     */
    public function indexOf(mixed $value): int
    {
        $current = $this->head;
        $index = 0;

        while ($current) {
            if ($current->value === $value) {
                return $index;
            }
            $current = $current->next;
            $index++;
        }

        return -1;
    }

    /**
     * @param mixed $value
     * @return void
     */
    public function prepend(mixed $value): void
    {
        $this->head = new LinkedListNode($value, $this->head);
    }

    /**
     * @param mixed $value
     * @return void
     */
    public function append(mixed $value): void
    {
        $last = $this->last();

        if ($last) {
            $last->next = new LinkedListNode($value);
        } else {
            $this->head = new LinkedListNode($value);
        }
    }

    public function insertAfter(mixed $value, LinkedListNode $current): LinkedListNode
    {
        $current->next = new LinkedListNode($value, $current->next);
        return $current->next;
    }

    /**
     * @param int $index
     * @param mixed $value
     * @return void
     */
    public function insertAt(int $index, mixed $value): void
    {
        if ($index <= 0) {
            $this->prepend($value);
            return;
        }

        $prev = $this->get($index - 1);

        if (!$prev) {
            $this->append($value);
            return;
        }

        $this->insertAfter($value, $prev);
    }

    /**
     * @return void
     */
    public function removeFirst(): void
    {
        if ($this->head) {
            $this->head = $this->head->next;
        }
    }

    /**
     * @return void
     */
    public function removeLast(): void
    {
        if (!$this->head) {
            return;
        }

        if (!$this->head->next) {
            $this->head = null;
            return;
        }

        $current = $this->head;

        while ($current->next && $current->next->next) {
            $current = $current->next;
        }

        $current->next = null;
    }

    /**
     * @param int $index
     * @return void
     */
    public function removeAt(int $index): void
    {
        if ($index < 0 || !$this->head) {
            return;
        }

        if ($index === 0) {
            $this->removeFirst();
            return;
        }

        $prev = $this->get($index - 1);

        if (!$prev || !$prev->next) {
            return;
        }

        $prev->next = $prev->next->next;
    }

    /**
     * @param mixed $value
     * @return void
     */
    public function remove(mixed $value): void
    {
        if (!$this->head) {
            return;
        }

        if ($this->head->value === $value) {
            $this->removeFirst();
            return;
        }

        $current = $this->head;

        while ($current->next) {
            if ($current->next->value === $value) {
                $current->next = $current->next->next;
                return;
            }
            $current = $current->next;
        }
    }

    public function clear(): void
    {
        $this->head = null;
    }

    /**
     * @param callable(mixed &$value, int $index): void $callback
     * @return void
     */
    public function forEach(callable $callback): void
    {
        $current = $this->head;
        $index = 0;

        while ($current) {
            $callback($current->value, $index++);
            $current = $current->next;
        }
    }

    /**
     * @param callable(mixed $value, int $index): mixed $callback
     * @return self
     */
    public function map(callable $callback): self
    {
        $result = new self();
        $last = null;
        $current = $this->head;
        $index = 0;

        while ($current) {
            $newNode = new LinkedListNode($callback($current->value, $index++));

            if (!$last) {
                $result->head = $newNode;
            } else {
                $last->next = $newNode;
            }

            $last = $newNode;
            $current = $current->next;
        }

        return $result;
    }

    /**
     * @param callable(mixed $value, int $index): bool $callback
     * @return self
     */
    public function filter(callable $callback): self
    {
        $result = new self();
        $last = null;
        $current = $this->head;
        $index = 0;

        while ($current) {
            if ($callback($current->value, $index)) {
                $newNode = new LinkedListNode($current->value);

                if (!$last) {
                    $result->head = $newNode;
                } else {
                    $last->next = $newNode;
                }

                $last = $newNode;
            }

            $current = $current->next;
            $index++;
        }

        return $result;
    }

    /**
     * @param callable(mixed $carry, mixed $value, int $index): mixed $callback
     * @param mixed|null $initial
     * @return mixed
     */
    public function reduce(callable $callback, mixed $initial = null): mixed
    {
        $carry = $initial;
        $current = $this->head;
        $index = 0;

        while ($current) {
            $carry = $callback($carry, $current->value, $index++);
            $current = $current->next;
        }

        return $carry;
    }

    /**
     * @return array<int, mixed>
     */
    public function toArray(): array
    {
        $result = [];
        $current = $this->head;

        while ($current) {
            $result[] = $current->value;
            $current = $current->next;
        }

        return $result;
    }

    /**
     * @param array<int, mixed> $values
     * @return self
     */
    public static function fromArray(array $values): self
    {
        $list = new self();

        foreach ($values as $value) {
            $list->append($value);
        }

        return $list;
    }

    /**
     * @return void
     */
    public function reverse(): void
    {
        $prev = null;
        $current = $this->head;

        while ($current) {
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }

        $this->head = $prev;
    }
}
