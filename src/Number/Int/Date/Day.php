<?php
declare(strict_types=1);

namespace LesValueObject\Number\Int\Date;

use Override;
use LesValueObject\Number\Int\AbstractIntValueObject;

/**
 * @psalm-immutable
 */
final class Day extends AbstractIntValueObject
{
    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMinimumValue(): int
    {
        return 1;
    }

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMaximumValue(): int
    {
        return 31;
    }
}
