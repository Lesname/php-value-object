<?php
declare(strict_types=1);

namespace LesValueObject\Enum;

use LesValueObject\Enum\Helper\EnumValueHelper;

/**
 * @psalm-immutable
 */
enum OrderDirection: string implements EnumValueObject
{
    use EnumValueHelper;

    case Ascending = 'asc';
    case Descending = 'desc';

    public function asSQL(): string
    {
        return $this->value;
    }
}
