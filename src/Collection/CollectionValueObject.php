<?php
declare(strict_types=1);

namespace LessValueObject\Collection;

use Closure;
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
     * @param Closure(T, int): M $closure
     *
     * @template M
     *
     * @return iterable<int, M>
     */
    public function map(Closure $closure): iterable;

    /**
     * @return iterable<int, T>
     */
    public function slice(int $offset, ?int $length = null): iterable;

    /**
     * @param Closure(I, T, int): R $closure
     * @param I $initial
     *
     * @template I
     * @template R
     *
     * @return R
     */
    public function reduce(Closure $closure, mixed $initial): mixed;

    /**
     * @param Closure(T, int): bool $closure
     *
     * @return T|null
     */
    public function find(Closure $closure): ?ValueObject;

    /**
     * @return T|null
     */
    public function first(): ?ValueObject;

    /**
     * @return T|null
     */
    public function last(): ?ValueObject;
}
