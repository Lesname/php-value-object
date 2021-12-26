<?php
declare(strict_types=1);

namespace LessValueObjectTest\String\Format;

use LessValueObject\String\Format\Uri;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\Format\Uri
 */
final class UriTest extends TestCase
{
    public function testIsFormat(): void
    {
        self::assertTrue(Uri::isFormat('https://www.google.com/fiz#bar'));
        self::assertFalse(Uri::isFormat('fiz'));
    }

    public function testLengthConstraint(): void
    {
        self::assertSame(1, Uri::getMinLength());
        self::assertSame(999, Uri::getMaxLength());
    }
}
