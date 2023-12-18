<?php
declare(strict_types=1);

namespace LessValueObject\String\Format\Resource;

use LessValueObject\String\Format\AbstractRegexStringFormatValueObject;

/**
 * @psalm-immutable
 */
final class Type extends AbstractRegexStringFormatValueObject
{
    /**
     * @psalm-pure
     */
    public static function getRegularExpression(): string
    {
        return '/^[a-z][a-zA-Z]*(\.[a-z][a-zA-Z]*)*$/';
    }

    /**
     * @psalm-pure
     */
    public static function getMinimumLength(): int
    {
        return 1;
    }

    /**
     * @psalm-pure
     */
    public static function getMaximumLength(): int
    {
        return 40;
    }
}
