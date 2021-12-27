<?php
declare(strict_types=1);

namespace LessValueObjectTest\Enum\Exception;

use LessValueObject\Enum\EnumValueObject;
use LessValueObject\Enum\Exception\UnknownCase;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Enum\Exception\UnknownCase
 */
final class UnknownCaseTest extends TestCase
{
    public function testConstruct(): void
    {
        $e = new UnknownCase(EnumValueObject::class, 'fiz');

        self::assertSame(EnumValueObject::class, $e->enum);
        self::assertSame('fiz', $e->unknown);
    }
}
