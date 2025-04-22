<?php
declare(strict_types=1);

namespace LesValueObject\String\Format;

use Override;
use LesValueObject\Attribute\DocExample;
use LesValueObject\String\Format\Exception\UnknownVersion;

/**
 * @psalm-immutable
 */
#[DocExample('127.0.0.1')]
#[DocExample('::1')]
final class Ip extends AbstractStringFormatValueObject
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
        return 45;
    }
}
