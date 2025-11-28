<?php

declare(strict_types=1);

namespace LesValueObject\String\Format;

use Override;
use LesValueObject\Attribute\DocExample;

/**
 * @psalm-immutable
 */
#[DocExample('Fiz biz')]
final class SearchTerm extends AbstractRegexStringFormatValueObject
{
    /**
     * @psalm-pure
     */
    #[Override]
    public static function getRegularExpression(): string
    {
        return '/^.*[a-zA-Z0-9]{2}.*$/';
    }

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMinimumLength(): int
    {
        return 2;
    }

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMaximumLength(): int
    {
        return 50;
    }

    /**
     * @param class-string<StringFormatValueObject> $format
     *
     */
    public function matchesFormat(string $format): bool
    {
        return $format::isFormat((string)$this);
    }

    /**
     * @param class-string<T> $format
     *
     * @return T
     *
     * @template T of StringFormatValueObject
     */
    public function toFormat(string $format): object
    {
        return new $format((string)$this);
    }
}
