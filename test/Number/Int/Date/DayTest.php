<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int\Date;

use LessValueObject\Number\Int\Date\Day;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\Date\Day
 */
final class DayTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(1, Day::getMinimumValue());
        self::assertSame(31, Day::getMaximumValue());
    }
}
