<?php

declare(strict_types=1);

namespace LesValueObject\Composite;

/**
 * @psalm-immutable
 */
interface WrappedCompositeValueObject extends CompositeValueObject
{
    /**
     * @param array<string, mixed> $data
     *
     * @psalm-pure
     */
    public function __construct(array $data);
}
