<?php

declare(strict_types=1);

namespace LesValueObject\Composite;

use LesValueObject\Enum\ContentType;
use LesValueObject\String\ContentBody;

/**
 * @psalm-immutable
 */
final class Content extends AbstractCompositeValueObject
{
    public function __construct(public readonly ContentType $type, public readonly ContentBody $body)
    {}
}
