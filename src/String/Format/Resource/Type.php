<?php
declare(strict_types=1);

namespace LessValueObject\String\Format\Resource;

use LessValueObject\String\Format\AbstractRegularExpressionStringValueObject;

/**
 * @psalm-immutable
 */
final class Type extends AbstractRegularExpressionStringValueObject
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
    public static function getMinLength(): int
    {
        return 1;
    }

    /**
     * @psalm-pure
     */
    public static function getMaxLength(): int
    {
        return 40;
    }
}
