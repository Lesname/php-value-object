<?php
declare(strict_types=1);

namespace LesValueObject\String;

/**
 * @psalm-immutable
 */
final class PhoneNumber extends AbstractStringValueObject
{
    /**
     * @psalm-pure
     */
    public static function getMinimumLength(): int
    {
        return 5;
    }

    /**
     * @psalm-pure
     */
    public static function getMaximumLength(): int
    {
        return 20;
    }
}
