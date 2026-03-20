<?php

declare(strict_types=1);

namespace Katas\Queue;

final class Queue implements \Countable
{
    /**
     * @param array<int, mixed> $elements
     */
    public function __construct(private array $elements = [])
    {
    }

    /**
     * @param mixed $elements
     * @return void
     */
    public function enqueue(mixed $elements): void
    {
        $this->elements[] = $elements;
    }

    /**
     * @return mixed
     */
    public function dequeue(): mixed
    {
        return array_shift($this->elements);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->elements);
    }

    /**
     * @return mixed
     */
    public function peek(): mixed
    {
        $key = array_key_first($this->elements);

        if ($key === null) {
            return null;
        }

        return $this->elements[$key];
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->elements === [];
    }

    /**
     * @return array<int, mixed>
     */
    public function toArray(): array
    {
        return $this->elements;
    }

    /**
     * @param array<int, mixed> $elements
     * @return self
     */
    public static function fromArray(array $elements): self
    {
        return new self(array_values($elements));
    }

    public static function zip(Queue $stack1, Queue $stack2): self
    {
        $result = new self();
        $arr1 = $stack1->toArray();
        $arr2 = $stack2->toArray();

        $len1 = \count($arr1);
        $len2 = \count($arr2);
        $max = $len1 > $len2 ? $len1 : $len2;

        for ($i = 0; $i < $max; $i++) {
            if ($i < $len1) {
                $result->enqueue($arr1[$i]);
            }
            if ($i < $len2) {
                $result->enqueue($arr2[$i]);
            }
        }

        return $result;
    }
}
