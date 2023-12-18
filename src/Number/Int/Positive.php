<?php
declare(strict_types=1);

namespace LessValueObject\Number\Int;

/**
 * @psalm-immutable
 */
final class Positive extends AbstractIntValueObject
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
        return PHP_INT_MAX;
    }
}
