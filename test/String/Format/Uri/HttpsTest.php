<?php
declare(strict_types=1);

namespace LesValueObjectTest\String\Format\Uri;

use LesValueObject\String\Format\Uri\Https;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\String\Format\Uri\Https
 */
final class HttpsTest extends TestCase
{
    public function testIsFormat(): void
    {
        self::assertTrue(Https::isFormat('https://fiz.biz/bar?abc=xyz#123'));
        self::assertTrue(Https::isFormat('https://example.com'));
        self::assertFalse(Https::isFormat('http://fiz.biz/bar'));
        self::assertFalse(Https::isFormat('ftp://fiz.biz/bar'));
        self::assertFalse(Https::isFormat('fiz.biz/bar'));
        self::assertFalse(Https::isFormat('ab'));
        self::assertFalse(Https::isFormat('://'));
    }
}
