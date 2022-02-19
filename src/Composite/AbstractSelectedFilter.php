<?php
declare(strict_types=1);

namespace LessValueObject\Composite;

use LessValueObject\Collection\CollectionValueObject;
use LessValueObject\Enum\EnumValueObject;
use LessValueObject\Number\NumberValueObject;
use LessValueObject\String\StringValueObject;
use LessValueObject\Enum\FilterMode;

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
