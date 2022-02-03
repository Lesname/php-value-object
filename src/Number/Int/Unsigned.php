<?php
declare(strict_types=1);

namespace LessValueObject\Number\Int;

/**
 * @psalm-immutable
 */
final class Unsigned extends AbstractIntValueObject
{
    /**
     * @psalm-pure
     */
    public static function getMinValue(): int
    {
        return 0;
    }

    /**
     * @psalm-pure
     */
    public static function getMaxValue(): int
    {
        return PHP_INT_MAX;
    }
}
