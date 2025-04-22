<?php
declare(strict_types=1);

namespace LesValueObjectTest\String;

use LesValueObject\String\PhoneNumber;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\String\PhoneNumber
 */
final class PhoneNumberTest extends TestCase
{
    public function testConstraints(): void
    {
        self::assertSame(5, PhoneNumber::getMinimumLength());
        self::assertSame(20, PhoneNumber::getMaximumLength());
    }
}
