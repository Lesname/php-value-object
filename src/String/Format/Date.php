<?php
declare(strict_types=1);

namespace LesValueObject\String\Format;

use Override;
use RuntimeException;
use LesValueObject\Attribute\DocExample;

/**
 * @psalm-immutable
 */
#[DocExample('1970-01-01')]
#[DocExample('2468-09-15')]
final class Date extends AbstractStringFormatValueObject
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

        // @phpstan-ignore possiblyImpure.functionCall
        if (preg_match('/^(?<year>\d{4})-(?<month>\d{1,2})-(?<day>\d{1,2})$/', $input, $matches) !== 1) {
            return false;
        }

        return checkdate((int)$matches['month'], (int)$matches['day'], (int)$matches['year']);
    }

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMinimumLength(): int
    {
        return 8;
    }

    /**
     * @psalm-pure
     */
    #[Override]
    public static function getMaximumLength(): int
    {
        return 10;
    }

    public function getYear(): int
    {
        if (preg_match('/^(?<year>\d{4})-(?<month>\d{1,2})-(?<day>\d{1,2})$/', (string)$this, $matches) !== 1) {
            throw new RuntimeException();
        }

        return (int)$matches['year'];
    }

    public function getMonth(): int
    {
        if (preg_match('/^(?<year>\d{4})-(?<month>\d{1,2})-(?<day>\d{1,2})$/', (string)$this, $matches) !== 1) {
            throw new RuntimeException();
        }

        return (int)$matches['month'];
    }

    public function getDay(): int
    {
        if (preg_match('/^(?<year>\d{4})-(?<month>\d{1,2})-(?<day>\d{1,2})$/', (string)$this, $matches) !== 1) {
            throw new RuntimeException();
        }

        return (int)$matches['day'];
    }
}
