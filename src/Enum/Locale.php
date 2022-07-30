<?php
declare(strict_types=1);

namespace LessValueObject\Enum;

use LessValueObject\Enum\Helper\EnumValueHelper;

/**
 * @psalm-immutable
 */
enum Locale: string implements EnumValueObject
{
    use EnumValueHelper;

    case nl_NL = 'nl_NL';
    case en_US = 'en_US';
}
