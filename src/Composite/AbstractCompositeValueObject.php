<?php
declare(strict_types=1);

namespace LessValueObject\Composite;

/**
 * @psalm-immutable
 */
abstract class AbstractCompositeValueObject implements CompositeValueObject
{
    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
