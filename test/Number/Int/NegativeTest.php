<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int;

use LessValueObject\Number\Int\Negative;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\Negative
 */
final class NegativeTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(PHP_INT_MIN, Negative::getMinValue());
        self::assertSame(-1, Negative::getMaxValue());
    }
}
