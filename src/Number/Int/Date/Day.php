<?php
declare(strict_types=1);

namespace LessValueObject\Number\Int\Date;

use LessValueObject\Number\Int\AbstractIntValueObject;

/**
 * @psalm-immutable
 */
final class Day extends AbstractIntValueObject
{
    /**
     * @psalm-pure
     */
    public static function getMinValue(): int
    {
        return 1;
    }

    /**
     * @psalm-pure
     */
    public static function getMaxValue(): int
    {
        return 31;
    }
}
