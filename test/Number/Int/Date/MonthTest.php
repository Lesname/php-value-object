<?php
declare(strict_types=1);

namespace LesValueObjectTest\Number\Int\Date;

use LesValueObject\Number\Int\Date\Month;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Int\Date\Month
 */
final class MonthTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(1, Month::getMinimumValue());
        self::assertSame(12, Month::getMaximumValue());
    }
}
