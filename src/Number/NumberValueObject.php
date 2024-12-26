<?php
declare(strict_types=1);

namespace LessValueObject\Number;

use LessValueObject\ValueObject;

/**
 * @psalm-immutable
 */
interface NumberValueObject extends ValueObject
{
    // phpcs:ignore
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

    /**
     * @deprecated use value property
     */
    public function getValue(): float | int;

    public function isGreaterThan(NumberValueObject | float | int $value): bool;

    public function isLowerThan(NumberValueObject | float | int $value): bool;

    public function isSame(NumberValueObject | float | int $value): bool;

    public function diff(NumberValueObject | float | int $with): float | int;

    public function subtract(NumberValueObject | float | int $value): static;

    public function append(NumberValueObject | float | int $value): static;

    public function __toString(): string;
}
