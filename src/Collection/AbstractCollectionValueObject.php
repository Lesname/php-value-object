<?php
declare(strict_types=1);

namespace LessValueObject\Collection;

use ArrayIterator;
use Closure;
use IteratorAggregate;
use LessValueObject\Collection\Exception\TooFewItems;
use LessValueObject\Collection\Exception\TooManyItems;
use LessValueObject\ValueObject;
use Traversable;

/**
 * @implements IteratorAggregate<int, T>
 * @implements CollectionValueObject<T>
 *
 * @template T of Vo
 *
 * @psalm-immutable
 */
abstract class AbstractCollectionValueObject implements IteratorAggregate, CollectionValueObject
{
    /**
     * @param array<int, T> $items
     */
    public function __construct(public array $items)
    {
        if (count($items) < static::getMinSize()) {
            throw new TooFewItems(static::getMinSize(), count($items));
        }

        if (count($items) > static::getMaxSize()) {
            throw new TooManyItems(static::getMaxSize(), count($items));
        }
    }

    /**
     * @param Closure(T, int): M $closure
     *
     * @template M
     *
     * @return iterable<int, M>
     */
    public function map(Closure $closure): iterable
    {
        foreach ($this->items as $i => $item) {
            yield $i => $closure($item, $i);
        }
    }

    /**
     * @return iterable<int, T>
     */
    public function slice(int $offset, ?int $length = null): iterable
    {
        return array_slice($this->items, $offset, $length, true);
    }

    /**
     * @param Closure(I|R, T, int): R $closure
     * @param I $initial
     *
     * @template I
     * @template R
     *
     * @return R | I
     */
    public function reduce(Closure $closure, mixed $initial = null): mixed
    {
        $result = $initial;

        foreach ($this->items as $index => $item) {
            $result = $closure($result ?? $initial, $item, $index);
        }

        return $result;
    }

    /**
     * @param Closure(T, int): bool $closure
     *
     * @return T|null
     */
    public function find(Closure $closure): ?ValueObject
    {
        foreach ($this->items as $index => $item) {
            if ($closure($item, $index)) {
                return $item;
            }
        }

        return null;
    }

    /**
     * @return T|null
     */
    public function first(): ?ValueObject
    {
        $key = array_key_first($this->items);

        return $key !== null
            ? $this->items[$key]
            : null;
    }

    /**
     * @return T|null
     */
    public function last(): ?ValueObject
    {
        $key = array_key_last($this->items);

        return $key !== null
            ? $this->items[$key]
            : null;
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
