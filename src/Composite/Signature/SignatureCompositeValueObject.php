<?php

declare(strict_types=1);

namespace LesValueObject\Composite\Signature;

use Countable;
use Traversable;
use LesValueObject\ValueObject;
use LesValueObject\Composite\CompositeValueObject;
use LesValueObject\Composite\Signature\Exception\PropertyNotFound;

/**
 * @template T of ValueObject
 *
 * @extends Traversable<T>
 *
 * @psalm-immutable
 */
interface SignatureCompositeValueObject extends CompositeValueObject, Countable, Traversable
{
    /**
     * @throws PropertyNotFound
     *
     * @return T
     */
    public function get(string $key): ValueObject;

    public function has(string $key): bool;

    /**
     * @return class-string<T>
     *
     * @psalm-pure
     */
    public static function getSignature(): string;
}
