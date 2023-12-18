<?php
declare(strict_types=1);

namespace LessValueObject\String;

/**
 * There is no defined max length for user agent, although after some amount it becomes junk
 *
 * @psalm-immutable
 */
final class UserAgent extends AbstractStringValueObject
{
    /**
     * @psalm-pure
     */
    public static function getMinimumLength(): int
    {
        return 1;
    }

    /**
     * @psalm-pure
     */
    public static function getMaximumLength(): int
    {
        return 255;
    }
}
