<?php
declare(strict_types=1);

namespace LessValueObject\Collection;

use LessValueObject\Composite\ForeignReference;
use LessValueObject\Number\Int\Paginate\PerPage;

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
    public static function getMinlength(): int
    {
        return 1;
    }

    /**
     * @psalm-pure
     */
    public static function getMaxLength(): int
    {
        return PerPage::getMaxValue();
    }

    /**
     * @psalm-pure
     */
    public static function getItemType(): string
    {
        return ForeignReference::class;
    }
}
