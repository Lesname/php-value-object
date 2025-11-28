<?php

declare(strict_types=1);

namespace LesValueObject\Collection;

use Countable;
use LesValueObject\ValueObject;
use Traversable;

/**
 * @extends Traversable<int, T>
 *
 * @template-covariant T of ValueObject
 *
 * @psalm-immutable
 */
interface CollectionValueObject extends ValueObject, Countable, Traversable
{
    /**
     * @param iterable<int, T> $items
     */
    public function __construct(iterable $items);

    /**
     * @psalm-pure
     */
    public static function getMinimumSize(): int;

    /**
     * @psalm-pure
     */
    public static function getMaximumSize(): int;

    /**
     * @return array<int, T>
     */
    public function toArray(): array;

    /**
     * @return class-string<T>|array<class-string<T>>
     *
     * @psalm-pure
     */
    public static function getItemType(): string | array;
}
