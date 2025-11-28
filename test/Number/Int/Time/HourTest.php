<?php

declare(strict_types=1);

namespace LesValueObjectTest\Number\Int\Time;

use LesValueObject\Number\Int\Time\Hour;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Int\Time\Hour
 */
final class HourTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(0, Hour::getMinimumValue());
        self::assertSame(23, Hour::getMaximumValue());
    }
}
