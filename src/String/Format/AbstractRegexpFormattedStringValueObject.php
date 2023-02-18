<?php
declare(strict_types=1);

namespace LessValueObject\String\Format;

/**
 * @psalm-immutable
 *
 * @deprekcated use AbstractRegularExpressionStringValueObject
 */
abstract class AbstractRegexpFormattedStringValueObject extends AbstractFormattedStringValueObject
{
    /**
     * @psalm-pure
     */
    abstract public static function getRegexPattern(): string;

    /**
     * @psalm-pure
     */
    public static function isFormat(string $input): bool
    {
        $length = static::getStringLength($input);

        if ($length < static::getMinimumLength() || $length > static::getMaximumLength()) {
            return false;
        }

        $pattern = static::getRegexPattern();
        return preg_match("/{$pattern}/", $input) === 1;
    }
}
