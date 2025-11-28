<?php

declare(strict_types=1);

namespace LesValueObject\Composite\Signature;

use Override;
use Exception;
use Traversable;
use ArrayIterator;
use IteratorAggregate;
use LesValueObject\ValueObject;
use LesValueObject\ValueObject as T;
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
    /** @var array<string, T>  */
    protected readonly array $data;

    /**
     * @param iterable<string, T> $data
     */
    #[Override]
    public function __construct(iterable $data)
    {
        if (!is_array($data)) {
            $this->data = iterator_to_array($data);
        } else {
            $this->data = $data;
        }
    }

    /**
     * @return Traversable<string, T>
     */
    #[Override]
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->data);
    }

    #[Override]
    public function count(): int
    {
        return count($this->data);
    }

    #[Override]
    public function get(string $key): ValueObject
    {
        return $this->data[$key] ?? throw new PropertyNotFound($key);
    }

    #[Override]
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->data);
    }

    #[Override]
    public function jsonSerialize(): mixed
    {
        return (object)$this->data;
    }
}
