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
    public function testCases(): void
    {
        self::assertSame(
            [
                'exclusive',
                'inclusive',
            ],
            FilterMode::cases(),
        );
    }

    public function testInclusive(): void
    {
        $inc = FilterMode::inclusive();

        self::assertSame('inclusive', $inc->value);
    }

    public function testExclusive(): void
    {
        $exc = FilterMode::exclusive();

        self::assertSame('exclusive', $exc->value);
    }
}
