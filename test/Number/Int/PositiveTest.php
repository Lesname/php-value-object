<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int;

use LessValueObject\Number\Int\Positive;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\Positive
 */
final class PositiveTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(1, Positive::getMinValue());
        self::assertSame(PHP_INT_MAX, Positive::getMaxValue());
    }
}
