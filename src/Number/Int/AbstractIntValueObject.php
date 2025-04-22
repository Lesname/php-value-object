<?php
declare(strict_types=1);

namespace LesValueObject\Number\Int;

use Override;
use LesValueObject\Number\NumberValueObject;
use LesValueObject\Number\Exception\MinOutBounds;
use LesValueObject\Number\Exception\MaxOutBounds;
use LesValueObject\Number\Exception\NotMultipleOf;

/**
 * @psalm-immutable
 *
 * @phpstan-consistent-constructor
 */
abstract class AbstractIntValueObject implements IntValueObject
{
    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    public function __construct(public readonly int $value)
    {
        if ($value < static::getMinimumValue()) {
            throw new MinOutBounds(static::getMinimumValue(), $value);
        }

        if ($value > static::getMaximumValue()) {
            throw new MaxOutBounds(static::getMaximumValue(), $value);
        }

        if ($value % static::getMultipleOf() !== 0) {
            throw new NotMultipleOf($value, static::getMultipleOf());
        }
    }

    #[Override]
    public static function getMultipleOf(): int|float
    {
        return 1;
    }

    #[Override]
    public function __toString(): string
    {
        return (string)$this->value;
    }

    #[Override]
    public function jsonSerialize(): float | int
    {
        return $this->value;
    }

    #[Override]
    public function isGreaterThan(NumberValueObject|float|int $value): bool
    {
        return $this->value > $this->getUsableValue($value);
    }

    #[Override]
    public function isLowerThan(NumberValueObject|float|int $value): bool
    {
        return $this->value < $this->getUsableValue($value);
    }

    #[Override]
    public function isSame(NumberValueObject|float|int $value): bool
    {
        return $this->getUsableValue($value) === $this->value;
    }

    #[Override]
    public function diff(NumberValueObject|float|int $with): float|int
    {
        if ($with instanceof NumberValueObject) {
            $with = $with->value;
        }

        return $with - $this->value;
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    #[Override]
    public function subtract(NumberValueObject|float|int $value): static
    {
        return new static($this->value - $this->getUsableValue($value));
    }

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    #[Override]
    public function append(NumberValueObject|float|int $value): static
    {
        return new static($this->value + $this->getUsableValue($value));
    }

    protected function getUsableValue(NumberValueObject|float|int $value): float | int
    {
        if (is_float($value) || is_int($value)) {
            return $value;
        }

        return $value->value;
    }

    /**
     * @psalm-pure
     */
    #[Override]
    abstract public static function getMinimumValue(): int;

    /**
     * @psalm-pure
     */
    #[Override]
    abstract public static function getMaximumValue(): int;
}
