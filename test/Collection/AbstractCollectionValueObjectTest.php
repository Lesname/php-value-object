<?php
declare(strict_types=1);

namespace LessValueObjectTest\Collection;

use LessValueObject\Collection\AbstractCollectionValueObject;
use LessValueObject\Collection\Exception\TooFewItems;
use LessValueObject\Collection\Exception\TooManyItems;
use LessValueObject\ValueObject;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LessValueObject\Collection\AbstractCollectionValueObject
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
