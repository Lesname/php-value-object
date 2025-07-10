<?php
declare(strict_types=1);

namespace LesValueObject\Composite;

use Override;
use ArrayAccess;
use RuntimeException;

/**
 * @psalm-immutable
 *
 * @implements ArrayAccess<string, mixed>
 */
final class DynamicCompositeValueObject extends AbstractCompositeValueObject implements ArrayAccess, WrappedCompositeValueObject
{
    /**
     * @param array<string, mixed> $data
     */
    #[Override]
    public function __construct(public readonly array $data)
    {}

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->data);
    }

    public function get(string $key): mixed
    {
        if (!$this->has($key)) {
            throw new RuntimeException();
        }

        return $this->data[$key];
    }

    public function tryGet(string $key, mixed $default): mixed
    {
        return $this->has($key)
            ? $this->data[$key]
            : $default;
    }

    /**
     * @return array<string, mixed>
     */
    public function export(): array
    {
        return $this->data;
    }

    #[Override]
    public function jsonSerialize(): object
    {
        return (object)$this->data;
    }

    #[Override]
    public function offsetExists(mixed $offset): bool
    {
        return $this->has($offset);
    }

    #[Override]
    public function offsetGet(mixed $offset): mixed
    {
        return $this->get($offset);
    }

    #[Override]
    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new RuntimeException('Immutable object');
    }

    #[Override]
    public function offsetUnset(mixed $offset): void
    {
        throw new RuntimeException('Immutable object');
    }
}
