<?php
declare(strict_types=1);
// phpcs:ignoreFile enum's are/were not supported, so remove when supported

namespace LessValueObject\Enum;

use LessValueObject\Enum\Helper\EnumValueHelper;

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
