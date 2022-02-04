<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int\Time;

use LessValueObject\Number\Int\Time\Hour;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\Time\Hour
 */
final class HourTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(0, Hour::getMinValue());
        self::assertSame(23, Hour::getMaxValue());
    }
}
