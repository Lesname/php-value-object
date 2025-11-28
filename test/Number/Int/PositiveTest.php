<?php

declare(strict_types=1);

namespace LesValueObjectTest\Number\Int;

use LesValueObject\Number\Int\Positive;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Int\Positive
 */
final class PositiveTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(1, Positive::getMinimumValue());
        self::assertSame(PHP_INT_MAX, Positive::getMaximumValue());
    }
}
