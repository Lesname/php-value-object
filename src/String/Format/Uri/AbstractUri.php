<?php

declare(strict_types=1);

namespace LesValueObject\String\Format\Uri;

use Override;
use LesValueObject\String\Format\AbstractStringFormatValueObject;

/**
 * @psalm-immutable
 */
abstract class AbstractUri extends AbstractStringFormatValueObject
{
    /**
     * @psalm-pure
     */
    #[Override]
    public static function isFormat(string $input): bool
    {
        $length = self::getStringLength($input);

        if ($length < self::getMinimumLength() || $length > self::getMaximumLength()) {
            return false;
        }

        if (filter_var($input, FILTER_VALIDATE_URL) !== false) {
            $scheme = parse_url($input, PHP_URL_SCHEME);

            return is_string($scheme)
                && static::isSupportedScheme($scheme);
        }

        return false;
    }

    /**
     * @psalm-pure
     */
    abstract protected static function isSupportedScheme(string $scheme): bool;

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMinimumLength(): int
    {
        return 5;
    }

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMaximumLength(): int
    {
        return 999;
    }
}
