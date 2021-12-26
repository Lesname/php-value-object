<?php
declare(strict_types=1);

namespace LessValueObjectTest\String;

use LessValueObject\String\PhoneNumber;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\PhoneNumber
 */
final class PhoneNumberTest extends TestCase
{
    public function testConstraints(): void
    {
        self::assertSame(5, PhoneNumber::getMinLength());
        self::assertSame(20, PhoneNumber::getMaxLength());
    }
}
