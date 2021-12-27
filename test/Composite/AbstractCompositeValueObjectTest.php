<?php
declare(strict_types=1);

namespace LessValueObjectTest\Composite;

use LessValueObject\Composite\AbstractCompositeValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Composite\AbstractCompositeValueObject
 */
final class AbstractCompositeValueObjectTest extends TestCase
{
    public function testJson(): void
    {
        $mock = new class extends AbstractCompositeValueObject {
            public string $fiz = 'foo';

            public int $bar = 1;
        };

        self::assertSame(
            [
                'fiz' => 'foo',
                'bar' => 1,
            ],
            $mock->jsonSerialize(),
        );
    }
}
