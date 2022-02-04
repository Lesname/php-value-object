<?php
declare(strict_types=1);

namespace LessValueObject\String\Format\Resource;

use LessValueObject\String\Format\AbstractRegexpFormattedStringValueObject;

/**
 * @psalm-immutable
 */
final class Id extends AbstractRegexpFormattedStringValueObject
{
    /**
     * @psalm-pure
     */
    public static function getRegexPattern(): string
    {
        return '^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$';
    }

    /**
     * @psalm-pure
     */
    public static function getMinLength(): int
    {
        return 36;
    }

    /**
     * @psalm-pure
     */
    public static function getMaxLength(): int
    {
        return 36;
    }
}
