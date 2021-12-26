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
    public static function getMinLength(): int;

    /**
     * @psalm-pure
     */
    public static function getMaxLength(): int;

    public function __toString(): string;
}
