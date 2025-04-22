<?php
declare(strict_types=1);

namespace LesValueObjectTest\Number\Int\Date;

use LesValueObject\Number\Int\Date\Day;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Int\Date\Day
 */
final class DayTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(1, Day::getMinimumValue());
        self::assertSame(31, Day::getMaximumValue());
    }
}
