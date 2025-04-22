<?php
declare(strict_types=1);

namespace LesValueObjectTest\Composite;

use LesValueObject\Composite\AbstractPartialCompositeValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Composite\AbstractPartialCompositeValueObject
 */
class AbstractPartialCompositeValueObjectTest extends TestCase
{
    public function testJson(): void
    {
        $mock = new class extends AbstractPartialCompositeValueObject {
            public int $bar = 1;
            public ?int $fiz = null;
        };

        self::assertEquals(
            (object)[
                'bar' => 1,
            ],
            $mock->jsonSerialize(),
        );
    }
}
