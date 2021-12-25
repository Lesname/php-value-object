<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Exception;

use LessValueObject\Number\Exception\MaxOutBounds;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Exception\MaxOutBounds
 */
final class MaxOutBoundsTest extends TestCase
{
    public function testSetup(): void
    {
        $e = new MaxOutBounds(1, 2);

        self::assertSame(1, $e->max);
        self::assertSame(2, $e->given);
    }
}
