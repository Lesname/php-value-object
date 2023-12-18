<?php
declare(strict_types=1);

namespace LessValueObject\Number;

use LessValueObject\Number\Exception\MaxOutBounds;
use LessValueObject\Number\Exception\MinOutBounds;
use LessValueObject\Number\Exception\PrecisionOutBounds;

/**
 * @psalm-immutable
 *
 * @psalm-consistent-constructor
 */
abstract class AbstractNumberValueObject implements NumberValueObject
{
    /**
     * @throws Exception\NotMultipleOf
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws PrecisionOutBounds
     */
    public function __construct(private readonly float | int $value)
    {
        if ($value < static::getMinimumValue()) {
            throw new MinOutBounds(static::getMinimumValue(), $value);
        }

        if ($value > static::getMaximumValue()) {
            throw new MaxOutBounds(static::getMaximumValue(), $value);
        }

        if (preg_match('/\.(\d*)$/', (string)$value, $matches) && strlen($matches[1]) > static::getPrecision()) {
            throw new PrecisionOutBounds(static::getPrecision(), $value);
        }

        if (!static::isMultipleOf($value, static::getMultipleOf())) {
            throw new Exception\NotMultipleOf($value, static::getMultipleOf());
        }
    }

    protected static function isMultipleOf(float | int $value, float | int $of): bool
    {
        if (is_int($value) && is_int($of) && $value % $of === 0) {
            return true;
        }

        if (preg_match('/^(\d+)\.(\d+)$/', (string)$of, $matches)) {
            $precision = strlen($matches[2]);
            $of = (int)($matches[1] . $matches[2]);
            $power = pow(10, $precision);
        } else {
            $precision = 0;
            $power = 1;
        }

        if (preg_match('/^(\d+)\.(\d+)$/', (string)$value, $matches)) {
            if (strlen($matches[2]) > $precision) {
                return false;
            } else {
                $float = str_pad($matches[2], $precision, '0');
                $check = (int)($matches[1] . $float);
            }
        } else {
            $check = $value * $power;
        }

        if ($check % $of !== 0) {
            return false;
        }

        return true;
    }

    /**
     * @psalm-pure
     */
    public static function getMultipleOf(): int|float
    {
        return 1 / pow(10, static::getPrecision());
    }

    /**
     * @psalm-pure
     */
    public static function getMinimumValue(): float|int
    {
        return static::getMinValue();
    }

    /**
     * @psalm-pure
     */
    public static function getMaximumValue(): float|int
    {
        return static::getMaxValue();
    }

    public function getValue(): float|int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string)$this->getValue();
    }

    public function jsonSerialize(): float | int
    {
        return $this->getValue();
    }

    public function isGreaterThan(NumberValueObject|float|int $value): bool
    {
        return $this->getValue() > $this->getUsableValue($value);
    }

    public function isLowerThan(NumberValueObject|float|int $value): bool
    {
        return $this->getValue() < $this->getUsableValue($value);
    }

    public function isGreater(NumberValueObject|float|int $value): bool
    {
        return $this->getUsableValue($value) > $this->getValue();
    }

    public function isLower(NumberValueObject|float|int $value): bool
    {
        return $this->getUsableValue($value) < $this->getValue();
    }

    public function isSame(NumberValueObject|float|int $value): bool
    {
        return $this->getUsableValue($value) === $this->getValue();
    }

    public function diff(NumberValueObject|float|int $with): float|int
    {
        if ($with instanceof NumberValueObject) {
            $with = $with->getValue();
        }

        return $with - $this->getValue();
    }

    /**
     * @throws Exception\NotMultipleOf
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws PrecisionOutBounds
     */
    public function subtract(NumberValueObject|float|int $value): static
    {
        return new static($this->getValue() - $this->getUsableValue($value));
    }

    /**
     * @throws Exception\NotMultipleOf
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws PrecisionOutBounds
     */
    public function append(NumberValueObject|float|int $value): static
    {
        return new static($this->getValue() + $this->getUsableValue($value));
    }

    protected function getUsableValue(NumberValueObject|float|int $value): float | int
    {
        if (is_float($value) || is_int($value)) {
            return $value;
        }

        return $value->getValue();
    }
}
