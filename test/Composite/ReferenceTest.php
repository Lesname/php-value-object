<?php
declare(strict_types=1);

namespace LessValueObjectTest\Composite;

use LessValueObject\Composite\Exception\CannotParseReference;
use LessValueObject\Composite\Reference;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Composite\Reference
 */
final class ReferenceTest extends TestCase
{
    public function testFromString(): void
    {
        $reference = Reference::fromString('foo.bar/9a09326e-340e-4634-a70d-ffe4eb3735a0');

        self::assertSame('foo.bar', (string)$reference->type);
        self::assertSame('9a09326e-340e-4634-a70d-ffe4eb3735a0', (string)$reference->id);
    }

    public function testFromStringInvalidFormat(): void
    {
        $this->expectException(CannotParseReference::class);

        Reference::fromString('abc');
    }

    public function testFromArray(): void
    {
        $reference = Reference::fromArray(
            [
                'type' => 'foo.bar',
                'id' => '9a09326e-340e-4634-a70d-ffe4eb3735a0',
            ],
        );

        self::assertSame('foo.bar', (string)$reference->type);
        self::assertSame('9a09326e-340e-4634-a70d-ffe4eb3735a0', (string)$reference->id);
    }

    public function testToString(): void
    {
        $reference = Reference::fromArray(
            [
                'type' => 'foo.bar',
                'id' => '9a09326e-340e-4634-a70d-ffe4eb3735a0',
            ],
        );

        self::assertSame('foo.bar/9a09326e-340e-4634-a70d-ffe4eb3735a0', (string)$reference);
    }
}
