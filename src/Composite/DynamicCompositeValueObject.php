<?php
declare(strict_types=1);

namespace LessValueObject\Composite;

use RuntimeException;

/**
 * @psalm-immutable
 */
final class DynamicCompositeValueObject extends AbstractCompositeValueObject
{
    /**
     * @param array<string, mixed> $data
     */
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

    /**
     * @return array<string, mixed>
     */
    public function export(): array
    {
        return $this->data;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return $this->data;
    }
}
