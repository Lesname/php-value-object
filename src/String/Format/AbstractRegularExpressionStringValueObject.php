<?php
declare(strict_types=1);

namespace LessValueObject\String\Format;

/**
 * @psalm-immutable
 */
abstract class AbstractRegularExpressionStringValueObject extends AbstractFormattedStringValueObject
{
    /**
     * @psalm-pure
     */
    abstract public static function getRegularExpression(): string;

    /**
     * @psalm-pure
     */
    public static function isFormat(string $input): bool
    {
        $length = static::getStringLength($input);

        return $length >= static::getMinLength()
            && $length <= static::getMaxLength()
            && preg_match(static::getRegularExpression(), $input) === 1;
    }
}
