<?php
declare(strict_types=1);

namespace LessValueObject\Collection;

use Countable;
use LessValueObject\ValueObject;
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
     * @psalm-pure
     */
    public static function getMinimumSize(): int;

    /**
     * @psalm-pure
     */
    public static function getMaximumSize(): int;

    /**
     * @return class-string<T>
     *
     * @psalm-pure
     */
    public static function getItemType(): string;
}
