<?php
declare(strict_types=1);
// phpcs:ignoreFile enum's are/were not supported, so remove when supported

namespace LessValueObject\Enum;

use LessValueObject\Enum\Helper\EnumValueHelper;

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
