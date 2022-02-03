<?php
declare(strict_types=1);

namespace LessValueObject\Number\Int;

/**
 * @psalm-immutable
 */
final class Negative extends AbstractIntValueObject
{
    /**
     * @psalm-pure
     */
    public static function getMinValue(): int
    {
        return PHP_INT_MIN;
    }

    /**
     * @psalm-pure
     */
    public static function getMaxValue(): int
    {
        return -1;
    }
}
