<?php
declare(strict_types=1);

namespace LessValueObject\String\Format;

/**
 * @psalm-immutable
 */
abstract class AbstractRegexStringFormatValueObject extends AbstractStringFormatValueObject
{
    /**
     * @psalm-pure
     *
     * @return non-empty-string
     */
    abstract public static function getRegularExpression(): string;

    /**
     * @psalm-pure
     */
    public static function isFormat(string $input): bool
    {
        return static::isLengthAllowed($input)
            // @phpstan-ignore possiblyImpure.functionCall
            && preg_match(static::getRegularExpression(), $input) === 1;
    }
}
