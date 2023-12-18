<?php
declare(strict_types=1);

namespace LessValueObject\String;

use LessValueObject\ValueObject;

/**
 * @psalm-immutable
 */
interface StringValueObject extends ValueObject
{
    /**
     * @psalm-pure
     */
    public static function getMinimumLength(): int;

    /**
     * @psalm-pure
     */
    public static function getMaximumLength(): int;

    public function getValue(): string;

    public function __toString(): string;
}
