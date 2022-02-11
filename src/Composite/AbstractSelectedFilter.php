<?php
declare(strict_types=1);

namespace LessValueObject\Composite;

use LessValueObject\Collection\CollectionValueObject;
use LessValueObject\ValueObject;
use LessValueObject\Enum\FilterMode;

/**
 * @psalm-immutable
 */
abstract class AbstractSelectedFilter extends AbstractCompositeValueObject
{
    /**
     * @param FilterMode $mode
     * @param CollectionValueObject<ValueObject> $selected
     */
    public function __construct(
        public readonly FilterMode $mode,
        public readonly ?CollectionValueObject $selected,
    ) {}
}
