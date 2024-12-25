<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int\Date;

use LessValueObject\Number\Int\Date\Year;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\Date\Year
 */
final class YearTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(1, Year::getMinimumValue());
        self::assertSame(9999, Year::getMaximumValue());
    }
}
