<?php
declare(strict_types=1);

namespace LessValueObjectTest\Enum;

use LessValueObject\Enum\OrderDirection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Enum\OrderDirection
 */
final class OrderDirectionTest extends TestCase
{
    public function testAscending(): void
    {
        $asc = OrderDirection::Ascending;

        self::assertSame('asc', $asc->jsonSerialize());
    }

    public function testDescending(): void
    {
        $desc = OrderDirection::Descending;

        self::assertSame('desc', $desc->jsonSerialize());
    }

    public function testAsSql(): void
    {
        self::assertSame('asc', OrderDirection::Ascending->asSQL());
        self::assertSame('desc', OrderDirection::Descending->asSQL());
    }
}
