<?php
declare(strict_types=1);

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
}
