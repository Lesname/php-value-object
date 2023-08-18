<?php
declare(strict_types=1);

namespace LessValueObject\String\Format;

use LessValueObject\String\StringValueObject;

/**
 * @psalm-immutable
 *
 * @todo remove psalm suppress when old interface is removed
 *
 * @psalm-suppress DeprecatedInterface
 */
interface StringFormatValueObject extends StringValueObject, FormattedStringValueObject
{
    /**
     * @psalm-pure
     */
    public static function isFormat(string $input): bool;
}
