<?php
declare(strict_types=1);

namespace LessValueObject\String\Format;

/**
 * @psalm-immutable
 */
final class EmailAddress extends AbstractFormatStringValueObject
{
    /**
     * @psalm-pure
     */
    public static function isFormat(string $input): bool
    {
        return filter_var($input, FILTER_VALIDATE_EMAIL, FILTER_FLAG_EMAIL_UNICODE) !== false;
    }

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
        return 255;
    }

    /**
     * An email address is allowed to have multiple @
     *
     * @see https://stackoverflow.com/a/37835079/1771960
     */
    public function getHost(): string
    {
        $parts = explode('@', (string)$this);

        return array_pop($parts);
    }

    public function getName(): string
    {
        $parts = explode('@', (string)$this);
        array_pop($parts);

        return implode('@', $parts);
    }
}
