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
    public static function getMinimumValue(): int
    {
        return 0;
    }

    /**
     * @psalm-pure
     */
    public static function getMaximumValue(): int
    {
        return PHP_INT_MAX;
    }
}
