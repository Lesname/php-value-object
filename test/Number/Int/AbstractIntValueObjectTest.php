<?php
declare(strict_types=1);

namespace LessValueObjectTest\Number\Int;

use LessValueObject\Number\AbstractNumberValueObject;
use LessValueObject\Number\Int\AbstractIntValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Number\Int\AbstractIntValueObject
 */
final class AbstractIntValueObjectTest extends TestCase
{
    public function testGetValue(): void
    {
        $mock = $this->makeMock(1, 0, 2);

        self::assertSame(1, $mock->getValue());
    }

    public function testPrecision(): void
    {
        $mock = $this->makeMock(2, 0, 2);

        self::assertSame(0, $mock->getPrecision());
    }

    private function makeMock(int $value, int $min, int $max): AbstractIntValueObject
    {
        return new class ($value, $min, $max) extends AbstractIntValueObject {
            private static int $min;
            private static int $max;

            public function __construct(int $value, int $min, int $max)
            {
                self::$min = $min;
                self::$max = $max;

                parent::__construct($value);
            }

            public static function getMinValue(): int
            {
                return self::$min;
            }

            public static function getMaxValue(): int
            {
                return self::$max;
            }
        };
    }
}
