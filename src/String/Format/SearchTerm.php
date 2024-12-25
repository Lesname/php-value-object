<?php
declare(strict_types=1);

namespace LessValueObject\String\Format;

use LessValueObject\Attribute\DocExample;
use LessValueObject\String\Exception\TooLong;
use LessValueObject\String\Exception\TooShort;
use LessValueObject\String\Format\Resource\Identifier;

/**
 * @psalm-immutable
 */
#[DocExample('Fiz biz')]
final class SearchTerm extends AbstractRegexStringFormatValueObject
{
    /**
     * @psalm-pure
     */
    public static function getRegularExpression(): string
    {
        return '/^.*[a-zA-Z0-9]{2}.*$/';
    }

    /**
     * @psalm-pure
     */
    public static function getMinimumLength(): int
    {
        return 2;
    }

    /**
     * @psalm-pure
     */
    public static function getMaximumLength(): int
    {
        return 50;
    }

    public function isEmailAddress(): bool
    {
        return EmailAddress::isFormat((string)$this);
    }

    /**
     * @throws Exception\NotFormat
     * @throws TooLong
     * @throws TooShort
     */
    public function asEmailAddress(): EmailAddress
    {
        return new EmailAddress((string)$this);
    }

    public function isResourceId(): bool
    {
        return Identifier::isFormat((string)$this);
    }

    /**
     * @throws Exception\NotFormat
     * @throws TooLong
     * @throws TooShort
     */
    public function asResourceId(): Identifier
    {
        return new Identifier((string)$this);
    }
}
