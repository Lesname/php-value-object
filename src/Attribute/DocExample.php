<?php

declare(strict_types=1);

namespace LesValueObject\Attribute;

use Attribute;

/**
 * @psalm-immutable
 */
#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
final class DocExample
{
    /**
     * @psalm-mutation-free
     */
    public function __construct(public readonly string $example)
    {}
}
