<?php
declare(strict_types=1);

namespace LessValueObject\Number;

use LessValueObject\ValueObject;

/**
 * @psalm-immutable
 */
interface NumberValueObject extends ValueObject
{
    /**
     * @psalm-pure
     *
     * @deprecated use getMultipleOf
     */
    public static function getPrecision(): int;

    /**
     * @psalm-pure
     */
    public static function getMultipleOf(): int|float;

    /**
     * @psalm-pure
     *
     * @deprecated use getMinimumValue
     */
    public static function getMinValue(): float | int;

    /**
     * @psalm-pure
     *
     * @deprecated use getMaximumValue
     */
    public static function getMaxValue(): float | int;

    /**
     * @psalm-pure
     */
    public static function getMinimumValue(): float | int;

    /**
     * @psalm-pure
     */
    public static function getMaximumValue(): float | int;

    public function getValue(): float | int;

    public function isGreater(NumberValueObject | float | int $value): bool;

    public function isLower(NumberValueObject | float | int $value): bool;

    public function isSame(NumberValueObject | float | int $value): bool;

    public function diff(NumberValueObject | float | int $with): float | int;

    public function __toString(): string;
}
