<?php

declare(strict_types=1);

namespace LesValueObject\Composite;

use Override;

/**
 * @psalm-immutable
 */
abstract class AbstractPartialCompositeValueObject implements CompositeValueObject
{
    #[Override]
    public function jsonSerialize(): object
    {
        return (object)array_filter(
            get_object_vars($this),
            fn (mixed $value): bool => $value !== null,
        );
    }
}
