<?php
declare(strict_types=1);

namespace LessValueObject\Enum;

/**
 * @psalm-immutable
 */
final class FilterMode extends AbstractEnumValueObject
{
    private const EXCLUSIVE = 'exclusive';
    private const INCLUSIVE = 'inclusive';

    /**
     * @psalm-pure
     *
     * @return array<string>
     */
    public static function cases(): array
    {
        return [
            self::EXCLUSIVE,
            self::INCLUSIVE,
        ];
    }

    /**
     * @psalm-pure
     */
    public static function exclusive(): self
    {
        return self::from(self::EXCLUSIVE);
    }

    /**
     * @psalm-pure
     */
    public static function inclusive(): self
    {
        return self::from(self::INCLUSIVE);
    }
}
