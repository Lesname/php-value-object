<?php

declare(strict_types=1);

namespace LesValueObject\Enum;

use LesValueObject\Enum\Helper\EnumValueHelper;

/**
 * @psalm-immutable
 */
enum FilterMode: string implements EnumValueObject
{
    use EnumValueHelper;

    case All = 'all';
    case Any = 'any';
    case None = 'none';
}
