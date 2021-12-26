<?php
declare(strict_types=1);

namespace LessValueObjectTest\String\Format;

use LessValueObject\String\Format\AbstractRegexpFormattedStringValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\Format\AbstractRegexpFormattedStringValueObject
 */
final class AbstractRegexpFormattedStringValueObjectTest extends TestCase
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

    private function makeMock(): AbstractRegexpFormattedStringValueObject
    {
        return new class ('abc') extends AbstractRegexpFormattedStringValueObject {
            public static function getRegexPattern(): string
            {
                return '^[a-c]{1,3}$';
            }

            public static function getMinLength(): int
            {
                return 1;
            }

            public static function getMaxLength(): int
            {
                return 3;
            }
        };
    }
}
