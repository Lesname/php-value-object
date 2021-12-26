<?php
declare(strict_types=1);

namespace LessValueObjectTest\String\Format;

use LessValueObject\String\Format\EmailAddress;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\Format\EmailAddress
 */
final class EmailAddressTest extends TestCase
{
    public function testLengthConstraint(): void
    {
        self::assertSame(5, EmailAddress::getMinLength());
        self::assertSame(255, EmailAddress::getMaxLength());
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
