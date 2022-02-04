<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int;

use LessValueObject\Number\Int\Unsigned;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\Unsigned
 */
final class UnsignedTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(0, Unsigned::getMinValue());
        self::assertSame(PHP_INT_MAX, Unsigned::getMaxValue());
    }
}
