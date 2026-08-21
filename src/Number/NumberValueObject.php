<?php

declare(strict_types=1);

namespace LesValueObject\Number;

use Override;
use LesValueObject\ValueObject;

/**
 * @psalm-immutable
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

    /**
     * @psalm-pure
     */
    public function isGreaterThan(NumberValueObject | float | int $value): bool;

    /**
     * @psalm-pure
     */
    public function isLowerThan(NumberValueObject | float | int $value): bool;

    /**
     * @psalm-pure
     */
    public function isSame(NumberValueObject | float | int $value): bool;

    /**
     * @psalm-pure
     */
    public function diff(NumberValueObject | float | int $with): float | int;

    /**
     * @psalm-mutation-free
     */
    public function subtract(NumberValueObject | float | int $value): float | int;

    /**
     * @psalm-mutation-free
     */
    public function append(NumberValueObject | float | int $value): float | int;

    /**
     * @psalm-mutation-free
     */
    #[Override]
    public function __toString(): string;
}
