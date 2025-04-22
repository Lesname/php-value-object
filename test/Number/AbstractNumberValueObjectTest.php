<?php
declare(strict_types=1);

namespace LesValueObjectTest\Number;

use LesValueObject\Number\Exception\NotMultipleOf;
use LesValueObject\Number\AbstractNumberValueObject;
use LesValueObject\Number\Exception\MaxOutBounds;
use LesValueObject\Number\Exception\MinOutBounds;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\AbstractNumberValueObject
 */
final class AbstractNumberValueObjectTest extends TestCase
{
    public function testJson(): void
    {
        $mock = $this->makeMock(1, 1, 0, 2);

        self::assertSame(1, $mock->jsonSerialize());
    }

    public function testToString(): void
    {
        $mock = $this->makeMock(1.2, .1, 0, 1.2);

        self::assertSame('1.2', $mock->__toString());
    }

    public function testIsGreater(): void
    {
        $mock = $this->makeMock(1.4, .1, 0, 1.5);

        self::assertTrue($mock->isGreater(2));
        self::assertFalse($mock->isGreater(1));
    }

    public function testIsLower(): void
    {
        $mock = $this->makeMock(1.2, .1, 0, 1.2);

        self::assertTrue($mock->isLower(1.1));
        self::assertFalse($mock->isLower(1.3));
    }

    public function testIsSame(): void
    {
        $mock = $this->makeMock(1.2, .1, 0, 1.2);

        self::assertTrue($mock->isSame($mock));
        self::assertTrue($mock->isSame(1.2));
        self::assertFalse($mock->isSame(1.3));
    }

    public function testMinOutBounds(): void
    {
        $this->expectException(MinOutBounds::class);

        $this->makeMock(0, 0, 1, 2);
    }

    public function testMaxOutBounds(): void
    {
        $this->expectException(MaxOutBounds::class);

        $this->makeMock(3, 0, 1, 2);
    }

    public function testNotMultipleOf(): void
    {
        $this->expectException(NotMultipleOf::class);

        $this->makeMock(1.2, 1, 1, 2);
    }

    public function testDiff(): void
    {
        $base = $this->makeMock(1, 1, 0, 2);
        $with = $this->makeMock(2, 1, 0, 2);

        self::assertSame(1, $base->diff($with));
    }

    private function makeMock(float | int $value, float | int $multipleOf, float | int $min, float | int $max): AbstractNumberValueObject
    {
        return new class ($value, $multipleOf, $min, $max) extends AbstractNumberValueObject {
            public static float | int $multipleOf;
            public static float | int $min;
            public static float | int $max;

            public function __construct(float | int $value, float | int $multipleOf, float | int $min, float | int $max)
            {
                self::$multipleOf = $multipleOf;
                self::$min = $min;
                self::$max = $max;

                parent::__construct($value);
            }

            public static function getMultipleOf(): float | int
            {
                return self::$multipleOf;
            }

            public static function getMinimumValue(): float|int
            {
                return self::$min;
            }

            public static function getMaximumValue(): float|int
            {
                return self::$max;
            }
        };
    }
}
