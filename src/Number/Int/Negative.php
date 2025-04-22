<?php
declare(strict_types=1);

namespace LesValueObject\Number\Int;

/**
 * @psalm-immutable
 */
final class Negative extends AbstractIntValueObject
{
    /**
     * @psalm-pure
     */
    public static function getMinimumValue(): int
    {
        return PHP_INT_MIN;
    }

    /**
     * @psalm-pure
     */
    public static function getMaximumValue(): int
    {
        return -1;
    }
}
