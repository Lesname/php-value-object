<?php

declare(strict_types=1);

namespace LesValueObjectTest\String\Format;

use Stringable;
use LesValueObject\String\Format\AbstractStringFormatValueObject;
use LesValueObject\String\Format\Exception\NotFormat;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\String\Format\AbstractStringFormatValueObject
 */
final class AbstractStringFormatValueObjectTest extends TestCase
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

    public function makeMock(string $string, bool $isFormat): AbstractStringFormatValueObject
    {
        return new class ($string, $isFormat) extends AbstractStringFormatValueObject {
            private static bool $isFormat;

            public function __construct(Stringable|string $input, bool $isFormat = true)
            {
                self::$isFormat = $isFormat;

                parent::__construct($input);
            }

            public static function isFormat(string $input): bool
            {
                return self::$isFormat;
            }

            public static function getMinimumLength(): int
            {
                return 0;
            }

            public static function getMaximumLength(): int
            {
                return 100;
            }
        };
    }
}
