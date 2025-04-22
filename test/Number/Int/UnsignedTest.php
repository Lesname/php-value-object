<?php
declare(strict_types=1);

namespace LesValueObjectTest\Number\Int;

use LesValueObject\Number\Int\Unsigned;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Int\Unsigned
 */
final class UnsignedTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(0, Unsigned::getMinimumValue());
        self::assertSame(PHP_INT_MAX, Unsigned::getMaximumValue());
    }
}
