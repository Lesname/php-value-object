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
     * @deprecated use getMinimumLength
     *
     * @psalm-pure
     */
    public static function getMinLength(): int;

    /**
     * @deprecated use getMaximumLength
     *
     * @psalm-pure
     */
    public static function getMaxLength(): int;

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
