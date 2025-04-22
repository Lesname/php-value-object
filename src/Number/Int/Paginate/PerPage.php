<?php
declare(strict_types=1);

namespace LesValueObject\Number\Int\Paginate;

use LesValueObject\Number\Int\AbstractIntValueObject;

/**
 * @psalm-immutable
 */
final class PerPage extends AbstractIntValueObject
{
    /**
     * @psalm-pure
     */
    public static function getMinimumValue(): int
    {
        return 0;
    }

    /**
     * @psalm-pure
     */
    public static function getMaximumValue(): int
    {
        return 100;
    }
}
