<?php

declare(strict_types=1);

namespace LesValueObjectTest\String\Format;

use LesValueObject\String\Format\EmailAddress;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\String\Format\EmailAddress
 */
final class EmailAddressTest extends TestCase
{
    public function testLengthConstraint(): void
    {
        self::assertSame(5, EmailAddress::getMinimumLength());
        self::assertSame(255, EmailAddress::getMaximumLength());
    }

    public function testFormat(): void
    {
        self::assertTrue(EmailAddress::isFormat('fœo@bar.nl'));
        self::assertFalse(EmailAddress::isFormat('foo'));
    }

    public function testGetters(): void
    {
        self::assertSame('foo.nl', (new EmailAddress('bar@foo.nl'))->getHost());
        self::assertSame('foo.nl', (new EmailAddress('a."b@c".d."@".e.f@foo.nl'))->getHost());

        self::assertSame('bar', (new EmailAddress('bar@foo.nl'))->getName());
        self::assertSame('a."b@c".d."@".e.f', (new EmailAddress('a."b@c".d."@".e.f@foo.nl'))->getName());
    }
}
