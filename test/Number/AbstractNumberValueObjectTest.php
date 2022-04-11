<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number;

use LessValueObject\Number\AbstractNumberValueObject;
use LessValueObject\Number\Exception\MaxOutBounds;
use LessValueObject\Number\Exception\MinOutBounds;
use LessValueObject\Number\Exception\PrecisionOutBounds;
use LessValueObject\Number\Exception\Uncomparable;
use LessValueObject\Number\Int\IntValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\AbstractNumberValueObject
 */
final class AbstractNumberValueObjectTest extends TestCase
{
    public function testJson(): void
    {
        $mock = $this->makeMock(1, 0, 0, 2);

        self::assertSame(1, $mock->jsonSerialize());
    }

    public function testToString(): void
    {
        $mock = $this->makeMock(1.2, 1, 0, 1.2);

        self::assertSame('1.2', $mock->__toString());
    }

    /**
     * @throws Uncomparable
     */
    public function testIsGreater(): void
    {
        $mock = $this->makeMock(1.4, 1, 0, 1.5);

        self::assertTrue($mock->isGreater(2));
        self::assertFalse($mock->isGreater(1));
    }

    /**
     * @throws Uncomparable
     */
    public function testIsLower(): void
    {
        $mock = $this->makeMock(1.2, 1, 0, 1.2);

        self::assertTrue($mock->isLower(1.1));
        self::assertFalse($mock->isLower(1.3));
    }

    /**
     * @throws Uncomparable
     */
    public function testIsSame(): void
    {
        $mock = $this->makeMock(1.2, 1, 0, 1.2);

        self::assertTrue($mock->isSame($mock));
        self::assertTrue($mock->isSame(1.2));
        self::assertFalse($mock->isSame(1.3));
    }

    public function testNotComparable(): void
    {
        $this->expectException(Uncomparable::class);

        $mock = $this->makeMock(1.2, 1, 0, 2);
        $other = $this->createMock(IntValueObject::class);

        $mock->isSame($other);
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

    public function testPreviounsOutBounds(): void
    {
        $this->expectException(PrecisionOutBounds::class);

        $this->makeMock(1.2, 0, 1, 2);
    }

    public function testDiff(): void
    {
        $base = $this->makeMock(1, 1, 0, 2);
        $with = $this->makeMock(2, 1, 0, 2);

        self::assertSame(1, $base->diff($with));
    }

    private function makeMock(float | int $value, int $precision, float | int $min, float | int $max): AbstractNumberValueObject
    {
        return new class ($value, $precision, $min, $max) extends AbstractNumberValueObject {
            private static int $precision;
            private static float | int $min;
            private static float | int $max;

            public function __construct(float | int $value, int $precision, float | int $min, float | int $max)
            {
                self::$precision = $precision;
                self::$min = $min;
                self::$max = $max;

                parent::__construct($value);
            }

            public static function getPrecision(): int
            {
                return self::$precision;
            }

            public static function getMinValue(): float|int
            {
                return self::$min;
            }

            public static function getMaxValue(): float|int
            {
                return self::$max;
            }
        };
    }
}
