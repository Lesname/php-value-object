<?php
declare(strict_types=1);

namespace LesValueObject\String\Format;

use Override;
use LesValueObject\Attribute\DocExample;
use LesValueObject\String\Exception\TooLong;
use LesValueObject\String\Exception\TooShort;
use LesValueObject\String\Format\Resource\Identifier;

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

    /**
     * @deprecated use matchesFormat
     */
    public function isEmailAddress(): bool
    {
        return EmailAddress::isFormat((string)$this);
    }

    /**
     * @throws Exception\NotFormat
     * @throws TooLong
     * @throws TooShort
     *
     * @deprecated use toFormat
     */
    public function asEmailAddress(): EmailAddress
    {
        return new EmailAddress((string)$this);
    }

    /**
     * @deprecated use matchesFormat
     */
    public function isResourceId(): bool
    {
        return Identifier::isFormat((string)$this);
    }

    /**
     * @throws Exception\NotFormat
     * @throws TooLong
     * @throws TooShort
     *
     * @deprecated use toFormat
     */
    public function asResourceId(): Identifier
    {
        return new Identifier((string)$this);
    }
}
