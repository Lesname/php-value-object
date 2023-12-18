<?php
declare(strict_types=1);

namespace LessValueObject\String\Format;

use RuntimeException;

/**
 * @psalm-immutable
 */
final class Date extends AbstractStringFormatValueObject
{
    /**
     * @psalm-pure
     */
    public static function isFormat(string $input): bool
    {
        $length = self::getStringLength($input);

        if ($length < self::getMinimumLength() || $length > self::getMaximumLength()) {
            return false;
        }

        if (preg_match('/^(?<year>\d{4})-(?<month>\d{1,2})-(?<day>\d{1,2})$/', $input, $matches) !== 1) {
            return false;
        }

        return checkdate((int)$matches['month'], (int)$matches['day'], (int)$matches['year']);
    }

    /**
     * @psalm-pure
     */
    public static function getMinimumLength(): int
    {
        return 8;
    }

    /**
     * @psalm-pure
     */
    public static function getMaximumLength(): int
    {
        return 10;
    }

    public function getYear(): int
    {
        assert(preg_match('/^(?<year>\d{4})-(?<month>\d{1,2})-(?<day>\d{1,2})$/', (string)$this, $matches) === 1, new RuntimeException());

        return (int)$matches['year'];
    }

    public function getMonth(): int
    {
        assert(preg_match('/^(?<year>\d{4})-(?<month>\d{1,2})-(?<day>\d{1,2})$/', (string)$this, $matches) === 1, new RuntimeException());

        return (int)$matches['month'];
    }

    public function getDay(): int
    {
        assert(preg_match('/^(?<year>\d{4})-(?<month>\d{1,2})-(?<day>\d{1,2})$/', (string)$this, $matches) === 1, new RuntimeException());

        return (int)$matches['day'];
    }
}
