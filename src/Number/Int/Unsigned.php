<?php
declare(strict_types=1);

namespace LesValueObject\Number\Int;

use Override;

/**
 * @psalm-immutable
 */
final class Unsigned extends AbstractIntValueObject
{
    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMinimumValue(): int
    {
        return 0;
    }

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMaximumValue(): int
    {
        return PHP_INT_MAX;
    }
}
