<?php

declare(strict_types=1);

namespace LesValueObject\Number\Float;

use Override;
use RoundingMode;
use LesValueObject\Number\NumberValueObject;
use LesValueObject\Number\Exception\MinOutBounds;
use LesValueObject\Number\Exception\MaxOutBounds;
use LesValueObject\Number\Exception\NotMultipleOf;

/**
 * @psalm-immutable
 *
 * @phpstan-consistent-constructor
 */
abstract class AbstractFloatValueObject implements FloatValueObject
{
    public readonly float $value;

    /**
     * @throws MaxOutBounds
     * @throws MinOutBounds
     * @throws NotMultipleOf
     */
    #[Override]
    public function __construct(FloatValueObject | float $value)
    {
        if ($value instanceof FloatValueObject) {
            $value = $value->value;
        }

        if ($value < static::getMinimumValue()) {
            throw new MinOutBounds(static::getMinimumValue(), $value);
        }

        if ($value > static::getMaximumValue()) {
            throw new MaxOutBounds(static::getMaximumValue(), $value);
        }

        if (!static::isMultipleOf($value, static::getMultipleOf())) {
            throw new NotMultipleOf($value, static::getMultipleOf());
        }

        $this->value = $value;
    }

    /**
     * @psalm-pure
     */
    #[Override]
    public function round(int $precision = 0, RoundingMode $mode = RoundingMode::HalfAwayFromZero): float
    {
        return round($this->value, $precision, $mode);
    }

    /**
     * @psalm-pure
     */
    #[Override]
    public function format(int $decimals, string $decimalSeparator = '.', string $thousandSeparator = ','): string
    {
        return number_format($this->value, $decimals, $decimalSeparator, $thousandSeparator);
    }

    protected static function isMultipleOf(float | int $value, float | int $of): bool
    {
        if (is_int($value) && is_int($of) && $value % $of === 0) {
            return true;
        }

        if (is_float($of)) {
            $ofParts = explode('.', self::toFloatString($of));
            $precision = strlen($ofParts[1]);
            $of = (int)($ofParts[0] . $ofParts[1]);
            $power = pow(10, $precision);
        } else {
            $precision = 0;
            $power = 1;
        }

        if (is_float($value)) {
            $valueParts = explode('.', self::toFloatString($value));
            $valueParts[1] ??= '0';

            if (strlen($valueParts[1]) > $precision) {
                return false;
            } else {
                $float = str_pad($valueParts[1], $precision, '0');
                $check = (int)($valueParts[0] . $float);
            }
        } else {
            $check = $value * $power;
        }

        if ($check % $of !== 0) {
            return false;
        }

        return true;
    }

    private static function toFloatString(float $float): string
    {
        $string = (string)$float;

        if (preg_match('/0E-(?<size>\d+)$/', $string, $matches) === 1) {
            return sprintf("%.{$matches['size']}f", $float);
        }

        return $string;
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

    #[Override]
    public function subtract(NumberValueObject|float|int $value): float | int
    {
        return $this->value - $this->getUsableValue($value);
    }

    #[Override]
    public function append(NumberValueObject|float|int $value): float | int
    {
        return $this->value + $this->getUsableValue($value);
    }

    protected function getUsableValue(NumberValueObject|float|int $value): float | int
    {
        if (is_float($value) || is_int($value)) {
            return $value;
        }

        return $value->value;
    }
}
