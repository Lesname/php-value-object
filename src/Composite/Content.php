<?php
declare(strict_types=1);

namespace LessValueObject\Composite;

use LessValueObject\Enum\ContentType;
use LessValueObject\String\ContentBody;

/**
 * @psalm-immutable
 */
final class Content extends AbstractCompositeValueObject
{
    public function __construct(public ContentType $type, public ContentBody $body)
    {}
}
