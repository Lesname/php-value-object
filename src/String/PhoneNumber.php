<?php

declare(strict_types=1);

namespace LesValueObject\String;

use Override;

/**
 * @psalm-immutable
 */
final class PhoneNumber extends AbstractStringValueObject
{
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
        return 20;
    }
}
