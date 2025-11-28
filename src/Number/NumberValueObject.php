<?php

declare(strict_types=1);

namespace LesValueObject\Number;

use Override;
use LesValueObject\ValueObject;

/**
 * @psalm-immutable
 *
 * @internal
 */
interface NumberValueObject extends ValueObject
{
    public float | int $value { get; }

    /**
     * @psalm-pure
     */
    public static function getMultipleOf(): int|float;

    /**
     * @psalm-pure
     */
    public static function getMinimumValue(): float | int;

    /**
     * @psalm-pure
     */
    public static function getMaximumValue(): float | int;

    public function isGreaterThan(NumberValueObject | float | int $value): bool;

    public function isLowerThan(NumberValueObject | float | int $value): bool;

    public function isSame(NumberValueObject | float | int $value): bool;

    public function diff(NumberValueObject | float | int $with): float | int;

    public function subtract(NumberValueObject | float | int $value): float | int;

    public function append(NumberValueObject | float | int $value): float | int;

    #[Override]
    public function __toString(): string;
}
