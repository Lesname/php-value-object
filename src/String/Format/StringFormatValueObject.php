<?php

declare(strict_types=1);

namespace LesValueObject\String\Format;

use LesValueObject\String\StringValueObject;

/**
 * @psalm-immutable
 */
interface StringFormatValueObject extends StringValueObject
{
    /**
     * @psalm-pure
     */
    public static function isFormat(string $input): bool;
}
