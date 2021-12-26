<?php
declare(strict_types=1);

namespace LessValueObjectTest\String\Format;

use LessValueObject\String\Format\AbstractFormattedStringValueObject;
use LessValueObject\String\Format\Exception\NotFormat;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\Format\AbstractFormattedStringValueObject
 */
final class AbstractFormattedStringValueObjectTest extends TestCase
{
    public function testIsFormat(): void
    {
        $mock = $this->makeMock('fiz', true);

        self::assertSame('fiz', (string)$mock);
    }

    public function testNotFormat(): void
    {
        $this->expectException(NotFormat::class);

        $this->makeMock('fiz', false);
    }

    public function makeMock(string $string, bool $isFormat): AbstractFormattedStringValueObject
    {
        return new class ($string, $isFormat) extends AbstractFormattedStringValueObject {
            private static bool $isFormat;

            public function __construct(string $input, bool $isFormat)
            {
                self::$isFormat = $isFormat;

                parent::__construct($input);
            }

            public static function isFormat(string $input): bool
            {
                return self::$isFormat;
            }

            public static function getMinLength(): int
            {
                return 0;
            }

            public static function getMaxLength(): int
            {
                return 100;
            }
        };
    }
}
