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
            public static function getMinSize(): int
            {
                return 1;
            }

            public static function getMaxSize(): int
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
            public static function getMinSize(): int
            {
                return 0;
            }

            public static function getMaxSize(): int
            {
                return 0;
            }

            public static function getItemType(): string
            {
                return ValueObject::class;
            }
        };
    }

    public function testMap(): void
    {
        $vo = $this->createMock(ValueObject::class);

        $collection = new class ([$vo]) extends AbstractCollectionValueObject {
            public static function getMinSize(): int
            {
                return 0;
            }

            public static function getMaxSize(): int
            {
                return 1;
            }


            public static function getItemType(): string
            {
                return ValueObject::class;
            }
        };

        $mapper = static fn ($item, $index) => $item === $vo && $index === 0;

        foreach ($collection->map($mapper) as $i) {
            self::assertTrue($i);
        }
    }

    public function testSlice(): void
    {
        $first = $this->createMock(ValueObject::class);
        $two = $this->createMock(ValueObject::class);
        $three = $this->createMock(ValueObject::class);

        $collection = new class ([$first, $two, $three]) extends AbstractCollectionValueObject {
            public static function getMinSize(): int
            {
                return 0;
            }

            public static function getMaxSize(): int
            {
                return 3;
            }


            public static function getItemType(): string
            {
                return ValueObject::class;
            }
        };

        foreach ($collection->slice(1, 1) as $i) {
            self::assertSame($two, $i);
        }
    }

    public function testReduce(): void
    {
        $first = $this->createMock(ValueObject::class);
        $two = $this->createMock(ValueObject::class);
        $three = $this->createMock(ValueObject::class);

        $collection = new class ([$first, $two, $three]) extends AbstractCollectionValueObject {
            public static function getMinSize(): int
            {
                return 0;
            }

            public static function getMaxSize(): int
            {
                return 3;
            }


            public static function getItemType(): string
            {
                return ValueObject::class;
            }
        };

        $result = $collection->reduce(
            function (int $carry, $item, int $index): int {
                return $carry + $index;
            },
            69,
        );

        self::assertSame(72, $result);
    }

    public function testFind(): void
    {
        $first = $this->createMock(ValueObject::class);
        $two = $this->createMock(ValueObject::class);
        $three = $this->createMock(ValueObject::class);

        $collection = new class ([$first, $two, $three]) extends AbstractCollectionValueObject {
            public static function getMinSize(): int
            {
                return 0;
            }

            public static function getMaxSize(): int
            {
                return 3;
            }


            public static function getItemType(): string
            {
                return ValueObject::class;
            }
        };

        $result = $collection->find(static fn($item, $index): bool => $item === $two);

        self::assertSame($two, $result);
    }

    public function testFindNoMatch(): void
    {
        $first = $this->createMock(ValueObject::class);
        $two = $this->createMock(ValueObject::class);
        $three = $this->createMock(ValueObject::class);

        $collection = new class ([$first, $two, $three]) extends AbstractCollectionValueObject {
            public static function getMinSize(): int
            {
                return 0;
            }

            public static function getMaxSize(): int
            {
                return 3;
            }


            public static function getItemType(): string
            {
                return ValueObject::class;
            }
        };

        $result = $collection->find(static fn($item, $index): bool => false);

        self::assertNull($result);
    }

    public function testFirst(): void
    {
        $first = $this->createMock(ValueObject::class);
        $two = $this->createMock(ValueObject::class);

        $collection = new class ([$first, $two]) extends AbstractCollectionValueObject {
            public static function getMinSize(): int
            {
                return 0;
            }

            public static function getMaxSize(): int
            {
                return 3;
            }


            public static function getItemType(): string
            {
                return ValueObject::class;
            }
        };

        self::assertSame($first, $collection->first());
    }

    public function testLast(): void
    {
        $first = $this->createMock(ValueObject::class);
        $two = $this->createMock(ValueObject::class);

        $collection = new class ([$first, $two]) extends AbstractCollectionValueObject {
            public static function getMinSize(): int
            {
                return 0;
            }

            public static function getMaxSize(): int
            {
                return 3;
            }


            public static function getItemType(): string
            {
                return ValueObject::class;
            }
        };

        self::assertSame($two, $collection->last());
    }

    public function testTraversable(): void
    {
        $first = $this->createMock(ValueObject::class);

        $collection = new class ([$first]) extends AbstractCollectionValueObject {
            public static function getMinSize(): int
            {
                return 0;
            }

            public static function getMaxSize(): int
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
            public static function getMinSize(): int
            {
                return 0;
            }

            public static function getMaxSize(): int
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
            public static function getMinSize(): int
            {
                return 0;
            }

            public static function getMaxSize(): int
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
