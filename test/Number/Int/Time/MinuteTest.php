<?php
declare(strict_types=1);

namespace LesValueObjectTest\Number\Int\Time;

use LesValueObject\Number\Int\Time\Minute;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Int\Time\Minute
 */
final class MinuteTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(0, Minute::getMinimumValue());
        self::assertSame(59, Minute::getMaximumValue());
    }
}
