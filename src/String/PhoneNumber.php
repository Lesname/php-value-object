<?php
declare(strict_types=1);

namespace LessValueObject\String;

/**
 * @psalm-immutable
 */
final class PhoneNumber extends AbstractStringValueObject
{
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
        return 20;
    }
}
