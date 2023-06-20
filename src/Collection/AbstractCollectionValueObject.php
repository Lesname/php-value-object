<?php
declare(strict_types=1);

namespace LessValueObject\Collection;

use ArrayIterator;
use IteratorAggregate;
use LessValueObject\Collection\Exception\TooFewItems;
use LessValueObject\Collection\Exception\TooManyItems;
use Traversable;

/**
 * @implements IteratorAggregate<int, T>
 * @implements CollectionValueObject<T>
 *
 * @template T of \LessValueObject\ValueObject
 *
 * @psalm-immutable
 */
abstract class AbstractCollectionValueObject implements IteratorAggregate, CollectionValueObject
{
    /**
     * @param array<int, T> $items
     *
     * @throws TooFewItems
     * @throws TooManyItems
     */
    public function __construct(private readonly array $items)
    {
        assert(array_is_list($items));

        if (count($items) < static::getMinimumSize()) {
            throw new TooFewItems(static::getMinimumSize(), count($items));
        }

        if (count($items) > static::getMaximumSize()) {
            throw new TooManyItems(static::getMaximumSize(), count($items));
        }
    }

    /**
     * @psalm-pure
     */
    public static function getMinimumSize(): int
    {
        return static::getMinlength();
    }

    /**
     * @psalm-pure
     */
    public static function getMaximumSize(): int
    {
        return static::getMaxLength();
    }

    /**
     * @return Traversable<int, T>
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @return array<T>
     */
    public function jsonSerialize(): array
    {
        return $this->items;
    }
}
