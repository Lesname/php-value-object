<?php
declare(strict_types=1);

namespace LesValueObject\Number\Int;

use Override;
use LesValueObject\Number\NumberValueObject;

/**
 * @psalm-immutable
 */
interface IntValueObject extends NumberValueObject
{
    // phpcs:ignore
    public int $value { get; }

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMinimumValue(): int;

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMaximumValue(): int;
}
