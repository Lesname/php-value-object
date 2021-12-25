<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Exception;

use LessValueObject\Number\Exception\PrecisionOutBounds;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Exception\PrecisionOutBounds
 */
final class PrecisionOutBoundsTest extends TestCase
{
    public function testSetup(): void
    {
        $e = new PrecisionOutBounds(1, 2);

        self::assertSame(1, $e->precision);
        self::assertSame(2, $e->given);
    }
}
