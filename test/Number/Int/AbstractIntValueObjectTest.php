<?php

declare(strict_types=1);

namespace LesValueObjectTest\Number\Int;

use LesValueObject\Number\Int\AbstractIntValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Number\Int\AbstractIntValueObject
 */
final class AbstractIntValueObjectTest extends TestCase
{
    public function testGetValue(): void
    {
        $mock = new class (1) extends AbstractIntValueObject {
            public static function getMinimumValue(): int
            {
                return 0;
            }

            public static function getMaximumValue(): int
            {
                return 2;
            }
        };

        self::assertSame(1, $mock->value);
    }
}
