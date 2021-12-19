<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number;

use LessValueObject\Number\AbstractNumberValueObject;
use PHPUnit\Framework\TestCase;
use Throwable;

/**
 * @covers \LessValueObject\Number\AbstractNumberValueObject
 */
final class AbstractNumberValueObjectTest extends TestCase
{
    public function testJson(): void
    {
        $mock = $this->getMockForAbstractClass(AbstractNumberValueObject::class, [1]);

        self::assertSame(1, $mock->jsonSerialize());
    }

    public function testToString(): void
    {
        $mock = $this->getMockForAbstractClass(AbstractNumberValueObject::class, [1.2]);

        self::assertSame('1.2', $mock->__toString());
    }

    public function testIsGreater(): void
    {
        $mock = $this->getMockForAbstractClass(AbstractNumberValueObject::class, [1.2]);

        self::assertTrue($mock->isGreater(2));
        self::assertFalse($mock->isGreater(1));
    }

    public function testIsLower(): void
    {
        $mock = $this->getMockForAbstractClass(AbstractNumberValueObject::class, [1.2]);

        self::assertTrue($mock->isLower(1.1));
        self::assertFalse($mock->isLower(1.3));
    }

    public function testIsSame(): void
    {
        $mock = $this->getMockForAbstractClass(AbstractNumberValueObject::class, [1.2]);

        self::assertTrue($mock->isSame($mock));
        self::assertTrue($mock->isSame(1.2));
        self::assertFalse($mock->isSame(1.3));
    }

    public function testNotComparable(): void
    {
        $this->expectException(Throwable::class);

        $mock = $this->getMockForAbstractClass(AbstractNumberValueObject::class, [1.2], 'fiz');
        $other = $this->getMockForAbstractClass(AbstractNumberValueObject::class, [1.2], 'biz');

        $mock->isSame($other);
    }
}
