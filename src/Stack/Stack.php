<?php

declare(strict_types=1);

namespace Katas\Stack;

final class Stack implements \Countable
{
    /**
     * @param array<int, mixed> $elements
     */
    public function __construct(private array $elements = [])
    {
    }

    /**
     * @param mixed $item
     * @return void
     */
    public function push(mixed $item): void
    {
        $this->elements[] = $item;
    }

    /**
     * @return mixed
     */
    public function pop(): mixed
    {
        return array_pop($this->elements);
    }

    /**
     * @return mixed
     */
    public function peek(): mixed
    {
        $key = \array_key_last($this->elements);

        if ($key === null) {
            return null;
        }

        return $this->elements[$key];
    }

    public function isEmpty(): bool
    {
        return $this->elements === [];
    }

    public function count(): int
    {
        return \count($this->elements);
    }

    /**
     * @return array<int, mixed>
     */
    public function toArray(): array
    {
        return $this->elements;
    }

    /**
     * @param array<int, mixed> $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(array_values($data));
    }

    public static function zip(Stack $stack1, Stack $stack2): self
    {
        $result = new self();
        $arr1 = $stack1->toArray();
        $arr2 = $stack2->toArray();

        $len1 = count($arr1);
        $len2 = count($arr2);
        $max = $len1 > $len2 ? $len1 : $len2;

        for ($i = 0; $i < $max; $i++) {
            if ($i < $len1) {
                $result->push($arr1[$i]);
            }
            if ($i < $len2) {
                $result->push($arr2[$i]);
            }
        }

        return $result;
    }
}
