<?php
declare(strict_types=1);

namespace LessValueObject\Collection;

use LessValueObject\Number\Int\Paginate\PerPage;
use LessValueObject\String\Format\Resource\Identifier;

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
        return Identifier::class;
    }
}
