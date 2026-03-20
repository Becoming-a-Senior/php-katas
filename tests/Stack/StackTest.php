<?php

declare(strict_types=1);

namespace Tests\Stack;

use Katas\Stack\Stack;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Stack::class)]
class StackTest extends TestCase
{
    private Stack $stack;

    protected function setUp(): void
    {
        $this->stack = new Stack();
    }

    public function testPeekReturnsTop(): void
    {
        $this->stack->push('foo');
        $this->stack->push('bar');
        $this->assertSame('bar', $this->stack->peek());
        $this->assertSame('bar', $this->stack->peek());
    }

    public function testPopAndPeekReturnsTop(): void
    {
        $this->stack->push('foo');
        $this->stack->push('bar');
        $this->assertSame('bar', $this->stack->pop());
        $this->assertSame('foo', $this->stack->peek());
    }

    public function testIsEmptyOnEmptyStack(): void
    {
        $this->assertTrue($this->stack->isEmpty());
    }

    public function testIsEmptyAfterPush(): void
    {
        $this->stack->push(1);
        $this->assertFalse($this->stack->isEmpty());
    }

    public function testCount(): void
    {
        $this->stack->push(1);
        $this->stack->push(2);
        $this->stack->push(3);
        $this->assertCount(3, $this->stack);
    }

    public function testToArray(): void
    {
        $this->stack->push(1);
        $this->stack->push(2);
        $this->stack->push(3);
        $this->assertSame([1, 2, 3], $this->stack->toArray());
    }

    public function testFromArray(): void
    {
        $stack = Stack::fromArray([1, 2, 3]);
        $this->assertSame([1, 2, 3], $stack->toArray());
    }

    public function testZip(): void
    {
        $stack1 = Stack::fromArray([1, 2]);
        $stack2 = Stack::fromArray(['a', 'b', 'c']);

        $zipped = Stack::zip($stack1, $stack2);
        $this->assertSame([1, 'a', 2, 'b', 'c'], $zipped->toArray());
    }
}
