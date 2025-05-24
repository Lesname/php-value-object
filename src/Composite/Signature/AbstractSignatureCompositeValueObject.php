<?php
declare(strict_types=1);

namespace LesValueObject\Composite\Signature;

use Override;
use IteratorAggregate;
use LesValueObject\ValueObject;
use LesValueObject\ValueObject as T;
use LesValueObject\Composite\Signature\Exception\PropertyNotFound;

/**
 * @psalm-immutable
 *
 * @template T of ValueObject
 *
 * @implements SignatureCompositeValueObject<T>
 * @implements IteratorAggregate<T>
 */
abstract class AbstractSignatureCompositeValueObject implements IteratorAggregate, SignatureCompositeValueObject
{
    /**
     * @param array<string, T> $data
     */
    public function __construct(private readonly array $data)
    {}

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
