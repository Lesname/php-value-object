<?php

declare(strict_types=1);

namespace LesValueObjectTest\Number\Int\Time;

use LesValueObject\Number\Int\Time\Second;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Int\Time\Second
 */
final class SecondTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(0, Second::getMinimumValue());
        self::assertSame(59, Second::getMaximumValue());
    }
}
