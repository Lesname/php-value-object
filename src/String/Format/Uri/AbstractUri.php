<?php
declare(strict_types=1);

namespace LessValueObject\String\Format\Uri;

use LessValueObject\String\Format\AbstractFormattedStringValueObject;

/**
 * @psalm-immutable
 */
abstract class AbstractUri extends AbstractFormattedStringValueObject
{
    /**
     * @psalm-pure
     */
    public static function isFormat(string $input): bool
    {
        $length = self::getStringLength($input);

        if ($length < self::getMinLength() || $length > self::getMaxLength()) {
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
    public static function getMinLength(): int
    {
        return 5;
    }

    /**
     * @psalm-pure
     */
    public static function getMaxLength(): int
    {
        return 999;
    }
}
