<?php

declare(strict_types=1);

namespace LesValueObject\Number\Float;

use Override;
use RoundingMode;
use LesValueObject\Number\NumberValueObject;

/**
 * @psalm-immutable
 */
interface FloatValueObject extends NumberValueObject
{
    public float $value { get; }

    public function __construct(FloatValueObject|float $value);

    /**
     * @psalm-pure
     */
    public function round(int $precision = 0, RoundingMode $mode = RoundingMode::HalfAwayFromZero): float;

    /**
     * @psalm-pure
     */
    public function format(int $decimals, string $decimalSeparator = '.', string $thousandSeparator = ','): string;

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMinimumValue(): float;

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMaximumValue(): float;
}
