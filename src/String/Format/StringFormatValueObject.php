<?php
declare(strict_types=1);

namespace LessValueObject\String\Format;

use LessValueObject\String\StringValueObject;

/**
 * @psalm-immutable
 */
interface StringFormatValueObject extends StringValueObject, FormattedStringValueObject
{
    /**
     * @psalm-pure
     */
    public static function isFormat(string $input): bool;
}
