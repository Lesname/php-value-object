<?php
declare(strict_types=1);

namespace LessValueObjectTest\Enum;

use LessValueObject\Enum\Exception\UnknownCase;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Enum\AbstractEnumValueObject
 */
final class AbstractEnumValueObjectTest extends TestCase
{
    public function testKnownFrom(): void
    {
        $bar = AbstractEnumValueObjectStub::from('bar');
        $bar2 = AbstractEnumValueObjectStub::from('bar');

        self::assertSame('bar', $bar->value);
        self::assertSame($bar, $bar2);
    }

    public function testUnknownFrom(): void
    {
        $this->expectException(UnknownCase::class);

        AbstractEnumValueObjectStub::from('biz');
    }

    public function testKnownTryFrom(): void
    {
        $foo = AbstractEnumValueObjectStub::tryFrom('foo');
        $foo2 = AbstractEnumValueObjectStub::tryFrom('foo');

        self::assertSame('foo', $foo->value);
        self::assertSame($foo, $foo2);
    }

    public function testUnknownTryFrom(): void
    {
        self::assertNull(AbstractEnumValueObjectStub::tryFrom('fiz'));
    }

    public function testToString(): void
    {
        self::assertSame('bar', (string)AbstractEnumValueObjectStub::tryFrom('bar'));
    }

    public function testJson(): void
    {
        self::assertSame('foo', AbstractEnumValueObjectStub::tryFrom('foo')->jsonSerialize());
    }
}
