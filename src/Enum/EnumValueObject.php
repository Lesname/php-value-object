<?php
declare(strict_types=1);

namespace LessValueObject\Enum;

use LessValueObject\ValueObject;

/**
 * @psalm-immutable
 */
interface EnumValueObject extends ValueObject
{
    // phpcs:ignore
    public string $value { get; }

    /**
     * @return array<static>
     */
    public static function cases(): array;

    public static function from(string $value): static;

    /**
     * @deprecated use value property
     */
    public function getValue(): string;
}
