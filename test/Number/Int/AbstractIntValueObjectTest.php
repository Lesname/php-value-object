<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int;

use LessValueObject\Number\Int\AbstractIntValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\AbstractIntValueObject
 */
final class AbstractIntValueObjectTest extends TestCase
{
    public function testGetValue(): void
    {
        $mock = $this->getMockForAbstractClass(AbstractIntValueObject::class, [1]);

        self::assertSame(1, $mock->getValue());
    }

    public function testPrecision(): void
    {
        $mock = $this->getMockForAbstractClass(AbstractIntValueObject::class, [2]);

        self::assertSame(0, $mock->getPrecision());
    }
}
