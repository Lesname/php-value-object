<?php
declare(strict_types=1);

namespace LessValueObjectTest\String;

use LessValueObject\String\UtmParameter;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\UtmParameter
 */
final class UtmParameterTest extends TestCase
{
    public function testConstraints(): void
    {
        self::assertSame(1, UtmParameter::getMinLength());
        self::assertSame(100, UtmParameter::getMaxLength());
    }
}
