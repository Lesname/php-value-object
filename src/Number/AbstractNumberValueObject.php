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
     * @throws MinOutBounds
     * @throws MaxOutBounds
     * @throws PrecisionOutBounds
     */
    public function __construct(private readonly float | int $value)
    {
        if ($value < static::getMinValue()) {
            throw new MinOutBounds(static::getMinValue(), $value);
        }

        if ($value > static::getMaxValue()) {
            throw new MaxOutBounds(static::getMaxValue(), $value);
        }

        if (preg_match('/\.(\d*)$/', (string)$value, $matches) && strlen($matches[1]) > static::getPrecision()) {
            throw new PrecisionOutBounds(static::getPrecision(), $value);
        }
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
    public function isGreater(NumberValueObject|float|int $value): bool
    {
        return $this->compare($value, static fn (float | int $l, float | int $r): bool => $l > $r);
    }

    /**
     * @throws Uncomparable
     */
    public function isLower(NumberValueObject|float|int $value): bool
    {
        return $this->compare($value, static fn (float | int $l, float | int $r): bool => $l < $r);
    }

    /**
     * @throws Uncomparable
     */
    public function isSame(NumberValueObject|float|int $value): bool
    {
        return $this->compare($value, static fn (float | int $l, float | int $r): bool => $l === $r);
    }

    /**
     * @psalm-param pure-callable(float | int, float | int): bool $comparor
     *
     * @param NumberValueObject|float|int $with
     * @param callable(float | int, float | int): bool $comparor
     *
     * @throws Uncomparable
     */
    protected function compare(NumberValueObject|float|int $with, callable $comparor): bool
    {
        if (is_float($with) || is_int($with)) {
            return $comparor($with, $this->getValue());
        }

        if ($with::class !== static::class) {
            throw new Uncomparable($this, $with);
        }

        return $comparor($this->getValue(), $with->getValue());
    }
}
