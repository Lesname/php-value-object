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
     * @return array<static>
     */
    public static function cases(): array;

    public static function from(string $value): static;

    public function getValue(): string;
}
