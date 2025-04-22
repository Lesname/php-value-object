<?php
declare(strict_types=1);

namespace LesValueObject\Number\Int;

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
    public static function getMinimumValue(): int;

    /**
     * @psalm-pure
     */
    public static function getMaximumValue(): int;

    /**
     * @deprecated use value property
     */
    public function getValue(): int;
}
