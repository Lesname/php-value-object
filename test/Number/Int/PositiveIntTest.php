<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int;

use LessValueObject\Number\Int\PositiveInt;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\PositiveInt
 */
final class PositiveIntTest extends TestCase
{
    public function testLength(): void
    {
        self::assertSame(0, PositiveInt::getMinValue());
        self::assertSame(PHP_INT_MAX, PositiveInt::getMaxValue());
    }
}
