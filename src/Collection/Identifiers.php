<?php
declare(strict_types=1);

namespace LesValueObject\Collection;

use LesValueObject\Number\Int\Paginate\PerPage;
use LesValueObject\String\Format\Resource\Identifier;

/**
 * @extends AbstractCollectionValueObject<Identifier>
 *
 * @psalm-immutable
 */
final class Identifiers extends AbstractCollectionValueObject
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
        return Identifier::class;
    }
}
