<?php

declare(strict_types=1);

namespace LesValueObject\String\Format\Resource;

use Override;
use LesValueObject\Attribute\DocExample;
use LesValueObject\String\Format\AbstractRegexStringFormatValueObject;

/**
 * Identifier is a collection for various identifier formats
 * - uuid
 * - digits
 *
 * Recommended to use formats directly where possible
 *
 * @psalm-immutable
 */
#[DocExample('7b38d184-a873-4821-bd38-5440752fe91e')]
#[DocExample('123')]
final class Identifier extends AbstractRegexStringFormatValueObject
{
    /**
     * @psalm-pure
     */
    #[Override]
    public static function getRegularExpression(): string
    {
        return '/^([0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[89ab][0-9a-f]{3}-[0-9a-f]{12}|[1-9][0-9]*)$/';
    }

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMinimumLength(): int
    {
        return 1;
    }

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMaximumLength(): int
    {
        return 36;
    }
}
