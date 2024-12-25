<?php
declare(strict_types=1);

namespace LessValueObject\Composite;

/**
 * @psalm-immutable
 */
abstract class AbstractCompositeValueObject implements CompositeValueObject
{
    public function jsonSerialize(): object
    {
        return (object)get_object_vars($this);
    }
}
