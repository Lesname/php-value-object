<?php
declare(strict_types=1);

namespace LessValueObject\String\Format\Resource;

use LessValueObject\String\Format\AbstractRegularExpressionStringValueObject;

/**
 * @psalm-immutable
 */
final class Identifier extends AbstractRegularExpressionStringValueObject
{
    /**
     * @psalm-pure
     */
    public static function getRegularExpression(): string
    {
        return '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/';
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
