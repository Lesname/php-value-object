<?php
declare(strict_types=1);

namespace LessValueObject\Number;

use Closure;
use RuntimeException;

/**
 * @psalm-immutable
 */
abstract class AbstractNumberValueObject implements NumberValueObject
{
    public function __construct(public float | int $value)
    {}

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

    public function isGreater(NumberValueObject|float|int $value): bool
    {
        return $this->compare($value, static fn (float | int $l, float | int $r): bool => $l > $r);
    }

    public function isLower(NumberValueObject|float|int $value): bool
    {
        return $this->compare($value, static fn (float | int $l, float | int $r): bool => $l < $r);
    }

    public function isSame(NumberValueObject|float|int $value): bool
    {
        return $this->compare($value, static fn (float | int $l, float | int $r): bool => $l === $r);
    }

    /**
     * @param NumberValueObject|float|int $with
     * @param Closure(float | int, float | int): bool $comparor
     */
    protected function compare(NumberValueObject|float|int $with, Closure $comparor): bool
    {
        if (is_float($with) || is_int($with)) {
            return $comparor($with, $this->getValue());
        }

        if ($with::class !== static::class) {
            throw new RuntimeException("Could not compare");
        }

        return $comparor($this->getValue(), $with->getValue());
    }
}
