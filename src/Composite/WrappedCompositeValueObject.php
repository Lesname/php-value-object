<?php
declare(strict_types=1);

namespace LesValueObject\Composite;

interface WrappedCompositeValueObject extends CompositeValueObject
{
    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data);
}
