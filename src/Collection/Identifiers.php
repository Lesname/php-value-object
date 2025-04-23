<?php
declare(strict_types=1);

namespace LesValueObject\Collection;

use Override;
use LesValueObject\Number\Int\Paginate\PerPage;
use LesValueObject\String\Format\Resource\Identifier;

/**
 * @extends AbstractCollectionValueObject<Identifier>
 *
 * @psalm-immutable
 *
 * @deprecated
 */
final class Identifiers extends AbstractCollectionValueObject
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
        return Identifier::class;
    }
}
