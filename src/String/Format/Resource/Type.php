<?php

declare(strict_types=1);

namespace LesValueObject\String\Format\Resource;

use Override;
use LesValueObject\Attribute\DocExample;
use LesValueObject\String\Format\AbstractRegexStringFormatValueObject;

/**
 * @psalm-immutable
 */
#[DocExample('foo')]
#[DocExample('foo.fizBiz.bar')]
final class Type extends AbstractRegexStringFormatValueObject
{
    /**
     * @psalm-pure
     */
    #[Override]
    public static function getRegularExpression(): string
    {
        return '/^[a-z][a-zA-Z]*(\.[a-z][a-zA-Z]*)*$/';
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
        return 40;
    }
}
