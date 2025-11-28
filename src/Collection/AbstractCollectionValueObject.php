<?php

declare(strict_types=1);

namespace LesValueObject\Collection;

use Override;
use ArrayIterator;
use RuntimeException;
use IteratorAggregate;
use LesValueObject\Collection\Exception\TooFewItems;
use LesValueObject\Collection\Exception\TooManyItems;
use Traversable;

/**
 * @implements IteratorAggregate<int, T>
 * @implements CollectionValueObject<T>
 *
 * @template T of \LesValueObject\ValueObject
 *
 * @psalm-immutable
 */
abstract class AbstractCollectionValueObject implements IteratorAggregate, CollectionValueObject
{
    /** @var array<T> */
    private readonly array $items;

    /**
     * @param iterable<int, T> $items
     *
     * @throws TooFewItems
     * @throws TooManyItems
     */
    #[Override]
    public function __construct(iterable $items)
    {
        if (!is_array($items)) {
            $items = iterator_to_array($items, false);
        } elseif (!array_is_list($items)) {
            throw new RuntimeException();
        }

        if (count($items) < static::getMinimumSize()) {
            throw new TooFewItems(static::getMinimumSize(), count($items));
        }

        if (count($items) > static::getMaximumSize()) {
            throw new TooManyItems(static::getMaximumSize(), count($items));
        }

        $this->items = $items;
    }

    /**
     * @return Traversable<int, T>
     */
    #[Override]
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    #[Override]
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @return array<int, T>
     */
    #[Override]
    public function toArray(): array
    {
        return $this->items;
    }

    /**
     * @return array<T>
     */
    #[Override]
    public function jsonSerialize(): array
    {
        return $this->items;
    }
}
