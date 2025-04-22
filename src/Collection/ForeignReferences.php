<?php
declare(strict_types=1);

namespace LesValueObject\Collection;

use LesValueObject\Composite\ForeignReference;
use LesValueObject\Number\Int\Paginate\PerPage;

/**
 * @extends AbstractCollectionValueObject<ForeignReference>
 *
 * @psalm-immutable
 */
final class ForeignReferences extends AbstractCollectionValueObject
{
    /**
     * @psalm-pure
     */
    public static function getMinimumSize(): int
    {
        return 1;
    }

    /**
     * @psalm-pure
     */
    public static function getMaximumSize(): int
    {
        return PerPage::getMaximumValue();
    }

    /**
     * @psalm-pure
     */
    public static function getItemType(): string
    {
        return ForeignReference::class;
    }
}
