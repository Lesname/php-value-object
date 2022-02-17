<?php
declare(strict_types=1);

namespace LessValueObjectTest\Composite;

use LessValueObject\Composite\Exception\CannotParseReference;
use LessValueObject\Composite\ForeignReference;
use LessValueObject\String\Exception\TooLong;
use LessValueObject\String\Exception\TooShort;
use LessValueObject\String\Format\Exception\NotFormat;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Composite\ForeignReference
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
