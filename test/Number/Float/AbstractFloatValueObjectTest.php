<?php

declare(strict_types=1);

namespace LesValueObjectTest\Number\Float;

use LesValueObject\Number\Exception\NotMultipleOf;
use LesValueObject\Number\Float\AbstractFloatValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Float\AbstractFloatValueObject
 */
class AbstractFloatValueObjectTest extends TestCase
{
    public function testMultipleOfFloat(): void
    {
        $mock = new class (3.0) extends AbstractFloatValueObject {
            public static function getMultipleOf(): int|float
            {
                return 1.5;
            }

            public static function getMinimumValue(): float
            {
                return 1.0;
            }

            public static function getMaximumValue(): float
            {
                return 5.0;
            }
        };

        self::assertSame(3.0, $mock->value);
    }

    public function testMultipleOfFloatENotationValid(): void
    {
        $mock = new class (3.00001) extends AbstractFloatValueObject {
            public static function getMultipleOf(): int|float
            {
                return .00001;
            }

            public static function getMinimumValue(): float
            {
                return 1.0;
            }

            public static function getMaximumValue(): float
            {
                return 5.0;
            }
        };

        self::assertSame(3.00001, $mock->value);
    }

    public function testMultipleOfFloatENotationInvalid(): void
    {
        $this->expectException(NotMultipleOf::class);

        new class (3.00001) extends AbstractFloatValueObject {
            public static function getMultipleOf(): int|float
            {
                return .00002;
            }

            public static function getMinimumValue(): float
            {
                return 1.0;
            }

            public static function getMaximumValue(): float
            {
                return 5.0;
            }
        };
    }

    public function testFormat(): void
    {
        $mock = new class (1234.56) extends AbstractFloatValueObject {
            public static function getMultipleOf(): int|float
            {
                return .01;
            }

            public static function getMinimumValue(): float
            {
                return -999_999.99;
            }

            public static function getMaximumValue(): float
            {
                return 999_999.99;
            }
        };

        self::assertSame('1,234.56', $mock->format(2));
        self::assertSame('1,234.6', $mock->format(1));

        self::assertSame('1.234,56', $mock->format(2, ',', '.'));
    }

    public function testRound(): void
    {
        $mock = new class (1234.56) extends AbstractFloatValueObject {
            public static function getMultipleOf(): int|float
            {
                return .01;
            }

            public static function getMinimumValue(): float
            {
                return -999_999.99;
            }

            public static function getMaximumValue(): float
            {
                return 999_999.99;
            }
        };

        self::assertSame(1_234.6, $mock->round(1));
    }
}
