<?php
declare(strict_types=1);

namespace LesValueObject\Number\Int\Date;

use LesValueObject\Number\Int\AbstractIntValueObject;

/**
 * @psalm-immutable
 */
final class Year extends AbstractIntValueObject
{
    /**
     * @psalm-pure
     */
    public static function getMinimumValue(): int
    {
        return 1;
    }

    /**
     * @psalm-pure
     */
    public static function getMaximumValue(): int
    {
        return 9999;
    }
}
