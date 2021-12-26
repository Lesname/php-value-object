<?php
declare(strict_types=1);

namespace LessValueObjectTest\String;

use LessValueObject\String\AbstractStringValueObject;
use LessValueObject\String\Exception\TooLong;
use LessValueObject\String\Exception\TooShort;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\String\AbstractStringValueObject
 */
final class AbstractStringValueObjectTest extends TestCase
{
    public function testToString(): void
    {
        $mock = $this->makeMock('foo', 2, 3);

        self::assertSame('foo', (string)$mock);
    }

    public function testJson(): void
    {
        $mock = $this->makeMock('bar', 3, 4);

        self::assertSame('bar', $mock->jsonSerialize());
    }

    public function testTooShort(): void
    {
        $this->expectException(TooShort::class);

        $this->makeMock('', 1, 3);
    }

    public function testTooLong(): void
    {
        $this->expectException(TooLong::class);

        $this->makeMock('biz', 0, 2);
    }

    private function makeMock(string $string, int $minLength, int $maxLength): AbstractStringValueObject
    {
        return new class ($string, $minLength, $maxLength) extends AbstractStringValueObject {
            private static int $minLength;
            private static int $maxLength;

            public function __construct(string $string, int $minLength, int $maxLength)
            {
                self::$minLength = $minLength;
                self::$maxLength = $maxLength;

                parent::__construct($string);
            }

            public static function getMinLength(): int
            {
                return self::$minLength;
            }

            public static function getMaxLength(): int
            {
                return self::$maxLength;
            }
        };
    }
}
