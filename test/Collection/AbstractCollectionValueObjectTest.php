<?php

declare(strict_types=1);

namespace LesValueObjectTest\Collection;

use LesValueObject\Collection\AbstractCollectionValueObject;
use LesValueObject\Collection\Exception\TooFewItems;
use LesValueObject\Collection\Exception\TooManyItems;
use LesValueObject\ValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LesValueObject\Collection\AbstractCollectionValueObject
 */
final class AbstractCollectionValueObjectTest extends TestCase
{
    public function testMinOutBounds(): void
    {
        $this->expectException(TooFewItems::class);

        new class ([]) extends AbstractCollectionValueObject {
            public static function getMinimumSize(): int
            {
                return 1;
            }

            public static function getMaximumSize(): int
            {
                return 2;
            }

            public static function getItemType(): string
            {
                return ValueObject::class;
            }
        };
    }

    public function testMaxOutBounds(): void
    {
        $this->expectException(TooManyItems::class);

        new class ([1]) extends AbstractCollectionValueObject {
            public static function getMinimumSize(): int
            {
                return 0;
            }

            public static function getMaximumSize(): int
            {
                return 0;
            }

            public static function getItemType(): string
            {
                return ValueObject::class;
            }
        };
    }

    public function testTraversable(): void
    {
        $first = $this->createMock(ValueObject::class);

        $collection = new class ([$first]) extends AbstractCollectionValueObject {
            public static function getMinimumSize(): int
            {
                return 0;
            }

            public static function getMaximumSize(): int
            {
                return 3;
            }


            public static function getItemType(): string
            {
                return ValueObject::class;
            }
        };

        foreach ($collection as $index => $item) {
            self::assertSame(0, $index);
            self::assertSame($first, $item);
        }
    }

    public function testCount(): void
    {
        $first = $this->createMock(ValueObject::class);
        $two = $this->createMock(ValueObject::class);

        $collection = new class ([$first, $two]) extends AbstractCollectionValueObject {
            public static function getMinimumSize(): int
            {
                return 0;
            }

            public static function getMaximumSize(): int
            {
                return 3;
            }


            public static function getItemType(): string
            {
                return ValueObject::class;
            }
        };

        self::assertSame(2, count($collection));
    }

    public function testJson(): void
    {
        $first = $this->createMock(ValueObject::class);
        $two = $this->createMock(ValueObject::class);

        $collection = new class ([$first, $two]) extends AbstractCollectionValueObject {
            public static function getMinimumSize(): int
            {
                return 0;
            }

            public static function getMaximumSize(): int
            {
                return 3;
            }


            public static function getItemType(): string
            {
                return ValueObject::class;
            }
        };

        self::assertSame([$first, $two], $collection->jsonSerialize());
    }
}
