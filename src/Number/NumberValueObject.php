<?php
declare(strict_types=1);

namespace LessValueObject\Number;

use LessValueObject\ValueObject;

/**
 * @psalm-immutable
 */
interface NumberValueObject extends ValueObject
{
    public function getValue(): float | int;

    public static function getMaxValue(): float | int;

    public static function getMinValue(): float | int;

    public function isGreater(NumberValueObject | float | int $value): bool;

    public function isLower(NumberValueObject | float | int $value): bool;

    public function isSame(NumberValueObject | float | int $value): bool;

    public function __toString(): string;
}
