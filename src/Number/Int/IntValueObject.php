<?php
declare(strict_types=1);

namespace LessValueObject\Number\Int;

use LessValueObject\Number\NumberValueObject;

/**
 * @psalm-immutable
 */
interface IntValueObject extends NumberValueObject
{
    /**
     * @psalm-pure
     */
    public static function getMinimumValue(): int;

    /**
     * @psalm-pure
     */
    public static function getMaximumValue(): int;

    /**
     * @deprecated use getMinimumValue
     *
     * @psalm-pure
     */
    public static function getMinValue(): int;

    /**
     * @deprecated use getMaximumValue
     *
     * @psalm-pure
     */
    public static function getMaxValue(): int;

    public function getValue(): int;
}
