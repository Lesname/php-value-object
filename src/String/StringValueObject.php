<?php
declare(strict_types=1);

namespace LesValueObject\String;

use LesValueObject\ValueObject;

/**
 * @psalm-immutable
 */
interface StringValueObject extends ValueObject
{
    // phpcs:ignore
    public string $value { get; }

    /**
     * @psalm-pure
     */
    public static function getMinimumLength(): int;

    /**
     * @psalm-pure
     */
    public static function getMaximumLength(): int;

    public function __toString(): string;
}
