<?php
declare(strict_types=1);

namespace LesValueObject\Composite;

use Override;

/**
 * @psalm-immutable
 */
abstract class AbstractCompositeValueObject implements CompositeValueObject
{
    #[Override]
    public function jsonSerialize(): object
    {
        return (object)get_object_vars($this);
    }
}
