<?php

declare(strict_types=1);

namespace LesValueObject\String;

use Override;

/**
 * @psalm-immutable
 */
final class ContentBody extends AbstractStringValueObject
{
    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMinimumLength(): int
    {
        return 1;
    }

    /**
     * This is based upon sql text with a max size of 2^16 bytes, with utf8 being a max of 4 bytes per character
     *
     * @psalm-pure
     */
    #[Override]
    public static function getMaximumLength(): int
    {
        return 15_000;
    }
}
