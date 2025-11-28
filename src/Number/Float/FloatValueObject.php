<?php

declare(strict_types=1);

namespace LesValueObject\Number\Float;

use Override;
use LesValueObject\Number\NumberValueObject;
use LesValueObject\Number\Int\IntValueObject;

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
    #[Override]
    public static function getMinimumValue(): float;

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMaximumValue(): float;
}
