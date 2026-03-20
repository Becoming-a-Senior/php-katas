<?php

declare(strict_types=1);

namespace Tests\Queue;

use Katas\Queue\Queue;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Queue::class)]
class QueueTest extends TestCase
{
    private Queue $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue();
    }

    public function testPeekReturnsFront(): void
    {
        $this->queue->enqueue('foo');
        $this->queue->enqueue('bar');
        $this->assertSame('foo', $this->queue->peek());
        $this->assertSame('foo', $this->queue->peek());
    }

    public function testDequeueAndPeekReturnsFront(): void
    {
        $this->queue->enqueue('foo');
        $this->queue->enqueue('bar');
        $this->assertSame('foo', $this->queue->dequeue());
        $this->assertSame('bar', $this->queue->peek());
    }

    public function testFifoOrder(): void
    {
        $this->queue->enqueue(1);
        $this->queue->enqueue(2);
        $this->queue->enqueue(3);
        $this->assertSame(1, $this->queue->dequeue());
        $this->assertSame(2, $this->queue->dequeue());
        $this->assertSame(3, $this->queue->dequeue());
    }

    public function testIsEmptyOnEmptyQueue(): void
    {
        $this->assertTrue($this->queue->isEmpty());
    }

    public function testIsEmptyAfterEnqueue(): void
    {
        $this->queue->enqueue(1);
        $this->assertFalse($this->queue->isEmpty());
    }

    public function testCount(): void
    {
        $this->queue->enqueue(1);
        $this->queue->enqueue(2);
        $this->queue->enqueue(3);
        $this->assertCount(3, $this->queue);
    }

    public function testToArray(): void
    {
        $this->queue->enqueue(1);
        $this->queue->enqueue(2);
        $this->queue->enqueue(3);
        $this->assertSame([1, 2, 3], $this->queue->toArray());
    }

    public function testFromArray(): void
    {
        $queue = Queue::fromArray([1, 2, 3]);
        $this->assertSame([1, 2, 3], $queue->toArray());
    }

    public function testZip(): void
    {
        $queue1 = Queue::fromArray([1, 2]);
        $queue2 = Queue::fromArray(['a', 'b', 'c']);

        $zipped = Queue::zip($queue1, $queue2);
        $this->assertSame([1, 'a', 2, 'b', 'c'], $zipped->toArray());
    }
}
