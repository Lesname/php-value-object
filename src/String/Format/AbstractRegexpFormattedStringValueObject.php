<?php
declare(strict_types=1);

namespace LessValueObject\String\Format;

/**
 * @psalm-immutable
 */
abstract class AbstractRegexpFormattedStringValueObject extends AbstractFormattedStringValueObject
{
    /**
     * @psalm-pure
     */
    abstract public static function getRegexPattern(): string;

    public static function isFormat(string $input): bool
    {
        $pattern = static::getRegexPattern();
        return preg_match("/{$pattern}/", $input) === 1;
    }
}
