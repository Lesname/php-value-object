<?php

declare(strict_types=1);

namespace LesValueObjectTest\Composite;

use LesValueObject\Composite\Exception\CannotParseReference;
use LesValueObject\Composite\ForeignReference;
use LesValueObject\String\Exception\TooLong;
use LesValueObject\String\Exception\TooShort;
use LesValueObject\String\Format\Exception\NotFormat;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Composite\ForeignReference
 */
final class ForeignReferenceTest extends TestCase
{
    /**
     * @throws TooShort
     * @throws TooLong
     * @throws NotFormat
     * @throws CannotParseReference
     */
    public function testFromString(): void
    {
        $reference = ForeignReference::fromString('foo.bar/9a09326e-340e-4634-a70d-ffe4eb3735a0');

        self::assertSame('foo.bar', (string)$reference->type);
        self::assertSame('9a09326e-340e-4634-a70d-ffe4eb3735a0', (string)$reference->id);
    }

    /**
     * @throws CannotParseReference
     * @throws TooLong
     * @throws TooShort
     * @throws NotFormat
     */
    public function testFromStringInvalidFormat(): void
    {
        $this->expectException(CannotParseReference::class);

        ForeignReference::fromString('abc');
    }

    /**
     * @throws TooShort
     * @throws TooLong
     * @throws NotFormat
     */
    public function testFromArray(): void
    {
        $reference = ForeignReference::fromArray(
            [
                'type' => 'foo.bar',
                'id' => '9a09326e-340e-4634-a70d-ffe4eb3735a0',
            ],
        );

        self::assertSame('foo.bar', (string)$reference->type);
        self::assertSame('9a09326e-340e-4634-a70d-ffe4eb3735a0', (string)$reference->id);
    }

    /**
     * @throws TooShort
     * @throws TooLong
     * @throws NotFormat
     */
    public function testToString(): void
    {
        $reference = ForeignReference::fromArray(
            [
                'type' => 'foo.bar',
                'id' => '9a09326e-340e-4634-a70d-ffe4eb3735a0',
            ],
        );

        self::assertSame('foo.bar/9a09326e-340e-4634-a70d-ffe4eb3735a0', (string)$reference);
    }
}
