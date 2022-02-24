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
    public function testJson(): void
    {
        $inc = FilterMode::All;

        self::assertSame('all', $inc->jsonSerialize());
    }

    public function testGetValue(): void
    {
        $inc = FilterMode::Any;

        self::assertSame('any', $inc->getValue());
    }
}
