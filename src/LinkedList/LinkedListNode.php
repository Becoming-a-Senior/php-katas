<?php

declare(strict_types=1);

namespace Katas\LinkedList;

class LinkedListNode
{
    /**
     * @param mixed $value
     * @param LinkedListNode|null $next
     */
    public function __construct(
        public mixed $value,
        public ?LinkedListNode $next = null,
    ) {
    }
}
