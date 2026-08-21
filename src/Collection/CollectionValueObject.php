<?php

declare(strict_types=1);

namespace LesValueObject\Collection;

use Countable;
use LesValueObject\ValueObject;
use Traversable;

/**
 * @todo drop array from item type, use a discriminated composite instead
 *
 * @extends Traversable<int, T>
 *
 * @template-covariant T of ValueObject
 *
 * @psalm-immutable
 */
interface CollectionValueObject extends ValueObject, Countable, Traversable
{
    /**
     * @param list<T> $items
     *
     * @psalm-mutation-free
     */
    public function __construct(array $items);

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
     *
     * @psalm-pure
     */
    public function toArray(): array;

    /**
     * @return class-string<T>|array<class-string<T>>
     *
     * @psalm-pure
     */
    public static function getItemType(): string | array;
}
