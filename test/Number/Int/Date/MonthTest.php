<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int\Date;

use LessValueObject\Number\Int\Date\Month;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\Date\Month
 */
final class MonthTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(1, Month::getMinValue());
        self::assertSame(12, Month::getMaxValue());
    }
}
