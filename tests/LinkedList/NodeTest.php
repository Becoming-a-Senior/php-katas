<?php

declare(strict_types=1);

namespace Tests\LinkedList;

use Katas\LinkedList\LinkedListNode;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(LinkedListNode::class)]
final class NodeTest extends TestCase
{
    public function testInitNode(): void
    {
        $node = new LinkedListNode(10, new LinkedListNode(20));
        $this->assertEquals(10, $node->value);
        $this->assertInstanceOf(LinkedListNode::class, $node->next);
        $this->assertEquals(20, $node->next->value);
        $this->assertEquals(null, $node->next->next);
    }
}
