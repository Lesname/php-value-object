<?php
declare(strict_types=1);

namespace LessValueObject\String\Format\Resource;

use LessValueObject\Attribute\DocExample;
use LessValueObject\String\Format\AbstractRegexStringFormatValueObject;

/**
 * @psalm-immutable
 */
#[DocExample('7b38d184-a873-4821-bd38-5440752fe91e')]
#[DocExample('00000000-0000-0000-0000-000000000000')]
final class Identifier extends AbstractRegexStringFormatValueObject
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
    public static function getMinimumLength(): int
    {
        return 36;
    }

    /**
     * @psalm-pure
     */
    public static function getMaximumLength(): int
    {
        return 36;
    }
}
