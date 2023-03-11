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
    public function testHas(): void
    {
        $obj = new DynamicCompositeValueObject(
            [
                'foo' => 'bar',
                'fiz' => null,
            ],
        );

        self::assertTrue($obj->has('foo'));
        self::assertTrue($obj->has('fiz'));
        self::assertFalse($obj->has('bar'));
    }

    public function testGet(): void
    {
        $obj = new DynamicCompositeValueObject(
            ['foo' => 'bar',],
        );

        self::assertSame('bar', $obj->get('foo'));
    }

    public function testGetNotExists(): void
    {
        $this->expectException(Throwable::class);

        $obj = new DynamicCompositeValueObject(
            ['foo' => 'bar',],
        );

        $obj->get('biz');
    }
}
