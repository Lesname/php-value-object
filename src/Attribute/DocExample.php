<?php
declare(strict_types=1);

namespace LessValueObject\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
final class DocExample
{
    public function __construct(public readonly mixed $example)
    {}
}
