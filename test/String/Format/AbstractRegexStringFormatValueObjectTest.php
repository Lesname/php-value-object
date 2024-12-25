<?php
declare(strict_types=1);

namespace LessValueObjectTest\String\Format;

use LessValueObject\String\Format\AbstractRegexStringFormatValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\Format\AbstractRegexStringFormatValueObject
 */
final class AbstractRegexStringFormatValueObjectTest extends TestCase
{
    public function testFormat(): void
    {
        $mock = $this->makeMock();

        self::assertTrue($mock->isFormat('a'));
        self::assertTrue($mock->isFormat('ab'));
        self::assertTrue($mock->isFormat('abc'));
        self::assertFalse($mock->isFormat('abcd'));
        self::assertFalse($mock->isFormat('d'));
    }

    private function makeMock(): AbstractRegexStringFormatValueObject
    {
        return new class ('abc') extends AbstractRegexStringFormatValueObject {
            public static function getRegularExpression(): string
            {
                return '/^[a-c]{1,3}$/';
            }

            public static function getMinimumLength(): int
            {
                return 1;
            }

            public static function getMaximumLength(): int
            {
                return 3;
            }
        };
    }
}
