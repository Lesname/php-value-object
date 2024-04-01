<?php
declare(strict_types=1);

namespace LessValueObjectTest\Composite;

use Throwable;
use LessValueObject\Composite\DynamicCompositeValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Composite\DynamicCompositeValueObject
 */
class DynamicCompositeValueObjectTest extends TestCase
{
    public function testOffsetExists(): void
    {
        $obj = new DynamicCompositeValueObject(
            [
                'foo' => 'bar',
                'fiz' => null,
            ],
        );

        self::assertTrue($obj->offsetExists('foo'));
        self::assertTrue($obj->offsetExists('fiz'));
        self::assertFalse($obj->offsetExists('bar'));
    }

    public function testOffsetGet(): void
    {
        $obj = new DynamicCompositeValueObject(
            ['foo' => 'bar',],
        );

        self::assertSame('bar', $obj->offsetGet('foo'));
    }

    public function testGetNotExists(): void
    {
        $this->expectException(Throwable::class);

        $obj = new DynamicCompositeValueObject(
            ['foo' => 'bar',],
        );

        $obj->offsetGet('biz');
    }

    public function testOffsetSet(): void
    {
        $this->expectException(Throwable::class);

        $obj = new DynamicCompositeValueObject([]);
        $obj->offsetSet('fiz', 'biz');
    }

    public function testOffsetUnset(): void
    {
        $this->expectException(Throwable::class);

        $obj = new DynamicCompositeValueObject([]);
        $obj->offsetUnset('fiz');
    }
}
