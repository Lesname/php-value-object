<?php
declare(strict_types=1);

namespace LessValueObject\Collection;

use ArrayIterator;
use IteratorAggregate;
use LessValueObject\Collection\Exception\TooFewItems;
use LessValueObject\Collection\Exception\TooManyItems;
use LessValueObject\ValueObject;
use Traversable;

/**
 * @implements IteratorAggregate<int, T>
 * @implements CollectionValueObject<T>
 *
 * @template T of ValueObject
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
        if (count($items) < static::getMinlength()) {
            throw new TooFewItems(static::getMinlength(), count($items));
        }

        if (count($items) > static::getMaxLength()) {
            throw new TooManyItems(static::getMaxLength(), count($items));
        }
    }

    /**
     * @psalm-param pure-callable(T, int): M $callable
     *
     * @param callable(T, int): M $callable
     *
     * @template M
     *
     * @return iterable<int, M>
     */
    public function map(callable $callable): iterable
    {
        foreach ($this->items as $i => $item) {
            yield $i => $callable($item, $i);
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
     * @psalm-param pure-callable(I|R, T, int): R $callable
     *
     * @param callable(I|R, T, int): R $callable
     * @param I $initial
     *
     * @template I
     * @template R
     *
     * @return R | I
     */
    public function reduce(callable $callable, mixed $initial = null): mixed
    {
        $result = $initial;

        foreach ($this->items as $index => $item) {
            $result = $callable($result ?? $initial, $item, $index);
        }

        return $result;
    }

    /**
     * @psalm-param pure-callable(T, int): bool $callable
     *
     * @param callable(T, int): bool $callable
     *
     * @return T|null
     */
    public function find(callable $callable): ?ValueObject
    {
        foreach ($this->items as $index => $item) {
            if ($callable($item, $index)) {
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
