<?php
declare(strict_types=1);
// phpcs:ignoreFile enum's are/were not supported, so remove when supported

namespace LessValueObject\Enum;

/**
 * @psalm-immutable
 */
enum OrderDirection: string implements EnumValueObject
{
    case Ascending = 'asc';
    case Descending = 'desc';

    public function asSQL(): string
    {
        return $this->value;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
