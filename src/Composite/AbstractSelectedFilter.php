<?php
declare(strict_types=1);

namespace LessValueObject\Composite;

use LessValueObject\Collection\CollectionValueObject;
use LessValueObject\Enum\EnumValueObject;
use LessValueObject\Enum\FilterMode;
use LessValueObject\String\StringValueObject;

/**
 * @psalm-immutable
 */
abstract class AbstractSelectedFilter extends AbstractCompositeValueObject
{
    /**
     * @param FilterMode $mode
     * @param CollectionValueObject<EnumValueObject|StringValueObject> $selected
     */
    public function __construct(public FilterMode $mode, public CollectionValueObject $selected)
    {}
}
