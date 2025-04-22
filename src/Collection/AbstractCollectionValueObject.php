<?php
declare(strict_types=1);

namespace LesValueObject\Collection;

use Override;
use ArrayIterator;
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
     * @return array<T>
     */
    #[Override]
    public function jsonSerialize(): array
    {
        return $this->items;
    }
}
