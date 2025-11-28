<?php

declare(strict_types=1);

namespace LesValueObjectTest\Number\Float;

use LesValueObject\Number\Float\AbstractFloatValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Float\AbstractFloatValueObject
 */
class AbstractFloatValueObjectTest extends TestCase
{
    public function testMultipleOfFloat(): void
    {
        $class = new class (3.0) extends AbstractFloatValueObject {
            public static function getMultipleOf(): int|float
            {
                return 1.5;
            }

            public static function getMinimumValue(): float|int
            {
                return 1;
            }

            public static function getMaximumValue(): float|int
            {
                return 5;
            }
        };

        self::assertSame(3.0, $class->value);
    }
}
