<?php

declare(strict_types=1);

namespace LesValueObjectTest\Composite;

use LesValueObject\Composite\AbstractCompositeValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Composite\AbstractCompositeValueObject
 */
final class AbstractCompositeValueObjectTest extends TestCase
{
    public function testJson(): void
    {
        $mock = new class extends AbstractCompositeValueObject {
            public string $fiz = 'foo';

            public int $bar = 1;
        };

        self::assertEquals(
            (object)[
                'fiz' => 'foo',
                'bar' => 1,
            ],
            $mock->jsonSerialize(),
        );
    }
}
