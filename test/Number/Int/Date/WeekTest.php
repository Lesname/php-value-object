<?php
declare(strict_types=1);

namespace LesValueObjectTest\Number\Int\Date;

use LesValueObject\Number\Int\Date\Week;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Int\Date\Week
 */
final class WeekTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(1, Week::getMinimumValue());
        self::assertSame(53, Week::getMaximumValue());
    }
}
