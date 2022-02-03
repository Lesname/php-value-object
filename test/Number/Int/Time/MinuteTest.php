<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int\Time;

use LessValueObject\Number\Int\Time\Minute;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\Time\Minute
 */
final class MinuteTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(0, Minute::getMinValue());
        self::assertSame(59, Minute::getMaxValue());
    }
}
