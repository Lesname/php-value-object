<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int\Date;

use LessValueObject\Number\Int\Date\Week;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\Date\Week
 */
final class WeekTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(1, Week::getMinimumValue());
        self::assertSame(53, Week::getMaximumValue());
    }
}
