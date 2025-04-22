<?php
declare(strict_types=1);

namespace LesValueObject\Number\Int\Time;

use Override;
use LesValueObject\Number\Int\AbstractIntValueObject;

/**
 * @psalm-immutable
 */
final class Second extends AbstractIntValueObject
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
        return 59;
    }
}
