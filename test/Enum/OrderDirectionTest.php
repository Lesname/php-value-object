<?php

declare(strict_types=1);

namespace LesValueObjectTest\Enum;

use LesValueObject\Enum\OrderDirection;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Enum\OrderDirection
 */
final class OrderDirectionTest extends TestCase
{
    public function testAsSql(): void
    {
        self::assertSame('asc', OrderDirection::Ascending->asSQL());
        self::assertSame('desc', OrderDirection::Descending->asSQL());
    }
}
