<?php
declare(strict_types=1);

namespace LessValueObject\Enum;

/**
 * @psalm-immutable
 */
final class ContentType extends AbstractEnumValueObject
{
    private const MARKDOWN = 'markdown';
    private const TEXT = 'text';

    /**
     * @return array<string>
     *
     * @psalm-pure
     */
    public static function cases(): array
    {
        return [
            self::MARKDOWN,
            self::TEXT,
        ];
    }

    /**
     * @psalm-pure
     */
    public static function markdown(): self
    {
        return self::from(self::MARKDOWN);
    }

    /**
     * @psalm-pure
     */
    public static function text(): self
    {
        return self::from(self::TEXT);
    }
}
