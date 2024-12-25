<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int\Time;

use LessValueObject\Number\Int\Time\Second;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\Time\Second
 */
final class SecondTest extends TestCase
{
    public function testRange(): void
    {
        self::assertSame(0, Second::getMinimumValue());
        self::assertSame(59, Second::getMaximumValue());
    }
}
