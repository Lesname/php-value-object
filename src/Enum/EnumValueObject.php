<?php
declare(strict_types=1);

namespace LessValueObject\Enum;

use LessValueObject\ValueObject;

/**
 * @psalm-immutable
 */
interface EnumValueObject extends ValueObject
{
    /**
     * @return array<string>
     *
     * @psalm-pure
     */
    public static function cases(): array;

    /**
     * @psalm-pure
     */
    public static function from(string $value): static;

    /**
     * @psalm-pure
     */
    public static function tryFrom(string $value): ?static;

    public function __toString(): string;
}
