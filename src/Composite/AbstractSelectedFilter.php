<?php
declare(strict_types=1);

namespace LesValueObject\Composite;

use LesValueObject\Collection\CollectionValueObject;
use LesValueObject\Enum\EnumValueObject;
use LesValueObject\Number\NumberValueObject;
use LesValueObject\String\StringValueObject;
use LesValueObject\Enum\FilterMode;

/**
 * @psalm-immutable
 */
abstract class AbstractSelectedFilter extends AbstractCompositeValueObject
{
    /**
     * @param FilterMode $mode
     * @param CollectionValueObject<EnumValueObject|NumberValueObject|StringValueObject> $selected
     */
    public function __construct(
        public readonly FilterMode $mode,
        public readonly ?CollectionValueObject $selected,
    ) {}
}
