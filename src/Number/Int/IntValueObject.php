<?php

declare(strict_types=1);

namespace LesValueObject\Number\Int;

use Override;
use LesValueObject\Number\NumberValueObject;

/**
 * @psalm-immutable
 */
interface IntValueObject extends NumberValueObject
{
    public int $value { get; }

    public function __construct(IntValueObject|int $value);

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMinimumValue(): int;

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMaximumValue(): int;
}
