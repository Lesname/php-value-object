<?php

declare(strict_types=1);

namespace LesValueObject\Enum;

use LesValueObject\Enum\Helper\EnumValueHelper;

/**
 * @psalm-immutable
 */
enum Locale: string implements EnumValueObject
{
    use EnumValueHelper;

    case nl_NL = 'nl_NL';
    case en_US = 'en_US';
}
