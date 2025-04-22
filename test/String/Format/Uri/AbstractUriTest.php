<?php
declare(strict_types=1);

namespace LesValueObjectTest\String\Format\Uri;

use LesValueObject\String\Format\Uri\AbstractUri;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\String\Format\Uri\AbstractUri
 */
final class AbstractUriTest extends TestCase
{
    public function testIsFormat(): void
    {
        $class = new class ('fiz://biz') extends AbstractUri {
            protected static function isSupportedScheme(string $scheme): bool
            {
                return $scheme === 'fiz' || $scheme === 'biz';
            }
        };

        self::assertTrue($class::isFormat('fiz://fiz.biz/bar'));
        self::assertTrue($class::isFormat('biz://fiz.biz/bar'));
        self::assertFalse($class::isFormat('http://fiz.biz/bar'));
        self::assertFalse($class::isFormat('ftp://fiz.biz/bar'));
        self::assertFalse($class::isFormat('fiz.biz/bar'));
        self::assertFalse($class::isFormat('ab'));
        self::assertFalse($class::isFormat('://'));
    }

    public function testLengthConstraint(): void
    {
        $class = new class ('fiz://biz') extends AbstractUri {
            protected static function isSupportedScheme(string $scheme): bool
            {
                return $scheme === 'fiz' || $scheme === 'biz';
            }
        };

        self::assertSame(5, $class::getMinimumLength());
        self::assertSame(999, $class::getMaximumLength());
    }
}
