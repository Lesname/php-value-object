<?php
declare(strict_types=1);

namespace LessValueObject\Enum;

/**
 * @psalm-immutable
 */
final class OrderDirection extends AbstractEnumValueObject
{
    public const ASCENDING = 'asc';
    public const DESCENDING = 'desc';

    /**
     * @psalm-pure
     *
     * @return array<string>
     */
    public static function cases(): array
    {
        return [
            self::ASCENDING,
            self::DESCENDING,
        ];
    }

    /**
     * @psalm-pure
     */
    public static function ascending(): self
    {
        return self::from(self::ASCENDING);
    }

    /**
     * @psalm-pure
     */
    public static function descending(): self
    {
        return self::from(self::DESCENDING);
    }

    public function asSQL(): string
    {
        return $this->value;
    }
}
