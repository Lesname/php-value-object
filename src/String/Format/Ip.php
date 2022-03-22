<?php
declare(strict_types=1);

namespace LessValueObject\String\Format;

use LessValueObject\String\Format\Exception\UnknownVersion;

/**
 * @psalm-immutable
 */
final class Ip extends AbstractFormattedStringValueObject
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

        return filter_var($input, FILTER_VALIDATE_IP) !== false;
    }

    /**
     * @psalm-pure
     *
     * @throws UnknownVersion
     */
    public static function local(int $version = 6): self
    {
        return match ($version) {
            4 => new self('127.0.0.1'),
            6 => new self('::1'),
            default => throw new UnknownVersion($version),
        };
    }

    /**
     * @psalm-pure
     */
    public static function getMinLength(): int
    {
        return 2;
    }

    /**
     * @psalm-pure
     */
    public static function getMaxLength(): int
    {
        return 45;
    }
}
