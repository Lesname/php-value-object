<?php
declare(strict_types=1);

namespace LesValueObject\Collection;

use Override;
use LesValueObject\Composite\ForeignReference;
use LesValueObject\Number\Int\Paginate\PerPage;

/**
 * @extends AbstractCollectionValueObject<ForeignReference>
 *
 * @psalm-immutable
 *
 * @deprecated
 */
final class ForeignReferences extends AbstractCollectionValueObject
{
    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMinimumSize(): int
    {
        return 1;
    }

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMaximumSize(): int
    {
        return PerPage::getMaximumValue();
    }

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getItemType(): string
    {
        return ForeignReference::class;
    }
}
