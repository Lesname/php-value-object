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
    public function testCases(): void
    {
        self::assertSame(
            [
                'asc',
                'desc',
            ],
            OrderDirection::cases(),
        );
    }

    public function testAscending(): void
    {
        $asc = OrderDirection::ascending();

        self::assertSame('asc', $asc->value);
    }

    public function testDescending(): void
    {
        $desc = OrderDirection::descending();

        self::assertSame('desc', $desc->value);
    }

    public function testAsSql(): void
    {
        self::assertSame('asc', OrderDirection::ascending()->asSQL());
        self::assertSame('desc', OrderDirection::descending()->asSQL());
    }
}
