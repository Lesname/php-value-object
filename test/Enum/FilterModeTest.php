<?php
declare(strict_types=1);

namespace LessValueObjectTest\Enum;

use LessValueObject\Enum\FilterMode;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Enum\FilterMode
 */
final class FilterModeTest extends TestCase
{
    public function testInclusive(): void
    {
        $inc = FilterMode::Inclusive;

        self::assertSame('inclusive', $inc->jsonSerialize());
    }

    public function testExclusive(): void
    {
        $exc = FilterMode::Exclusive;

        self::assertSame('exclusive', $exc->jsonSerialize());
    }
}
