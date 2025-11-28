<?php

declare(strict_types=1);

namespace LesValueObjectTest\Number\Int;

use LesValueObject\Number\Int\Negative;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Int\Negative
 */
final class NegativeTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(PHP_INT_MIN, Negative::getMinimumValue());
        self::assertSame(-1, Negative::getMaximumValue());
    }
}
