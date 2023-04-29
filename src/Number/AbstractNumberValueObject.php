<?php
declare(strict_types=1);

namespace LessValueObject\Number;

use LessValueObject\Number\Exception\MaxOutBounds;
use LessValueObject\Number\Exception\MinOutBounds;
use LessValueObject\Number\Exception\PrecisionOutBounds;
use LessValueObject\Number\Exception\Uncomparable;

/**
 * @psalm-immutable
 */
abstract class AbstractNumberValueObject implements NumberValueObject
{
    /**
     * @throws Exception\NotMultipleOf
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws PrecisionOutBounds
     *
     * @psalm-suppress DeprecatedMethod
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

        if (!static::isMultipleOf($this->value, static::getMultipleOf())) {
            throw new Exception\NotMultipleOf($this->value, static::getMultipleOf());
        }
    }

    protected function isMultipleOf(float | int $value, float | int $of): bool
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
     * @psalm-suppress DeprecatedMethod
     *
     * @psalm-pure
     */
    public static function getMultipleOf(): int|float
    {
        return 1 / pow(10, static::getPrecision());
    }

    /**
     * @psalm-suppress DeprecatedMethod
     *
     * @psalm-pure
     */
    public static function getMinimumValue(): float|int
    {
        return static::getMinValue();
    }

    /**
     * @psalm-suppress DeprecatedMethod
     *
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

    /**
     * @throws Uncomparable
     */
    public function isGreaterThan(NumberValueObject|float|int $value): bool
    {
        return $this->getValue() > $this->getCompareValue($value);
    }

    /**
     * @throws Uncomparable
     */
    public function isLowerThan(NumberValueObject|float|int $value): bool
    {
        return $this->getValue() < $this->getCompareValue($value);
    }

    /**
     * @throws Uncomparable
     */
    public function isGreater(NumberValueObject|float|int $value): bool
    {
        return $this->getCompareValue($value) > $this->getValue();
    }

    /**
     * @throws Uncomparable
     */
    public function isLower(NumberValueObject|float|int $value): bool
    {
        return $this->getCompareValue($value) < $this->getValue();
    }

    /**
     * @throws Uncomparable
     */
    public function isSame(NumberValueObject|float|int $value): bool
    {
        return $this->getCompareValue($value) === $this->getValue();
    }

    public function diff(NumberValueObject|float|int $with): float|int
    {
        if ($with instanceof NumberValueObject) {
            $with = $with->getValue();
        }

        return $with - $this->getValue();
    }

    /**
     * @psalm-param pure-callable(float | int, float | int): bool $comparor
     *
     * @param NumberValueObject|float|int $with
     * @param callable(float | int, float | int): bool $comparor
     *
     * @throws Uncomparable
     *
     * @deprecated will be dropped, use getCompareValue
     */
    protected function compare(NumberValueObject|float|int $with, callable $comparor): bool
    {
        if (is_float($with) || is_int($with)) {
            return $comparor($with, $this->getValue());
        }

        if ($with::class !== static::class) {
            throw new Uncomparable($this, $with);
        }

        return $comparor($with->getValue(), $this->getValue());
    }

    /**
     * @throws Uncomparable
     */
    protected function getCompareValue(NumberValueObject|float|int $value): float | int
    {
        if (is_float($value) || is_int($value)) {
            return $value;
        }

        if ($value::class !== static::class) {
            throw new Uncomparable($this, $value);
        }

        return $value->getValue();
    }
}
