<?php
declare(strict_types=1);

namespace LesValueObjectTest\Number\Exception;

use LesValueObject\Number\Exception\MinOutBounds;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Exception\MinOutBounds
 */
final class MinOutBoundsTest extends TestCase
{
    public function testSetup(): void
    {
        $e = new MinOutBounds(1, 2);

        self::assertSame(1, $e->precision);
        self::assertSame(2, $e->given);
    }
}
