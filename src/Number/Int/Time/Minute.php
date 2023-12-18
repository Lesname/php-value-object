<?php
declare(strict_types=1);

namespace LessValueObject\Number\Int\Time;

use LessValueObject\Number\Int\AbstractIntValueObject;

/**
 * @psalm-immutable
 */
final class Minute extends AbstractIntValueObject
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
        return 59;
    }
}
