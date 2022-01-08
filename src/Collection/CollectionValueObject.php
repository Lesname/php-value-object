<?php
declare(strict_types=1);

namespace LessValueObject\Collection;

use Countable;
use LessValueObject\ValueObject;
use Traversable;

/**
 * @extends Traversable<int, T>
 *
 * @template T of ValueObject
 *
 * @psalm-immutable
 */
interface CollectionValueObject extends ValueObject, Countable, Traversable
{
    /**
     * @psalm-pure
     */
    public static function getMinlength(): int;

    /**
     * @psalm-pure
     */
    public static function getMaxLength(): int;

    /**
     * @return class-string<T>
     *
     * @psalm-pure
     */
    public static function getItem(): string;

    /**
     * @psalm-param pure-callable(T, int): M $callable
     *
     * @param callable(T, int): M $callable
     *
     * @template M
     *
     * @return iterable<int, M>
     */
    public function map(callable $callable): iterable;

    /**
     * @return iterable<int, T>
     */
    public function slice(int $offset, ?int $length = null): iterable;

    /**
     * @psalm-param pure-callable(I, T, int): R $callable
     *
     * @param callable(I, T, int): R $callable
     * @param I $initial
     *
     * @template I
     * @template R
     *
     * @return R
     */
    public function reduce(callable $callable, mixed $initial): mixed;

    /**
     * @psalm-param pure-callable(T, int): bool $callable
     *
     * @param callable(T, int): bool $callable
     *
     * @return T|null
     */
    public function find(callable $callable): ?ValueObject;

    /**
     * @return T|null
     */
    public function first(): ?ValueObject;

    /**
     * @return T|null
     */
    public function last(): ?ValueObject;
}
