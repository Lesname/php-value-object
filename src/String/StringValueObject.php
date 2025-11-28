<?php

declare(strict_types=1);

namespace LesValueObject\String;

use Override;
use LesValueObject\ValueObject;

/**
 * @psalm-immutable
 */
interface StringValueObject extends ValueObject
{
    public string $value { get; }

    /**
     * @psalm-pure
     */
    public static function getMinimumLength(): int;

    /**
     * @psalm-pure
     */
    public static function getMaximumLength(): int;

    #[Override]
    public function __toString(): string;
}
