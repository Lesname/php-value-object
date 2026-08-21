<?php

declare(strict_types=1);

namespace LesValueObject\Composite\Signature;

use Override;
use Traversable;
use ArrayIterator;
use IteratorAggregate;
use LesValueObject\ValueObject;
use LesValueObject\Composite\WrappedCompositeValueObject;
use LesValueObject\Composite\Signature\Exception\PropertyNotFound;

/**
 * @psalm-immutable
 *
 * @template T of ValueObject
 *
 * @implements SignatureCompositeValueObject<T>
 * @implements IteratorAggregate<T>
 */
abstract class AbstractSignatureCompositeValueObject implements IteratorAggregate, SignatureCompositeValueObject, WrappedCompositeValueObject
{
    /**
     * @param array<string, T> $data
     *
     * @psalm-mutation-free
     */
    #[Override]
    public function __construct(protected readonly array $data)
    {}

    /**
     * @return Traversable<string, T>
     */
    #[Override]
    public function getIterator(): Traversable
    {
        return (function () {
            yield from $this->data;
        })();
    }

    /**
     * @psalm-mutation-free
     */
    #[Override]
    public function count(): int
    {
        return count($this->data);
    }

    /**
     * @throws PropertyNotFound
     *
     * @psalm-mutation-free
     */
    #[Override]
    public function get(string $key): ValueObject
    {
        return $this->data[$key] ?? throw new PropertyNotFound($key);
    }

    /**
     * @psalm-mutation-free
     */
    #[Override]
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->data);
    }

    /**
     * @psalm-mutation-free
     */
    #[Override]
    public function jsonSerialize(): mixed
    {
        return (object)$this->data;
    }
}
