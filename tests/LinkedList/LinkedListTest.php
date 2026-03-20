<?php

declare(strict_types=1);

namespace Tests\LinkedList;

use Katas\LinkedList\LinkedList;
use Katas\LinkedList\LinkedListNode;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(LinkedList::class)]
final class LinkedListTest extends TestCase
{
    private LinkedList $list;

    protected function setUp(): void
    {
        $this->list = new LinkedList();
    }

    public function testPrependOrder(): void
    {
        $this->list->prepend(10);
        $this->list->prepend(12);
        $this->list->prepend(15);
        $this->list->prepend(20);
        $this->assertSame([20, 15, 12, 10], $this->list->toArray());
    }

    public function testAppend(): void
    {
        $this->list->append(10);
        $this->list->append(12);
        $this->list->append(15);
        $this->list->append(20);
        $this->assertSame([10, 12, 15, 20], $this->list->toArray());
    }

    public function testAppendOnEmptyList(): void
    {
        $this->list->append(1);
        $this->assertNotNull($this->list->head);
        $this->assertEquals(1, $this->list->head->value);
    }

    public function testFirst(): void
    {
        $this->list->prepend(10);
        $this->list->prepend(20);
        $first = $this->list->first();
        $this->assertNotNull($first);
        $this->assertEquals(20, $first->value);
    }

    public function testLast(): void
    {
        $this->list->prepend(10);
        $this->list->prepend(12);
        $this->list->prepend(15);
        $last = $this->list->last();
        $this->assertNotNull($last);
        $this->assertEquals(10, $last->value);
        $this->assertNull($last->next);
    }

    public function testRemoveFirst(): void
    {
        $this->list->prepend(10);
        $this->list->prepend(12);
        $this->list->prepend(15);
        $this->list->prepend(20);
        $this->list->removeFirst();
        $this->list->removeFirst();
        $this->list->removeFirst();
        $this->assertNotNull($this->list->head);
        $this->assertEquals(10, $this->list->head->value);
    }

    public function testRemoveLast(): void
    {
        $this->list->append(10);
        $this->list->append(12);
        $this->list->append(15);
        $this->list->removeLast();
        $this->assertSame([10, 12], $this->list->toArray());
    }

    public function testCount(): void
    {
        $this->buildMixList();
        $this->assertEquals(7, $this->list->count());
    }

    public function testCountOnEmptyList(): void
    {
        $this->assertEquals(0, $this->list->count());
    }

    public function testIsEmptyOnEmptyList(): void
    {
        $this->assertTrue($this->list->isEmpty());
    }

    public function testIsEmptyAfterAppend(): void
    {
        $this->list->append(1);
        $this->assertFalse($this->list->isEmpty());
    }

    public function testGet(): void
    {
        $this->buildMixList(); // 3->5->10->25->26->28->30

        $first = $this->list->get(0);
        $this->assertNotNull($first);
        $this->assertEquals(3, $first->value);

        $fourth = $this->list->get(3);
        $this->assertNotNull($fourth);
        $this->assertEquals(25, $fourth->value);

        $last = $this->list->get(6);
        $this->assertNotNull($last);
        $this->assertEquals(30, $last->value);
    }

    public function testGetReturnsNullForNegativeIndex(): void
    {
        $this->list->append(1);
        $this->assertNull($this->list->get(-1));
    }

    public function testGetOnEmptyListReturnsNull(): void
    {
        $this->assertNull($this->list->get(0));
    }

    public function testInsertAtEnd(): void
    {
        $this->list->append(1);
        $this->list->append(2);
        $this->list->insertAt(2, 3);
        $this->assertSame([1, 2, 3], $this->list->toArray());
    }

    public function testInsertAfter(): void
    {
        $this->list->append(1);
        $this->list->append(3);
        $head = $this->list->head;
        $this->assertNotNull($head);
        $this->list->insertAfter(2, $head);
        $this->assertSame([1, 2, 3], $this->list->toArray());
    }

    public function testRemoveAtFirst(): void
    {
        $this->list->append(1);
        $this->list->append(2);
        $this->list->append(3);
        $this->list->removeAt(0);
        $this->assertSame([2, 3], $this->list->toArray());
    }

    public function testRemoveByValue(): void
    {
        $this->list->append(1);
        $this->list->append(2);
        $this->list->append(3);
        $this->list->remove(2);
        $this->assertSame([1, 3], $this->list->toArray());
    }

    public function testContains(): void
    {
        $this->list->append(1);
        $this->list->append(2);
        $this->list->append(3);
        $this->assertTrue($this->list->contains(2));
        $this->assertFalse($this->list->contains(99));
    }

    public function testFind(): void
    {
        $this->list->append(10);
        $this->list->append(20);
        $found = $this->list->find(20);
        $this->assertInstanceOf(LinkedListNode::class, $found);
        $this->assertEquals(20, $found->value);
        $this->assertNull($this->list->find(99));
    }

    public function testIndexOf(): void
    {
        $this->list->append(10);
        $this->list->append(20);
        $this->list->append(30);
        $this->assertSame(0, $this->list->indexOf(10));
        $this->assertSame(1, $this->list->indexOf(20));
        $this->assertSame(-1, $this->list->indexOf(99));
    }

    public function testMap(): void
    {
        $this->list->append(1);
        $this->list->append(2);
        $this->list->append(3);
        $doubled = $this->list->map(
            function (mixed $v): int {
                if (!is_int($v)) {
                    throw new \RuntimeException('Expected int');
                }
                return $v * 2;
            }
        );

        $this->assertSame([2, 4, 6], $doubled->toArray());
        $this->assertSame([1, 2, 3], $this->list->toArray());
    }

    public function testFilter(): void
    {
        $this->list->append(1);
        $this->list->append(2);
        $this->list->append(3);
        $this->list->append(4);
        $evens = $this->list->filter(
            function (mixed $v): bool {
                if (!is_int($v)) {
                    throw new \RuntimeException('Expected int');
                }
                return $v % 2 === 0;
            }
        );

        $this->assertSame([2, 4], $evens->toArray());
        $this->assertSame([1, 2, 3, 4], $this->list->toArray());
    }

    public function testReduce(): void
    {
        $this->list->append(1);
        $this->list->append(2);
        $this->list->append(3);

        $result = $this->list->reduce(
            function (mixed $carry, mixed $v): int {
                if (!is_int($carry) || !is_int($v)) {
                    throw new \RuntimeException('Expected integers');
                }
                return $carry + $v;
            },
            0
        );

        $this->assertSame(6, $result);
    }

    public function testToArray(): void
    {
        $this->list->append(1);
        $this->list->append(2);
        $this->list->append(3);
        $this->assertSame([1, 2, 3], $this->list->toArray());
    }

    public function testFromArray(): void
    {
        $this->assertSame([1, 2, 3], LinkedList::fromArray([1, 2, 3])->toArray());
    }

    public function testReverse(): void
    {
        $this->list->append(1);
        $this->list->append(2);
        $this->list->append(3);
        $this->list->reverse();
        $this->assertSame([3, 2, 1], $this->list->toArray());
    }

    public function testForEach(): void
    {
        $this->list = LinkedList::fromArray([0, 1, 2, 3]);

        $visitedIndices = [];

        $this->list->forEach(static function (mixed &$value, int $index) use (&$visitedIndices): void {
            $visitedIndices[] = $index;
            if (is_int($value)) {
                $value *= 10;
            }
        });

        self::assertSame([0, 1, 2, 3], $visitedIndices);
        self::assertSame([0, 10, 20, 30], $this->list->toArray());
    }

    public function testIteratorTraversal(): void
    {
        $this->list->append(10);
        $this->list->append(20);
        $this->list->append(30);

        $collected = [];
        foreach ($this->list as $index => $value) {
            $collected[$index] = $value;
        }

        $this->assertSame([0 => 10, 1 => 20, 2 => 30], $collected);
    }

    public function testClear(): void
    {
        $this->list->append(1);
        $this->list->append(2);
        $this->list->clear();
        $this->assertTrue($this->list->isEmpty());
        $this->assertNull($this->list->head);
    }

    public function testMix(): void
    {
        $this->buildMixList();
        $this->assertSame([3, 5, 10, 25, 26, 28, 30], $this->list->toArray());
    }

    private function buildMixList(): void
    {
        $this->list->prepend(10);
        $this->list->prepend(5);
        $this->list->append(20);
        $this->list->prepend(4);
        $this->list->removeLast();
        $this->list->append(25);
        $this->list->append(26);
        $this->list->removeFirst();
        $this->list->append(28);
        $this->list->prepend(3);
        $this->list->append(30);
    }
}
